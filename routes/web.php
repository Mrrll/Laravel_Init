<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Notifications\PruebaEmail;

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
       return redirect()->intended('dashboard');
    } else {
        return view('welcome');
    }
})->name('welcome');

// Rutas Protegidas
Route::group(['middleware' => ['auth', 'auth.session', 'verified']],function () {
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Setting
        // Setting Appearance
        Route::get('setting', [SettingController::class, 'create'])->name('setting.create');
        Route::post('setting/appearance', [SettingController::class, 'appearance'])->name('setting.appearance');
        Route::get('setting/{setting}/edit', [SettingController::class, 'edit'])->name('setting.edit');
        Route::patch('setting/appearance/update/{setting}', [SettingController::class, 'appearanceUpdate'])->name('setting.appearance.update');
        // Profile
        Route::resource('profile', ProfileController::class)->except(['index', 'show', 'destroy']);

    }
);
