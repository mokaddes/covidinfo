<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function PrivacyPolicy()
    {
        $data = PrivacyPolicy::first();
        return view('privacy-policy', compact('data'));
    }

    public function index()
    {
        $data = PrivacyPolicy::first();
        return view('admin.setting.privacy_policy', compact('data'));
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'title' => 'required',
            'details' => 'required',
         ]);

         $data = PrivacyPolicy::find($id);
         $data->title   = $request->title;
         $data->details = $request->details;
         $data->save();
         return redirect()->back()->with('success', 'Privacy Policy Updated Successfully');
    }
}
