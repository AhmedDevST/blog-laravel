<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function show()
    {
        return view("auth.login");
    }
    protected function authenticated(Request $request, $user)
    {
        // Redirect based on user role
        if ($user->hasRole('Admin')  || $user->hasRole('Editor')) {
            return to_route('admin.index');
        } elseif ($user->hasRole('Subscriber')) {
            return to_route('home');
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user());
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return to_route('login.show');
    }
}
