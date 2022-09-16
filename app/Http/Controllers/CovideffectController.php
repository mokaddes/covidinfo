<?php

namespace App\Http\Controllers;

use App\Traits\SMSAPI;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;
use App\Models\User;
use App\Models\Disease;
use App\Models\Covideffect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CovidSideEffect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientReportUpdateMail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use App\Traits\PdfManager;

class CovideffectController extends Controller
{
    use SMSAPI;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'email' => 'required|unique:users',
            'verify_phone_number' => 'required',
            // 'verification_status' => 'required|min:1|integer'
        ]);

    //    dd($request->all());

        // $request->validate([
        //      'email'                       => 'required|unique:users',
        //      'user_id'                     => 'unique:covideffects',
        //      'recipient_name'              => 'required',
        //      'vaccine_date'                => 'required',
        //      'vaccine_batch'               => 'required',
        //      'on_behalf_relation'          => 'required',
        //      'age'                         => 'required',
        //      'gender'                      => 'required',
        //      'profession'                  => 'required',
        //      'nation'                      => 'required',
        //      'vaccine_type'                => 'required',
        //      'complaints'                  => 'required',
        //      'symptoms'                    => 'required',
        //      'npra'                        => 'required',
        //      'report'                      => 'required',
        //      'covid_side_effect_id'        => 'required',
        //      'affect_quality'              => 'required',
        //      'effect_duration'             => 'required',
        //      'previous_disease'            => 'required'
        // ]);

        try {

            $data = array();
            if ($request->email) {
                $pass = Str::random(8);
                $id = DB::table('users')->insertGetId([
                    'email' => $request->email,
                    'phone_number' => '+60' . $request->verify_phone_number,
                    'name' => $request->recipient_name,
                    'password' => Hash::make($pass),
                    'password_str' => $pass,
                    'role' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
                //mail method
                $user_pass = $pass;
                $user_mail = $request->email;
                $data['user_id'] = $id;
                Session::put('mail', $user_mail);
            }

            $data['on_behalf'] = $request->on_behalf;
            $data['on_behalf_relation'] = $request->on_behalf_relation;
            $data['recipient_name'] = $request->recipient_name;
            $data['age'] = $request->age;
            $data['gender'] = $request->gender;
            $data['profession'] = $request->profession;
            $data['nation'] = $request->nation;
            $data['vaccine_type'] = $request->vaccine_type;
            $data['complaints'] = $request->complaints;
            $data['vaccine_date'] = $request->vaccine_date;
            $data['vaccine_location'] = $request->vaccine_location;
            $data['vaccine_batch'] = $request->vaccine_batch;
            $data['symptoms'] = $request->symptoms;
            $data['other_effect'] = $request->other_effect;
            $data['affect_quality'] = $request->affect_quality;
            $data['hospitalized'] = $request->hospitalized;
            $data['ward_type'] = $request->ward_type;
            $data['hospitalized_duration'] = $request->hospitalized_duration;
            $data['hospital_name'] = $request->hospital_name;
            $data['effect_duration'] = $request->effect_duration;
            $data['present_status'] = $request->present_status;
            $data['diagnosis'] = $request->diagnosis;
            $data['effect_confirm'] = $request->effect_confirm;
            $data['report'] = $request->report;
            $data['npra'] = $request->npra;
            $data['contact'] = $request->contact;
            $data['comments'] = $request->comments;
            $data['vaccine_recipient_card'] = $request->vaccine_recipient_card;
            $data['vaccine_recipient_phone'] = '+60' . $request->verify_phone_number;
            $data['vaccine_recipient_email'] = $request->vaccine_recipient_email;
            $data['vaccine_recipient_countries'] = $request->vaccine_recipient_countries;
            $data['vaccine_recipient_zip'] = $request->vaccine_recipient_zip;
            $file = $request->file('file');
            if ($file) {
                $file_name = date('YmdHis') . '.' . strtolower($file->getClientOriginalExtension());
                $upload_path = 'media/patient/';
                $file_url = $upload_path . $file_name;
                $uploaded = $file->move($upload_path, $file_name);
                $data['file'] = $file_url;
            }
            if ($request->covid_side_effect_id) {
                $covid_side_effect_id_arr = $request->covid_side_effect_id;
                $data['covid_side_effect_id'] = implode(', ', $covid_side_effect_id_arr);
            } else {
                $data['covid_side_effect_id'] = null;
            }
            if ($request->previous_disease) {
                $previous_disease_arr = $request->previous_disease;
                $data['previous_disease'] = implode(', ', $previous_disease_arr);
            } else {
                $data['previous_disease'] = null;
            }
            $data['created_at'] = date('Y-m-d H:i:s');
            DB::table('covideffects')->insert($data);


            $user_id = $data['user_id'];
            $data = Covideffect::with(['user', 'covid_side_effect', 'disease'])
                ->where('user_id', $data['user_id'])
                ->get()
                ->toArray();
            $data['patient'] = Covideffect::with(['user', 'covid_side_effect', 'disease'])
                ->where('user_id', $user_id)
                ->first()
                ->toArray();
            $data['side_effect'] = CovidSideEffect::all();
            $data['previous_disease'] = Disease::all();
            $users = [User::where('email', $user_mail)->first(), User::where('role', 0)->first()];

            $total_len = 6;
            $serial = DB::table('users')->where('role',3)->count()+1;
            $strlen = strlen($serial);
            if( $strlen < $total_len ){
                $serial = sprintf('%06d', $id);
            }


            $data['serial'] = 'terapee'.$serial;
            $pdf_path = PdfManager::user_submit_form_generatePdf('emails.test', 'userformpdf', $data);

            $pdf = PDF::loadView('emails.test', $data);

            foreach ($users as $user) {
                if ($user->role != 0) {
                    $body = 'Your Password is  ' . $user_pass;
                    $welComeMail = DB::table('email_templates')->where('status', 1)->where('type', 'registration')->first();
                    $title = $welComeMail->subject;
                    $body = $welComeMail->body . ' '.'Your Password is: ' . $user_pass;
                } else {
                    $body = 'Admin Mail';
                    $title = 'Mail from Covid Side Effect';
                }

                $pdf_name = 'terapee'.$serial.$request->recipient_name.'.pdf';

                $mails = [
                    'title' => $title,
                    'body' => $body,
                    'url' => $pdf_path['url'],
                    'attach' => $pdf,
                    'name'  => $pdf_name
                ];

                Mail::to($user)->send(new \App\Mail\MyTestMail($mails, $data[0]));
            }

            $Registration_sms =  DB::table('email_templates')->where('type', 'Registration_sms')->where('status',1)->first();

            if($Registration_sms){
                // $msg = $request->recipient_name.' Welcome to TERAPEE. Team kami akan bantu anda segera.';
                $patient_name = $request->recipient_name;
                $body = $Registration_sms->body;
                $msg = str_replace("[patient_name]", $patient_name,$body);
                $phone_number = $request->verify_phone_number;
                $this->sendSMS1($phone_number, $msg);
            }

        } catch (\Exception $exception) {

            //dd($exception);
            return redirect('/')->with('error', $exception->getMessage());

        }
        return redirect('/')->with('success', 'Data Saved Successfully');
        //dd($data);

    }

    public function viewEmail()
    {
        $data['patient'] = Covideffect::with(['user', 'covid_side_effect', 'disease'])
            ->where('user_id', 71)
            ->first()
            ->toArray();
        $data['side_effect'] = CovidSideEffect::all();
        $data['previous_disease'] = Disease::all();

        return view('emails.test', $data);
    }

    public function PatientReport(Request $request, $id)
    {

        $side_effect = CovidSideEffect::all();
        $previous_disease = Disease::all();
        $patient = DB::table('covideffects')
            ->leftjoin('users', 'users.id', '=', 'covideffects.user_id')
            ->leftjoin('covid_side_effects', 'covid_side_effects.id', '=', 'covideffects.covid_side_effect_id')
            ->leftjoin('diseases', 'diseases.id', '=', 'covideffects.previous_disease')
            ->where('covideffects.user_id', $id)
            ->first();
        return view('admin.patient.patient_report', compact('side_effect', 'previous_disease', 'patient'));
    }

    public function PatientReportUpdate(Request $request, $id)
    {


        // $patient_report = Covideffect::where('user_id', $request->user_id)->first();
        // if (!empty($patient_report->user_id)) {
        //     $patient_mail = User::where('id', $patient_report->user_id)->first()->email;
        //     // return $patient_mail;
        // }

        // if (!empty($patient_report->doctor_id)) {
        //     $doctor_mail = User::where('id', $patient_report->doctor_id)->first()->email;
        //     // return $doctor_mail;
        // }

        // $admin_mail = User::where('role', 1)->first()->email;

        // // Mail::to($admin_mail)
        // //     ->cc($patient_mail)
        // //     ->bcc($doctor_mail)
        // //     ->send(new PatientReportUpdateMail($mails));


        // $emails = [];
        // if (!empty($request->user_id)) {
        //     $emails[] = User::where('id', $request->user_id)->first()->email;
        // }

        // if (!empty($request->doctor_id)) {
        //     $emails[] = User::where('id', $request->doctor_id)->first()->email;
        // }
        // $mails = [
        //     'title' => "Patient report Updated",
        //     'body' => "We are serius to you",

        // ];

        // Mail::to($emails)
        //     ->send(new PatientReportUpdateMail($mails));


        // // return  $patient_report;
        // if (isset($patient_report)) {
        //     $patient_report->report_status = $request->report_status;
        //     if ($patient_report->doctor_history) {
        //         $doctor_history = $patient_report->doctor_history . ',' . $request->doctor_id;
        //         $patient_report['doctor_history'] = $doctor_history;
        //     } else {
        //         $patient_report['doctor_history'] = $request->doctor_id;
        //     }
        //     $patient_report->doctor_id = $request->doctor_id;
        //     $patient_report->remarks = $request->remarks;
        //     $patient_report->update();
        // }



        $request->validate([
            // 'email' => 'required|unique:users',
            // 'verify_phone_number' => 'required',
            // 'verification_status' => 'required|min:1|integer'
        ]);

        try {


            $data = array();

            if($request->on_behalf){

                $data['on_behalf'] = $request->on_behalf;
            }

            if($request->on_behalf_relation){

                $data['on_behalf_relation'] = $request->on_behalf_relation;
            }
            if($request->recipient_name){
                $data['recipient_name'] = $request->recipient_name;
            }

            if($request->age){
                $data['age'] = $request->age;
            }
            if($request->gender){$data['gender'] = $request->gender;}
            if($request->profession){ $data['profession'] = $request->profession;}
            if($request->nation){ $data['nation'] = $request->nation;}
            if($request->vaccine_type){$data['vaccine_type'] = $request->vaccine_type;}
            if($request->complaints){ $data['complaints'] = $request->complaints;}
            if($request->vaccine_date){ $data['vaccine_date'] = $request->vaccine_date;}
            if($request->vaccine_location){$data['vaccine_location'] = $request->vaccine_location;}
            if($request->vaccine_batch){ $data['vaccine_batch'] = $request->vaccine_batch;}
            if($request->symptoms){$data['symptoms'] = $request->symptoms;}
            if($request->other_effect){ $data['other_effect'] = $request->other_effect;}
            if($request->affect_quality){$data['affect_quality'] = $request->affect_quality;}
            if($request->hospitalized){$data['hospitalized'] = $request->hospitalized;}
            if($request->ward_type){ $data['ward_type'] = $request->ward_type;}
            if($request->hospitalized_duration){ $data['hospitalized_duration'] = $request->hospitalized_duration;}
            if($request->hospital_name){ $data['hospital_name'] = $request->hospital_name;}
            if($request->effect_duration){ $data['effect_duration'] = $request->effect_duration;}
            if($request->present_status){ $data['present_status'] = $request->present_status;}
            if($request->diagnosis){$data['diagnosis'] = $request->diagnosis;}
            if($request->effect_confirm){ $data['effect_confirm'] = $request->effect_confirm;}
            if($request->report){$data['report'] = $request->report;}
            if($request->npra){$data['npra'] = $request->npra;}
            if($request->contact){ $data['contact'] = $request->contact;}
            if($request->comments){$data['comments'] = $request->comments;}
            if($request->vaccine_recipient_card){$data['vaccine_recipient_card'] = $request->vaccine_recipient_card;}
            if($request->verify_phone_number){$data['vaccine_recipient_phone'] = '+60' . $request->verify_phone_number;}
            if($request->vaccine_recipient_email){$data['vaccine_recipient_email'] = $request->vaccine_recipient_email;}
            if($request->vaccine_recipient_countries){ $data['vaccine_recipient_countries'] = $request->vaccine_recipient_countries;}
            if($request->vaccine_recipient_zip){$data['vaccine_recipient_zip'] = $request->vaccine_recipient_zip;}


            $file = $request->file('file');
            if ($file) {
                $file_name = date('YmdHis') . '.' . strtolower($file->getClientOriginalExtension());
                $upload_path = 'media/patient/';
                $file_url = $upload_path . $file_name;
                $uploaded = $file->move($upload_path, $file_name);
                $data['file'] = $file_url;
            }
            if ($request->covid_side_effect_id) {
                $covid_side_effect_id_arr = $request->covid_side_effect_id;
                $data['covid_side_effect_id'] = implode(', ', $covid_side_effect_id_arr);
            } else {
                $data['covid_side_effect_id'] = null;
            }
            if ($request->previous_disease) {
                $previous_disease_arr = $request->previous_disease;
                $data['previous_disease'] = implode(', ', $previous_disease_arr);
            } else {
                $data['previous_disease'] = null;
            }
            $data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('covideffects')->where('user_id',$id)->update($data);

        } catch (\Exception $exception) {

            // dd($exception);
            redirect()->back()->with('error', $exception->getMessage());

        }



        return redirect()->back()->with('success', 'Data Updated Successfully');
    }

    public function updateReportStatus(Request $request)
    {

        $auth_id = Auth::id();
        $setting = DB::table('web_settings')->first();
        $report = Covideffect::query()->where('user_id', $request->user_id)->first();

        $patient = User::where('id', $request->user_id)->first();
        // $patient_email[] = $patient->email;
        // $admin_email[] = User::where('role', 1)->first()->email;

        if ($request->doctor_id && ($request->doctor_id != $report->f_doctor_no)) {
            $doctor = User::query()
                ->where('id', $request->doctor_id)
                ->first();
            $report->doctor_id = $request->doctor_id;
            DB::table('covideffect_doctor_mapping')
                ->where('f_patient_no', $request->user_id)
                ->where('status', 1)
                ->update([
                    'unassign_at' => date('Y-m-d H:i:s'),
                    'unassign_by' => $auth_id,
                    'updated_by' => $auth_id,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 0
                ]);
            DB::table('covideffect_doctor_mapping')
                ->insert([
                    'f_covideffect_no' => $report->id,
                    'f_patient_no' => $report->user_id,
                    'f_doctor_no' => $request->doctor_id,
                    'assign_at' => date('Y-m-d H:i:s'),
                    'assign_by' => $auth_id,
                    'created_by' => $auth_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]);

            // $doctor_email[] = $doctor->email;

            $Doctor_assigned_to_doctor =  DB::table('email_templates')->where('type', 'Doctor_assigned_to_doctor')->where('status',1)->first();
            $Doctor_assigned_to_patient =  DB::table('email_templates')->where('type', 'Doctor_assigned_to_patient')->where('status',1)->first();

            if($Doctor_assigned_to_doctor){
                $mails = [
                    'title' => $Doctor_assigned_to_doctor->subject ?? "Assign Doctor",
                    'body' => "Doctor Name: " . $doctor->name . " , Patient Name: " . $patient->name. '<br>'.$Doctor_assigned_to_doctor->body ,
                ];
                Mail::to($doctor->email)->send(new PatientReportUpdateMail($mails));
            }

            if($Doctor_assigned_to_patient){
                $mails1 = [
                    'title' => $Doctor_assigned_to_patient->subject ?? "Assign Doctor",
                    'body' => "Doctor Name: " . $doctor->name . " , Patient Name: " . $patient->name . '<br>'. $Doctor_assigned_to_patient->body,
                ];
                Mail::to($patient->email)->send(new PatientReportUpdateMail($mails1));
            }

            $Doctor_assigned_to_doctor_sms =  DB::table('email_templates')->where('type', 'Doctor_assigned_to_doctor_sms')->where('status',1)->first();
            $Doctor_assigned_to_patient_sms =  DB::table('email_templates')->where('type', 'Doctor_assigned_to_patient_sms')->where('status',1)->first();

            if ($doctor->phone_number) {
                if($Doctor_assigned_to_doctor_sms){
                    $patient_name = $patient->name;
                    $doctor_name = $doctor->name;
                    $body = $Doctor_assigned_to_doctor_sms->body;
                    $msg = str_replace("[patient_name]", $patient_name,$body);
                    $msg = str_replace("[Appoint_Doctor]", $doctor_name,$msg);
                    $phone_number = $doctor->phone_number;
                    $this->sendSMS1($phone_number, $msg);
                }
            }

            if($patient->phone_number){
                if($Doctor_assigned_to_patient_sms){
                    $patient_name = $patient->name;
                    $doctor_name = $doctor->name;
                    $body = $Doctor_assigned_to_patient_sms->body;
                    $msg1 = str_replace("[patient_name]", $patient_name,$body);
                    $msg1 = str_replace("[Appoint_Doctor]", $doctor_name,$msg1);

                    $phone_number = $patient->phone_number;
                    $this->sendSMS1($phone_number, $msg1);
                }
            }
        }


        if ($request->report_status) {
            $reportStatus = Config::get('static_array.report_status');

            $report->report_status = $request->report_status;
            $doctor = User::query()->where('id', $request->doctor_id)->first();


            $Change_status =  DB::table('email_templates')->where('type', 'Change_status')->where('status',1)->first();
            $Change_status_sms =  DB::table('email_templates')->where('type', 'Change_status_sms')->where('status',1)->first();

            if($Change_status){
                if($report->report_status == 1){$status = 'Attended';}elseif($report->report_status == 2){$status = 'Under Treatments';}elseif($report->report_status == 3){$status = 'Victim Dead';}elseif($report->report_status == 4){$status = 'Give Some Medicine';}else{$status = 'Problem Solved';}
                $msg = [
                    'title' => $Change_status->subject ?? "Patient Status Changed",
                    'body' => "Status: " . $status . " , Patient Name: " . $patient->name .'<br>'.$Change_status->body,
                ];
                $doctor_patient_email=[];
                $doctor_patient_email[] = $doctor->email;
                $doctor_patient_email[] = $patient->email;
                Mail::to($doctor_patient_email)->send(new PatientReportUpdateMail($msg));
            }


            if($patient->phone_number){
                if($Change_status_sms){
                    $updates = $reportStatus[$request->report_status] ?? null;
                    $patient_name = $patient->name;
                    $body = $Change_status_sms->body;
                    $msg1 = str_replace("[updates]", $updates, $body);
                    $msg1 = str_replace("[patient_name]", $patient_name, $msg1);
                    $phone_number = $patient->phone_number;
                    $this->sendSMS1($phone_number, $msg1);
                }
            }
        }


        $report->update();
        return response()->json(['report' => $report]);
    }

    public function sendOTP(Request $request)
    {
        $request->validate([
            'phone' => 'required|min:9|max:10',
        ]);



        $otp = rand(1000, 9999);
        // Session::put('otp', $otp);
        $phone = $request->get('phone');
        $user_id = Session::getId();
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $todate = date('Y-m-d');
        $check_v = DB::table('otp_verification')->where('mobile', $phone)->where('status',1)->first();
        if($check_v){
            return response()->json([
                'success' => false,
                'otp_pin' => $otp,
                'verification' => 'verified',
                'msg' => 'This number already verified',
            ]);
        }

        $check = DB::table('otp_verification')->where('user_id', $user_id)->where('otp_date', $todate)->get();

        //daily d times er besi send kora jabe na.
        if ($check && count($check) > 5) {
            return response()->json([
                'success' => false,
                'otp_pin' => $otp,
                'msg' => 'Please try next day',
            ]);
        } else {
            DB::table('otp_verification')->where('user_id', $user_id)->update(['status' => 2]);
            DB::table('otp_verification')->insert([
                'mobile' => $phone,
                'user_id' => $user_id,
                'otp_date' => date('Y-m-d'),
                'otp' => $otp,
                'status' => 0,
                'expire_time' => $expire_time,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => null,
                'updated_by' => null,
            ]);

            // $response = true;
            $response = $this->sendSMS($phone, $otp);
            if ($response) {
                return response()->json([
                    'success' => true,
                    'otp_pin' => $otp,
                    'msg' => 'Check your mobile for OTP',
                ]);

            } else {
                return response()->json([
                    'success' => false,
                    'otp_pin' => $otp,
                    'msg' => 'OTP sending failed',
                ]);
            }

        }

    }

    public function verifyOTP(Request $request)
    {

        $request->validate([
            'otp' => 'required|min:4|max:4',
            'phone_number' => 'required|min:9|max:10',
        ]);

        $phone = $request->get('phone_number');
        $user_id = Session::getId();
        $expire_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
        $todate = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        $check = DB::table('otp_verification')
            ->where('mobile', $phone)
            ->where('user_id', $user_id)
            ->where('otp_date', $todate)
            ->where('status', 0)
            ->where('expire_time', '>', $now)
            ->first();
            // echo $check->expire_time;
            // echo '<br>';
            // echo $now;
            // die();

        if($check){
            if($check->expire_time < $now){
                return response()->json([
                    'success'   => false,
                    'msg'       => 'This OTP is expired',
                ]);
            }elseif($check->otp == $request->otp){


                DB::table('otp_verification')
                   ->where('id', $check->id)
                   ->update(['status' => 1]);

               return response()->json([
                   'success'   => true,
                   'msg'       => 'OTP verification successful',
               ]);

           }else {
               return response()->json([
                   'success'   => false,
                   'msg'       => 'This OTP is invalid',
               ]);
            }

        }else{
            return response()->json([
                'success' => false,
                'msg' => 'Something wrong please try again',
            ]);
        }

        // if (Session::get('otp') && Session::get('otp') == $request->get('otp')) {
        //     Session::put('otp_verified', true);
        //     return response()->json([
        //         'success' => true
        //     ]);
        // }
        // return response()->json([
        //     'success' => false
        // ]);
    }

}
