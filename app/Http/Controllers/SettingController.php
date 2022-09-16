<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 0) {
            abort(404);
        }
        $setting = new Setting();
        $setting = DB::table('web_settings')->first();
        return view('admin.setting.index', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role != 0) {
            abort(404);
        }
        $request->validate([
            'app_name'      => 'required',
            'keywords'      => 'required',
            'description'   => 'required',
            'footer'        => 'required',
            'logo'          => 'mimes:png,jpg,jpeg',
            'favicon'       => 'mimes:png,ico'
        ]);

        $setting = Setting::find($id);
        $setting->app_name       = $request->app_name;
        $setting->keywords       = $request->keywords;
        $setting->description    = $request->description;
        $setting->footer         = $request->footer;
        if ($request->hasFile('logo')) {
            //delete old image
            $destination = public_path($setting->logo);
            if (file_exists($destination)) {
                File::delete($destination);
            }
            // add new image
            $image = $request->file('logo');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('back/images/', $name);
            $setting->logo = 'back/images/' . $name;
        }

        if ($request->hasFile('favicon')) {
            //delete old image
            $destination = public_path($setting->favicon);
            if (file_exists($destination)) {
                File::delete($destination);
            }
            // add new image
            $image = $request->file('favicon');
            $name  = time() . '.' . $image->getClientOriginalExtension();
            $image->move('back/images/', $name);
            $setting->favicon = 'back/images/' . $name;
        }
        $setting->update();
        return redirect()->back()->with('success', 'Setting Updated Successfully');
    }

    public function SmtpSetting()
    {
        if (Auth::user()->role != 0) {
            abort(404);
        }
        $smtp = DB::table('smtp')->first();
        $email_template = DB::table('email_templates')->get();
        return view('admin.setting.smtp_setting', compact('smtp', 'email_template'));
    }

    public function SmtpSettingUpdate(Request $request, $id)
    {
        $request->validate([
            'email_driver'        => 'required',
            'email_host'        => 'required',
            'email_port'        => 'required',
            'email_encryption'  => 'required',
            'email_user'        => 'required',
            'email_pass'        => 'required',
            'email_from'        => 'required',
            'email_from_name'   => 'required',
            'contact_email'     => 'required'
        ]);

        $data = array();
        $data['email_driver']       = $request->email_driver;
        $data['email_host']         = $request->email_host;
        $data['email_port']         = $request->email_port;
        $data['email_encryption']   = $request->email_encryption;
        $data['email_user']         = $request->email_user;
        $data['email_pass']         = $request->email_pass;
        $data['email_from']         = $request->email_from;
        $data['email_from_name']    = $request->email_from_name;
        $data['contact_email']      = $request->contact_email;
        DB::table('smtp')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Data Updated Successfully.');
    }

    public function EmailSetting($id)
    {
        if (Auth::user()->role != 0) {
            abort(404);
        }
        $data = DB::table('email_templates')->where('id', $id)->first();
        return view('admin.setting.edit_smtp_setting', compact('data'));
    }

    public function EmailSettingUpdate(Request $request, $id)
    {
        if (Auth::user()->role != 0) {
            abort(404);
        }
        $request->validate([
            'subject'       => 'required',
            'body'          => 'required',
            'status'    => 'required',

        ]);

        $data = array();
        $data['subject']            = $request->subject;
        $data['body']               = $request->body;
        $data['status']         = $request->status;


        DB::table('email_templates')->where('id', $id)->update($data);
        return redirect()->route('admin.email.setting')->with('success', 'Email Template Updated Successfully.');
    }
}
