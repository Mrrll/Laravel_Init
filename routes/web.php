<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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
require('auth.php');
require('verify_email.php');
require('forgot_password.php');

Route::get('/', function () {
    if (Auth::check()) {
        return view('dashboard');
    } else {
        return view('welcome');
    }
})->name('welcome');
// Rutas Protegidas

Route::group(['middleware' => ['auth', 'auth.session', 'verified']],function () {
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    }
);
