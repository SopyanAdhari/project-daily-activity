<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentor\DashboardController;


// Route Mentor
Route::middleware(['auth'])->prefix('mentor')->name('mentor.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
   
});