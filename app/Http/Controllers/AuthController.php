<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        
        return view('auth.hrlogin', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user type is 'hmo'
        if ($user->user_type === 'hmo') {
            Alert::success('Success', 'HMO login success!');
            return redirect()->intended('/hmo/dashboard');
        } else {
            Auth::logout(); // Logout if not an HMO user
            Alert::error('Error', 'Only HMO users are allowed to login.');
            return redirect('/hmo/login');
        }
    } else {
        Alert::error('Error', 'Login failed!');
        return redirect('/hmo/login');
    }
}

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        $validated['password'] = Hash::make($request['password']);
        $validated['user_type'] = 'hmo';
        $user = User::create($validated);

        Alert::success('Success', 'Register user has been successfully !');
        return redirect('/hmo/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Log out success !');
        return redirect('/login');
    }
}