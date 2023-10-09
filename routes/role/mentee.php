<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentee\DashboardController;


// Route Mentee
Route::middleware(['auth'])->prefix('mentee')->name('mentee.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
   
});