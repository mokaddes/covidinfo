<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $doctors        = User::where('role', 2)->get();
        $patients       = User::where('role', 3)->get();
        $covid_reports  = DB::table('covideffects')->get();
        $date           = Carbon::now()->subDays(7);
        $LastSevendays  = DB::table('covideffects')->where('created_at', '>=', $date)->get();
        $attendend      = DB::table('covideffects')->whereReportStatus(1)->count();
        $recent_report  = DB::table('users')->limit(10)->get();
        return view('home', compact('doctors', 'patients', 'covid_reports', 'recent_report', 'LastSevendays', 'attendend'));
    }

    public function adminProfile()
    {
        return view('profile.index');
    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'name'      => 'required',
            'avatar'    => 'mimes:jpeg,png,jpg'
        ]);

        $user             = User::find($id);
        $user['name']     = $request->name;
        if(Auth::user()->role != 3){

            $user['phone_number']    = "+60".$request->phone_number;
        }
        if ($request->hasFile('avatar')) {
            // delete old image
            $destination = public_path($user->avatar);
            if (file_exists($destination)) {
                File::delete($destination);
            }
            // add new image
            $image = $request->file('avatar');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/assets/images/profile/', $name);
            $user->avatar = 'frontend/assets/images/profile/' . $name;
        }
        $user->update();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
        // dd($user);
    }

    public function changePassword()
    {
        return view('profile.change_password');
    }

    public function PasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|min:8|confirmed'
        ]);
        $current_user = Auth()->user();
        if (Hash::check($request->old_password, $current_user->password)) {
            $current_user->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect()->back()->with('success', 'Password Successfully Updated.');
        } else {
            return redirect()->back()->with('error', 'Old Password Not Matched!');
        }
    }

    public function jobboard()
    {
        return view('jobboard');
    }
}
