<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('merchant-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // if you have a guard for merchants, swap Auth::guard('merchant') accordingly
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            // redirect to merchant dashboard route
            return redirect()->intended(route('merchant.dashboard'));

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
