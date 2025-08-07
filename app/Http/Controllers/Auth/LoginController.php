<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Default redirect path (not used when `authenticated()` is defined)
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * This is used when default Laravel login form is submitted.
     * It redirects based on role after successful login.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 1) {
            return redirect('/master/dashboard');
        } elseif ($user->role == 2) {
            return redirect('/merchant/dashboard');
        } elseif ($user->role == 3) {
            return redirect('/customer/dashboard');
        } else {
            return redirect('/home');
        }
    }

    /**
     * If you're using a custom login form, override this login method.
     */
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = Auth::user();

            // Role-based redirect
            if ($user->role == 1) {
                return redirect('/master/dashboard');
            } elseif ($user->role == 2) {
                return redirect('/merchant/dashboard');
            } elseif ($user->role == 3) {
                return redirect('/customer/dashboard');
            } else {
                return redirect('/home');
            }
        } else {
            return redirect()
                ->route("login")
                ->with("error", 'Incorrect email or password');
        }
    }
}
