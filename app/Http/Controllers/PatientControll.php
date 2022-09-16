<?php

namespace App\Http\Controllers;

use App\Models\Covideffect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Auth;

use App\Models\CovidSideEffect;
use App\Models\Disease;
use Laravel\Ui\Presets\React;

class PatientControll extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function home()
    {

        $auth_id = Auth::id();
        $previous_disease = null;
        $covid_side_effects = null;
        $patient = DB::table('covideffects')
        ->select('covideffects.*', 'doct.name as doctor_name')
        ->leftjoin('users as doct', 'doct.id', '=', 'covideffects.doctor_id')
        ->leftjoin('users', 'users.id', '=', 'covideffects.user_id')
        ->leftjoin('covid_side_effects', 'covid_side_effects.id', '=', 'covideffects.covid_side_effect_id')
        ->leftjoin('diseases', 'diseases.id', '=', 'covideffects.previous_disease')
        ->where('covideffects.user_id', $auth_id)
        ->first();
        if(isset($patient->previous_disease)){
            $previous_disease_arr = explode (",", $patient->previous_disease);
            $previous_disease = DB::table('diseases')->whereIn('id', $previous_disease_arr)->get();

        }

        if(isset($patient->covid_side_effect_id)){
            $covid_side_effect_id_arr = explode (",", $patient->covid_side_effect_id);
            $covid_side_effects = DB::table('covid_side_effects')->whereIn('id', $covid_side_effect_id_arr)->get();

        }


// dd($patient);


        return view('patient.patient_dashboard', compact('patient', 'previous_disease', 'covid_side_effects'))->with('i');
    }



    public function create()
    {
        return view('patient.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'password'      => 'required'
        ]);

        $patient = new User();
        $patient->name  = $request->name;
        $patient->email = $request->email;
        $patient->password = Hash::make($request->password);
        $patient->role = 3;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/assets/images/patient/', $name);
            $patient->avatar = 'frontend/assets/images/patient/' . $name;
        }
        $patient->save();
        return redirect()->route('patient.index')->with('success', 'Patient Added Successfully');
    }

    public function edit($id)
    {
        $patient = User::find($id);
        return view('patient.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = User::find($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->specialties = $request->specialties;
        if ($request->hasFile('avatar')) {
            // delete old image
            $destination = public_path($patient->avatar);
            if (file_exists($destination)) {
                File::delete($destination);
            }
            // add new image
            $image = $request->file('avatar');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/assets/images/patient/', $name);
            $patient->avatar = 'frontend/assets/images/patient/' . $name;
        }
        if ($request->password) {
            $patient->password = Hash::make($request->password);
        }
        $patient->update();
        return redirect()->route('patient.index')->with('success', 'Patient Update Successfully');
    }

    public function patientReportView(Request $request, $id)
    {
        $doctors = User::where('role', 2)->get();
        $patient = DB::table('covideffects')
            ->leftjoin('users', 'users.id', '=', 'covideffects.user_id')
            ->leftjoin('covid_side_effects', 'covid_side_effects.id', '=', 'covideffects.covid_side_effect_id')
            ->leftjoin('diseases', 'diseases.id', '=', 'covideffects.previous_disease')
            ->where('covideffects.user_id', $id)->first();
        return view('patient.patient_info_view', compact('patient', 'doctors'));
    }

    public function distroy($id)
    {
        $patient = User::find($id);
        if ($patient->avatar) {
            if (file_exists(public_path($patient->avatar))) {
                unlink(public_path($patient->avatar));
            }
        }
        $patient->delete();
        return redirect()->back()->with('success', 'Patient Deleted Successfully');
    }
    public function patientUpdate(Request $request){
        // $patient = Covideffect::where('')
    }
}
