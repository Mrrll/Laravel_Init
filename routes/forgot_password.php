<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Forgot Password Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Forgot Password routes for your application. These
| routes are loaded by the Route ServiceProvider and all of them will
| be assigned to the "Forgot Password" middleware group. Make something great!
|
*/

Route::post('/forgot-password', function (Request $request) {
  $request->validate(['email' => 'required|email']);

  $status = Password::sendResetLink($request->only('email'));

  return $status === Password::RESET_LINK_SENT
    ? back()->with([
      'status' => __($status),
      'message' => [
        'type' => 'info',
        'title' => 'Message sent !',
        'message' => 'The message was delivered, follow the instructions to change the password.'
      ],
    ])
    : back()->withErrors([
        'email' => __($status),
        'message' => [
        'type' => 'danger',
        'title' => 'The message could not be sent !',
        'message' => 'The message could not be delivered, check your settings and if the problem persists, contact your administrator.'
      ],
    ]);
})
  ->middleware('guest')
  ->name('password.email');

Route::get('/reset-password/{token}', function (
  Request $request,
  string $token
) {
  return view('auth.password.reset-password', [
    'token' => $token,
    'email' => (string) $request->query('email'),
  ]);
})
  ->middleware('guest')
  ->name('password.reset');

Route::post('/reset-password', function (Request $request) {
  $request->validate([
    'token' => 'required',
    'email' => 'required|email',
    'password' => 'required|confirmed',
  ]);
  $status = Password::reset(
    $request->only('email', 'password', 'password_confirmation', 'token'),
    function (User $user, string $password) {
        // dd($password);
      $user
        ->forceFill([
          'password' => $password,
        ])
        ->setRememberToken(Str::random(60));

      $user->save();

      event(new PasswordReset($user));
    }
  );

  return $status === Password::PASSWORD_RESET
    ? redirect()
      ->route('dashboard')
      ->with([
        'status', __($status),
        'message' => [
        'type' => 'success',
        'title' => 'Password changed !',
        'message' => 'The password has been changed successfully, you can enter with your new password.'
      ],
        ])
    : back()->withErrors([
        'email' => [__($status)],
        'message' => [
        'type' => 'dander',
        'title' => 'The password could not be changed !',
        'message' => 'The password could not be changed, check your data and try again later, if the problem persists, contact your administrator.'
      ],
    ]);
})
  ->middleware('guest')
  ->name('password.update');
