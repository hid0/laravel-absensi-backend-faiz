<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login.api');

Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout.api');

Route::middleware(['auth:api'])->group(function () {
    Route::get('/company', [\App\Http\Controllers\Api\CompanyController::class, 'index'])->name('company.api');
});
