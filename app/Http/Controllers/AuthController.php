<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

   
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    
    public function showRegistrationForm($token = null)
    {
        if ($token) {
            $invitation = Invitation::where('token', $token)->firstOrFail();            

            return view('auth.register-invitation', compact('invitation'));
        }

        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member', // Default role for direct registration
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Account created successfully! Welcome to Sembark.');
    }

  
    public function registerWithInvitation(Request $request, $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

      

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $invitation->email,
            'password' => Hash::make($request->password),
            'role' => $invitation->role,
            'company_id' => $invitation->company_id,
        ]);

        // Delete used invitation
        $invitation->delete();

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Welcome to Sembark! Your account has been created successfully.');
    }

   
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}