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

Route::get('/', [App\Http\Controllers\RoutesController::class, 'homepage'])->name('homepage');
Route::redirect('/home', '/dashboard', 301);
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/prescriptions', [App\Http\Controllers\DashboardController::class, 'prescriptions'])->name('prescriptions');

Route::resource('doctors', 'App\Http\Controllers\DoctorsController');
