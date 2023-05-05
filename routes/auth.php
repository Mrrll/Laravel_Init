<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Authentication routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Authentication" middleware group. Make something great!
|
*/
Route::controller(AuthenticationController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::get('login', 'login')->name('login');
    Route::post('register', 'registered')->name('register');
    Route::post('login', 'Authorization')->name('login');
});
