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

Route::redirect('/', '/dashboard');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/prescriptions', [App\Http\Controllers\DashboardController::class, 'prescriptions'])->name('prescriptions');

Route::post('/api/logo-upload','App\Http\Controllers\DashboardController@uploadLogo')->middleware('auth');
