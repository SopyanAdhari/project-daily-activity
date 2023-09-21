<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MenteeController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('role', RoleController::class);
Route::resource('division', DivisionController::class);
Route::resource('mentor', MentorController::class);
Route::resource('mentee', MenteeController::class);
Route::put('mentee/verifikasi/{id}',[MenteeController::class, 'updateVerifikasi'])->name('mentee.verifikasi');
