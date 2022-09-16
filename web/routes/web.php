<?php

use App\Models\CovidSideEffect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $side_effect = CovidSideEffect::all();
    return view('welcome', compact('side_effect'));
});

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('admin/doctors', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.index');
    Route::get('admin/doctor/create', [App\Http\Controllers\DoctorControll::class, 'create'])->name('doctor.create');

    Route::get('admin/patients', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.index');
    Route::get('admin/patient/create', [App\Http\Controllers\PatientControll::class, 'create'])->name('patient.create');
});

Route::group(['middleware' => ['auth', 'doctor']], function () {
    Route::get('doctor/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('doctor/doctors', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.index');
    Route::get('doctor/doctor/create', [App\Http\Controllers\DoctorControll::class, 'create'])->name('doctor.create');

    Route::get('doctor/patients', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.index');
});
Route::group(['middleware' => ['auth', 'patient']], function () {
    Route::get('patient/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('patient/doctors', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.index');
    Route::get('patient/patients', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.index');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Doctor
Route::get('/doctors', [App\Http\Controllers\DoctorControll::class, 'index'])->name('doctor.index');
Route::get('/doctor/create', [App\Http\Controllers\DoctorControll::class, 'create'])->name('doctor.create');
Route::get('/doctor/edit', [App\Http\Controllers\DoctorControll::class, 'edit'])->name('doctor.edit');

// Patient
Route::get('/patients', [App\Http\Controllers\PatientControll::class, 'index'])->name('patient.index');
Route::get('/patient/create', [App\Http\Controllers\PatientControll::class, 'create'])->name('patient.create');
Route::get('/patient/edit', [App\Http\Controllers\PatientControll::class, 'edit'])->name('patient.edit');
Route::get('/patient/report/view', [App\Http\Controllers\PatientControll::class, 'patientReportView'])->name('patient.report.view');


// Site Setting
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'siteSetting'])->name('site.setting');

// Profile
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'adminProfile'])->name('profile.index');
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change.password');
