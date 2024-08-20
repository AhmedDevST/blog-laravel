<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function show()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {
        //valide data
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        //add user in db
        $subscriber = User::create([
            "name" => $request->name,
            "email" => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Assign the role
        $subscriber->assignRole('Subscriber');

        // Redirect to a route with a success message
        return redirect()->route('login.show')->with('success', 'Registration successful!.');
    }
}
