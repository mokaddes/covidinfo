<?php

namespace App\Http\Controllers;

use App\Models\Covideffect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
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
        $data['doctors'] = User::where('role', 2)->get();
        $data['patients'] = User::where('role', 3)->get();
        $data['covid_reports'] = DB::table('covideffects')->get();
        $date = Carbon::now()->subDays(7);
        $data['LastSevendays'] = DB::table('covideffects')->where('created_at', '>=', $date)->get();
        $data['recent_report'] = DB::table('users')->limit(10)->get();
        $data['attendend'] = DB::table('covideffects')->whereReportStatus(1)->count();
        $data['dead'] = DB::table('covideffects')->whereReportStatus(3)->count();
        $data['under_treatment'] = DB::table('covideffects')->whereReportStatus(2)->count();
        $data['record_graph'] = Covideffect::query()
            ->select(DB::raw('count(*) as report_count'), 'created_at')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get()
            ->toArray();
//        dd($data['record_graph']);
        $data['graph'] = null;
        $data['graph_label'] = null;
        $data['report_sum'] = 0;
        foreach ($data['record_graph'] as $datum) {
            $data['report_sum'] += $datum['report_count'];
            if ($data['graph'] == null) {
                $data['graph'] = "[" . $datum['report_count'];
                $data['graph_label'] = "['" . date('d M', strtotime($datum['created_at'])) . "'";
            } else {
                $data['graph'] .= "," . $datum['report_count'];
                $data['graph_label'] .= ",'" . date('d M', strtotime($datum['created_at'])) . "'";
            }
        }
        $data['graph'] .= ']';
        $data['graph_label'] .= ']';
        return view('admin_dashboard', $data);
    }

    // public function adminProfile()
    // {
    //     return view('profile.index');
    // }

    // public function profileUpdate(Request $request)
    // {
    //     $request->validate([
    //         'name'      => 'required',
    //         'email'     => 'required|email',
    //         'avatar'    => 'mimes:jpeg,png,jpg'
    //     ]);

    //     $user             = User::find(auth()->user()->id);
    //     $user['name']     = $request->name;
    //     $user['email']    = $request->email;
    //     if ($request->hasFile('avatar')) {
    //         // delete old image
    //         $destination = public_path($user->avatar);
    //         if (file_exists($destination)) {
    //             File::delete($destination);
    //         }
    //         // add new image
    //         $image = $request->file('avatar');
    //         $name  = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move('frontend/assets/images/profile/', $name);
    //         $user->avatar = 'frontend/assets/images/profile/' . $name;
    //     }
    //     $user->update();
    //     return redirect()->back()->with('success', 'Profile Updated Successfully');
    // }

    // public function changePassword()
    // {
    //     return view('profile.change_password');
    // }

    // public function PasswordUpdate(Request $request)
    // {
    //     $request->validate([
    //         'old_password' => 'required',
    //         'password'     => 'required|min:8|confirmed'
    //     ]);
    //     $current_user = Auth()->user();
    //     if (Hash::check($request->old_password, $current_user->password)) {
    //         $current_user->update([
    //             'password' => bcrypt($request->password)
    //         ]);
    //         return redirect()->back()->with('success', 'Password Successfully Updated.');
    //     } else {
    //         return redirect()->back()->with('error', 'Old Password Not Matched!');
    //     }
    // }

    // public function jobboard()
    // {
    //     return view('jobboard');
    // }


    public function user()
    {
        $user = User::where('role', 0)->orWhere('role', 1)->where('id', '!=', Auth::user()->id)->get();
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required|min:10|max:11',
            'role' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.user.index')->with('success', 'User Create Successfully.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|min:10|max:11',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->route('admin.user.index')->with('success', 'User Updated Successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully.');
    }
}
