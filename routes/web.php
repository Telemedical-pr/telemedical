<?php

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
Route::redirect('/home', '/dashboard', 301);
Auth::routes();

Route::redirect('', '/dashboard', 301);
// General Routes
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');

// Admin Routes

Route::get('/system_users', [App\Http\Controllers\DashboardController::class, 'systemUsers'])->name('system_users');

// Patients Routes
Route::get('/doctors', 'App\Http\Controllers\DashboardController@doctors')->name('doctors')->middleware(['auth','patient']);

Route::group(['prefix'=>'api'], function(){
    Route::apiresource('symptoms', 'App\Http\Controllers\SymptomsController');
    Route::apiresource('prescriptions', 'App\Http\Controllers\PrescriptionsController');
    Route::apiresource('visits', 'App\Http\Controllers\VisitsController');
    Route::apiresource('doctors', 'App\Http\Controllers\DoctorsController');
    Route::apiresource('diagnosis', 'App\Http\Controllers\DiagnosisController');
    Route::post('patient_update', 'App\Http\Controllers\ProfileController@patientUpdate')->name('patient_update');
    Route::post('doctor_update', 'App\Http\Controllers\ProfileController@doctorUpdate')->name('doctor_update');
});
