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

class DoctorPatientControll extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $auth_id = Auth::id();
        $patients  = User::select('users.*','covideffects.report_status', 'covideffects.doctor_id', 'doct.name as doctor_name')
        ->leftJoin('covideffects', 'covideffects.user_id', 'users.id')
        ->leftJoin('users as doct', 'doct.id', 'covideffects.doctor_id')
        ->where('users.role', 3)
        ->where('covideffects.doctor_id', $auth_id)
        ->get();
        // dd($patients);

        $doctors   = User::where('role', 2)->get();
        return view('doctor.my_patient', compact('patients', 'doctors'))->with('i');
    }

    public function oldpatient()
    {

        $auth_id  = Auth::id();
        $patients = DB::table('covideffect_doctor_mapping as a')
        ->select('users.*', 'doct.name as doctor_name')
        ->leftJoin('users as doct', 'doct.id', 'a.f_doctor_no')
        ->leftJoin('users', 'users.id', 'a.f_patient_no')
        ->where('a.status',0)
        ->where('a.f_doctor_no',$auth_id)
        ->groupBy('a.f_patient_no')
        ->get();

        return view('doctor.old_patient', compact('patients'))->with('i');

    }

    // public function create()
    // {
    //     return view('patient.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'          => 'required',
    //         'email'         => 'required|email',
    //         'password'      => 'required'
    //     ]);

    //     $patient = new User();
    //     $patient->name  = $request->name;
    //     $patient->email = $request->email;
    //     $patient->password = Hash::make($request->password);
    //     $patient->role = 3;
    //     if ($request->hasFile('avatar')) {
    //         $image = $request->file('avatar');
    //         $name  = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move('frontend/assets/images/patient/', $name);
    //         $patient->avatar = 'frontend/assets/images/patient/' . $name;
    //     }
    //     $patient->save();
    //     return redirect()->route('patient.index')->with('success', 'Patient Added Successfully');
    // }

    // public function edit($id)
    // {
    //     $patient = User::find($id);
    //     return view('patient.edit', compact('patient'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $patient = User::find($id);
    //     $patient->name = $request->name;
    //     $patient->email = $request->email;
    //     $patient->specialties = $request->specialties;
    //     if ($request->hasFile('avatar')) {
    //         // delete old image
    //         $destination = public_path($patient->avatar);
    //         if (file_exists($destination)) {
    //             File::delete($destination);
    //         }
    //         // add new image
    //         $image = $request->file('avatar');
    //         $name  = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move('frontend/assets/images/patient/', $name);
    //         $patient->avatar = 'frontend/assets/images/patient/' . $name;
    //     }
    //     if ($request->password) {
    //         $patient->password = Hash::make($request->password);
    //     }
    //     $patient->update();
    //     return redirect()->route('patient.index')->with('success', 'Patient Update Successfully');
    // }

    public function patientReportView(Request $request, $id)
    {
        $doctors = User::where('role', 2)->get();
        $previous_disease = null;
        $patient = DB::table('covideffects')
        ->select('covideffects.*', 'doct.name as doctor_name')
            ->leftjoin('users', 'users.id', '=', 'covideffects.user_id')
            ->leftjoin('users as doct', 'doct.id', '=', 'covideffects.doctor_id')
            ->leftjoin('covid_side_effects', 'covid_side_effects.id', '=', 'covideffects.covid_side_effect_id')
            ->leftjoin('diseases', 'diseases.id', '=', 'covideffects.previous_disease')
            ->where('covideffects.user_id', $id)
            ->first();
        if(isset($patient->previous_disease)){
            $previous_disease_arr = explode (",", $patient->previous_disease);
            $previous_disease = DB::table('diseases')->whereIn('id', $previous_disease_arr)->get();

        }

        if(isset($patient->covid_side_effect_id)){
            $covid_side_effect_id_arr = explode (",", $patient->covid_side_effect_id);
            $covid_side_effects = DB::table('covid_side_effects')->whereIn('id', $covid_side_effect_id_arr)->get();

        }

        $remarks = DB::table('report_remarks')
        ->select('report_remarks.*','users.name as remark_by_name')
        ->leftJoin('users','users.id','report_remarks.created_by')
        ->where('report_remarks.covideffect_id', $patient->id)
        ->where('report_remarks.status',1)
        ->orderBy('report_remarks.id', 'desc')
        ->get();


        
        return view('doctor.patient_info_view', compact('patient', 'doctors', 'previous_disease', 'covid_side_effects','remarks'));
    }


    public function remarks(Request $request)
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id',$id)->first();
        $covideffects = DB::table('covideffects')->where('id',$request->covideffect_id)->first();

        $data['user_id'] = $covideffects->user_id;
        $data['covideffect_id'] = $request->covideffect_id;
        $data['details'] = $request->remarks;
        $data['created_by'] = $id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['status'] = 1;
        $data['report_by'] = Auth::user()->role;
       
        DB::table('report_remarks')->insert($data);

        return redirect()->back()->with('success', 'Patient Remarks added Successfully');

    }

    // public function distroy($id)
    // {
    //     $patient = User::find($id);
    //     if ($patient->avatar) {
    //         if (file_exists(public_path($patient->avatar))) {
    //             unlink(public_path($patient->avatar));
    //         }
    //     }
    //     $patient->delete();
    //     return redirect()->route('patient.index')->with('success', 'Patient Deleted Successfully');
    // }
    // public function patientUpdate(Request $request){
    //     // $patient = Covideffect::where('')
    // }






}
