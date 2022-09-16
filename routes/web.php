<?php

use App\Models\CovidSideEffect;
use App\Models\Setting;
use App\Models\Disease;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cc', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
	return 'DONE';
});

Route::get('/invoice', function () {
    return view('invoice');
});

Route::get('/', function () {
    $side_effect      = CovidSideEffect::all();
    $previous_disease = Disease::all();
    $websetting       = Setting::first();
    $totalPatient     = User::where('role', 3)->get();
    $today            = date('Y-m-d');
    $todayPatient     = User::where('role', 3)->whereDate('created_at', date('Y-m-d'))->get();
    $date             = Carbon::now()->subDays(7);
    $LastSevendays    = User::where('role', 3)->where('created_at', '>=', $date)->get();
    $totaltherapist   = User::where('role', 2)->get();
    $toralDoctor   = User::where('role', 2)->get();

    // $serial = DB::table('users')->where('role',3)->count()+1;
    // dd($serial);

    return view('welcome', compact('side_effect', 'previous_disease', 'totalPatient', 'LastSevendays', 'todayPatient', 'websetting', 'totaltherapist') );
});

Route::post('/send-otp', [App\Http\Controllers\CovideffectController::class, 'sendOTP'])->name('send-otp');
Route::post('/verify-otp', [App\Http\Controllers\CovideffectController::class, 'verifyOTP'])->name('verify-otp');
Route::get('/date', function () {
    return view('date');
});
Route::get('/report-email-view', [App\Http\Controllers\CovideffectController::class, 'viewEmail']);
Route::get('/success', function () {
    return view('success');
});
Route::post('side-effect', [App\Http\Controllers\CovideffectController::class, 'store'])->name('effect.store');
Route::post('/patient-report/update/', [App\Http\Controllers\CovideffectController::class, 'PatientReportUpdate'])->name('patientreport.update');
Route::post('patient-report-update-ajax', [App\Http\Controllers\CovideffectController::class, 'updateReportStatus'])->name('patient-report-update-ajax');
Route::get('changelang/{lang}', [App\Http\Controllers\LangController::class, 'changelang'])->name('changelang');

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::get('admin/doctors', [App\Http\Controllers\AdminDoctorControll::class, 'index'])->name('admin.doctor.index');
    Route::get('admin/doctor/create', [App\Http\Controllers\AdminDoctorControll::class, 'create'])->name('admin.doctor.create');
    Route::get('admin/doctor/edit/{id}', [App\Http\Controllers\AdminDoctorControll::class, 'edit'])->name('admin.doctor.edit');
    Route::put('admin/doctor/update/{id}', [App\Http\Controllers\AdminDoctorControll::class, 'update'])->name('admin.doctor.update');
    Route::post('admin/doctor/store', [App\Http\Controllers\AdminDoctorControll::class, 'store'])->name('admin.doctor.store');
    Route::get('doctors/delete/{id}', [App\Http\Controllers\AdminDoctorControll::class, 'destroy'])->name('doctor.delete');
    Route::get('doctors/view/previous/{id}', [App\Http\Controllers\AdminDoctorControll::class, 'ViewPreviousDoctor'])->name('view.previous.doctor');
    Route::post('admin/patient/remarks', [App\Http\Controllers\AdminPatientControll::class, 'remarks'])->name('admin.patient.remarks');
    Route::get('admin/patients', [App\Http\Controllers\AdminPatientControll::class, 'index'])->name('admin.patient.index');
    Route::get('admin/patient/create', [App\Http\Controllers\AdminPatientControll::class, 'create'])->name('admin.patient.create');
    // Site Setting
    Route::get('admin/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('admin.site.setting');
    Route::post('admin/setting/update/{id}', [App\Http\Controllers\SettingController::class, 'update'])->name('admin.setting.update');
    Route::get('admin/settings/smtp', [App\Http\Controllers\SettingController::class, 'SmtpSetting'])->name('admin.email.setting');
    Route::post('admin/settings/smtp/{id}', [App\Http\Controllers\SettingController::class, 'SmtpSettingUpdate'])->name('admin.smtp.setting.update');
    Route::get('admin/settings/email/{id}', [App\Http\Controllers\SettingController::class, 'EmailSetting'])->name('admin.email.edit');
    Route::post('admin/settings/email/{id}', [App\Http\Controllers\SettingController::class, 'EmailSettingUpdate'])->name('admin.email.update');
    // user role
    Route::get('admin/user/', [App\Http\Controllers\AdminController::class, 'user'])->name('admin.user.index');
    Route::get('admin/user/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.user.create');
    Route::post('admin/user/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.user.store');
    Route::get('admin/user/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.user.edit');
    Route::post('admin/user/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.user.update');
    Route::get('admin/user/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.user.destroy');
    //patient
    // Route::get('/patient/create', [App\Http\Controllers\AdminPatientControll::class, 'create'])->name('admin.patient.create');
    Route::post('admin/patient', [App\Http\Controllers\AdminPatientControll::class, 'store'])->name('admin.patient.store');
    Route::get('admin/patient/edit/{id}', [App\Http\Controllers\AdminPatientControll::class, 'edit'])->name('admin.patient.edit');
    Route::put('admin/patients/{id}', [App\Http\Controllers\AdminPatientControll::class, 'update'])->name('admin.patient.update');
    Route::get('admin/patient/report/view/{id}', [App\Http\Controllers\AdminPatientControll::class, 'patientReportView'])->name('admin.patient.report.view');
    Route::get('generate_pdf/{id}', [App\Http\Controllers\AdminPatientControll::class, 'generatePdf'])->name('generatePdf');
    // privacy-policy
    Route::get('admin/privacy-policy', [App\Http\Controllers\PrivacyPolicyController::class, 'index'])->name('admin.privacy_policy');
    Route::post('admin/privacy-policy/{id}', [App\Http\Controllers\PrivacyPolicyController::class, 'update'])->name('privacy_policy.update');
    Route::get('admin/patient-report/{id}/edit', [App\Http\Controllers\CovideffectController::class, 'PatientReport'])->name('patient.report.edit');
    Route::post('/patient-report/{id}/update/', [App\Http\Controllers\CovideffectController::class, 'PatientReportUpdate'])->name('patient.report.update');
});

