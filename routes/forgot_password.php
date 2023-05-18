<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
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
        'type' => 'success',
        'title' => Lang::get('Message sent').'!',
        'message' => Lang::get('The message was delivered, follow the instructions to change the password.')
      ],
    ])
    : back()->withErrors([
        'email' => __($status),
        'message' => [
        'type' => 'danger',
        'title' => Lang::get('The message could not be delivered').'!',
        'message' => Lang::get('Check your settings and if the problem persists, contact your administrator.')
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
      ->route('login')
      ->with([
        'status', __($status),
        'message' => [
        'type' => 'success',
        'title' => Lang::get('Password changed').'!',
        'message' => Lang::get('The password has been changed successfully, you can enter with your new password.')
      ],
        ])
    : back()->withErrors([
        'email' => [__($status)],
        'message' => [
        'type' => 'dander',
        'title' => Lang::get('The password could not be changed').'!',
        'message' => Lang::get('Check your settings and if the problem persists, contact your administrator.')
      ],
    ]);
})
  ->middleware('guest')
  ->name('password.update');
