<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminDoctorControll extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth_id = Auth::id();
        $doctors = User::all();
        $patients  = User::select('users.*','covideffects.report_status', 'covideffects.doctor_id','doct.name as doctor_name')
        ->leftJoin('covideffects', 'covideffects.user_id', 'users.id')
        ->leftJoin('users as doct', 'doct.id', 'covideffects.doctor_id')
        ->where('users.role', 3)
        ->where('covideffects.doctor_id',$auth_id)
        ->get();

        $doctor_lists = User::where('role',2)->get();


        return view('admin.doctor.index', compact('patients', 'doctors','doctor_lists'))->with('i');
    }

    public function create()
    {
        // dd(1);
        return view('admin.doctor.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'specialties'   => 'required',
            'password'      => 'required',
            'phone_number' => 'required|min:10|max:11'
        ]);

        $doctor = new User();
        $doctor->name       = $request->name;
        $doctor->email      = $request->email;
        $doctor->specialties = $request->specialties;
        $doctor->phone_number = "+60" . $request->phone_number;
        $doctor->password   = Hash::make($request->password);
        $doctor->role = 2;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/assets/images/doctor/', $name);
            $doctor->avatar = 'frontend/assets/images/doctor/' . $name;
        }
        $doctor->save();
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor Added Successfully');
    }
    public function edit($id)
    {
        $doctor = User::find($id);
        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'specialties'   => 'required',
            'password'      => 'nullable|min:6|string',
            'phone_number'  => 'required|min:9|max:11'
        ]);

        $doctor = User::find($id);
        $doctor->name       = $request->name;
        $doctor->email      = $request->email;
        $doctor->specialties = $request->specialties;
        $doctor->phone_number = "+60" . $request->phone_number;
        if ($request->hasFile('avatar')) {
            // delete old image
            $destination = public_path($doctor->avatar);
            if (file_exists($destination)) {
                File::delete($destination);
            }
            // add new image
            $image = $request->file('avatar');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/assets/images/doctor/', $name);
            $doctor->avatar = 'frontend/assets/images/doctor/' . $name;
        }
        if ($request->password) {
            $doctor->password = Hash::make($request->password);
        }
        $doctor->update();
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor Update Successfully');
    }

    public function destroy($id)
    {
        $doctor = User::find($id);
        if ($doctor->avatar) {
            if (file_exists(public_path($doctor->avatar))) {
                unlink(public_path($doctor->avatar));
            }
        }
        $doctor->delete();
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor Deleted Successfully');
    }


    public function ViewPreviousDoctor($id)
    {
        $doctors = DB::table('users')
        ->join('covideffect_doctor_mapping', 'users.id', '=', 'covideffect_doctor_mapping.f_doctor_no')
        ->where('covideffect_doctor_mapping.f_covideffect_no', $id)->groupBy('users.id')
        ->get();
         return view('admin.doctor.view_previous_doctor', compact('doctors'));
    }
}

