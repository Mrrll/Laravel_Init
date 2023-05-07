<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class AuthenticationController extends Controller
{
    /**
     * This function returns a view for the registration page.
     *
     * @return A view named "auth.register" is being returned.
     */
    public function register()
    {
        return view('auth.register');
    }
    public function registered(RegisterRequest $request)
    {
        try {
            $user = User::create($request->safe()->except(['password_confirmation']));
            event(new Registered($user));
            $credentials = $request->safe()->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
            return redirect()
                ->back()
                ->with('message', [
                    'type' => 'danger',
                    'title' => 'Error !',
                    'message' => 'The credentials are wrong!!!',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' =>
                    'An error has occurred check the data and try again if it is not solved contact your administrator.',
            ]);
        }
    }
    /**
     * The function returns a view for the login page in a PHP web application.
     *
     * @return A view named "auth.login" is being returned.
     */
    public function login()
    {
        return view('auth.login');
    }
    public function Authorization(LoginRequest $request)
    {
        try {
            $credentials = $request->safe()->only('email', 'password');
            if (Auth::attempt($credentials, $request->safe()->only('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
            return redirect()
                ->back()
                ->with('message', [
                    'type' => 'danger',
                    'title' => 'Error !',
                    'message' => 'The credentials are wrong!!!',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' =>
                    'An error has occurred check the data and try again if it is not solved contact your administrator.',
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
