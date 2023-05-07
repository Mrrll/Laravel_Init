<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Mails\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Email Verify Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Email Verify routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Email Verify" middleware group. Make something great!
|
*/

Route::get('/email/verify', function () {
  return view('auth.mails.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verification', function (EmailVerificationRequest $request) {
  $request->fulfill();
  return redirect()->intended('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
  try {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', [
      'type' => 'success',
      'title' => 'Success !',
      'message' =>
        'Verification link has been sent successfully! Check your inbox.',
    ]);
  } catch (\Throwable $th) {
    return back()->with('message', [
      'type' => 'danger',
      'title' => 'Error !',
      'message' =>
        'An error has occurred, check the data and try again if it is not solved, contact your administrator.',
    ]);
  }
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
