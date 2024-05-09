<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard', ['type_menu' => 'home']);
    })->name('home');

    Route::resource('users', UserController::class);

    Route::resource('companies', CompanyController::class);

    Route::resource('attendances', AttendanceController::class);
});

Route::get('/forgot-password', function () {
    return view('pages.auth.forgot-password');
})->middleware('guest')->name('password.request');