Route::group(['middleware' => ['auth', 'doctor']], function () {
    Route::get('doctor/home', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.home');
    // Route::get('doctor/doctors', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.doctor.index');
    // Route::get('doctor/doctor/create', [App\Http\Controllers\DoctorControll::class, 'create'])->name('doctor.doctor.create');
    Route::get('doctor/patient/report/view/{id}', [App\Http\Controllers\DoctorPatientControll::class, 'patientReportView'])->name('doctor.patient.report.view');
    Route::get('doctor/patients', [App\Http\Controllers\DoctorPatientControll::class, 'index'])->name('doctor.patient.index');
    Route::get('doctor/oldpatient', [App\Http\Controllers\DoctorPatientControll::class, 'oldpatient'])->name('doctor.oldpatient.index');
    Route::post('doctor/patient/remarks', [App\Http\Controllers\DoctorPatientControll::class, 'remarks'])->name('doctor.patient.remarks');


});

Route::group(['middleware' => ['auth', 'patient']], function () {
    Route::get('patient/home', [App\Http\Controllers\PatientControll::class, 'home'])->name('patient.home');
    // Route::get('patient/doctors', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.doctor.index');
    // Route::get('patient/patients', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.patient.index');
    // Route::get('patient/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('patient/doctors', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.index');
    // Route::get('patient/patients', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Doctor
// Route::get('/doctors', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.index');
// Route::get('/doctor/create', [App\Http\Controllers\DoctorControll::class, 'create'])->name('doctor.create');
// Route::put('/doctors/{id}', [App\Http\Controllers\DoctorControll::class, 'update'])->name('doctor.update');
// Route::get('/doctors/delete/{id}', [App\Http\Controllers\DoctorControll::class, 'destroy'])->name('doctor.destroy');
// Route::resource('doctor', App\Http\Controllers\DoctorControll::class);
// Patient
Route::get('/patients', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.index');

Route::get('/patients/delete/{id}', [App\Http\Controllers\PatientControll::class, 'distroy'])->name('patient.delete');

// Profile
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'adminProfile'])->name('profile.index');
Route::post('/profile', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('profile.update');
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change.password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'PasswordUpdate'])->name('update.password');
// privacy policy
Route::get('/privacy-policy', [App\Http\Controllers\PrivacyPolicyController::class, 'PrivacyPolicy'])->name('privacy.policy');

Route::get('/ajax/get-report-user', [App\Http\Controllers\PopupController::class, 'getAjaxReport']);
