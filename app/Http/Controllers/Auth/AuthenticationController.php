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

    /**
     * This function registers a user, logs them in, and redirects them to the dashboard or displays an
     * error message if there is an issue.
     *
     * @param RegisterRequest request The  parameter is an instance of the RegisterRequest
     * class, which is a custom request class that contains validation rules and messages for the
     * registration form data. It is used to validate and sanitize the user input before creating a new
     * user record in the database.
     *
     * @return a redirect response to either the 'dashboard' route if the user's credentials are
     * correct and they are successfully authenticated, or back to the previous page with a message
     * indicating that the registration failed and providing an error message.
     */
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
                    'title' => 'The credentials are not correct !',
                    'message' => 'The credentials are not correct check the data and try again later if the problem persists contact your administrator.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Failed to register !',
                'message' =>
                    'Error registering check the data and try again later if the problem persists contact your administrator.',
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

    /**
     * This function handles user authorization by checking their login credentials and redirecting
     * them to the dashboard if successful, or displaying an error message if the credentials are
     * incorrect.
     *
     * @param LoginRequest request  is an instance of the LoginRequest class, which is a custom
     * request class that extends the base Laravel request class. It contains the input data from the
     * login form submitted by the user.
     *
     * @return This function returns a redirect response to either the 'dashboard' page if the user's
     * credentials are correct, or back to the previous page with an error message if the credentials
     * are incorrect.
     */
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
                    'title' => 'The credentials are not correct !',
                    'message' => 'The credentials are not correct check the data and try again later if the problem persists contact your administrator.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'The credentials are not correct !',
                'message' =>
                    'The credentials are not correct check the data and try again later if the problem persists contact your administrator.',
            ]);
        }
    }

   /**
    * This PHP function logs out the user, invalidates the session, regenerates the session token, and
    * redirects to the welcome page.
    *
    * @param Request request  is an instance of the Illuminate\Http\Request class which
    * represents an HTTP request. It contains information about the request such as the HTTP method,
    * headers, and input data. In this context, it is used to invalidate the user's session and
    * regenerate a new CSRF token after logging out the user.
    *
    * @return a redirect response to the 'welcome' route after logging out the authenticated user,
    * invalidating the session and regenerating the CSRF token.
    */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
