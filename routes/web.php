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

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');




Route::group(['prefix'=>'api'], function(){
    Route::apiresource('symptoms', 'App\Http\Controllers\SymptomsController');
    Route::apiresource('prescriptions', 'App\Http\Controllers\PrescriptionsController');
    Route::apiresource('visits', 'App\Http\Controllers\VisitsController');
    Route::apiresource('doctors', 'App\Http\Controllers\DoctorsController');
});
