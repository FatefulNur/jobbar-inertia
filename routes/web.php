<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobDetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('frontend.home');
Route::get('/jobs/{job}', JobDetailsController::class)->name('frontend.job_details');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('jobs', JobController::class);
});

require __DIR__.'/auth.php';
