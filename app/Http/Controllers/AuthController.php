<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Foundation\Auth\UserModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginAction(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        // Retrieve the authenticated user
        $authenticatedUser = Auth::user();

        // Determine the user's level and store it in the session
        $userLevel = $authenticatedUser->level; // Adjust this according to your authentication logic
        $request->session()->put('userLevel', $userLevel);

        return redirect()->intended(route('dashboard'));
    } else {
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'Email atau kata sandi salah.']);
    }
}

    public function registerStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pass' => 'required|string|min:6',
            'c_pass' => 'required|same:pass',
        ]);

        $uniqueValidationFailed = false;
        try {
            UserModel::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['pass']),
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                $uniqueValidationFailed = true;
            }
        }

        if ($uniqueValidationFailed) {
            return redirect()->back()->withErrors(['email' => 'Alamat email sudah terdaftar.'])->withInput();
        } else {
            return redirect()->route('login-view')->with('success', 'Registrasi berhasil!');
        }
    }


    public function logout(Request $request)
{
    Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the CSRF token
    $request->session()->regenerateToken();

    // Redirect the user to the login page
    return redirect()->route('login-view')->with('success', 'Anda telah berhasil keluar.');
}

}
