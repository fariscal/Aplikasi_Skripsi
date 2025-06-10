<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'nik' => ['required'],
        'password' => ['required'],
    ]);

    $user = User::where('nik', $credentials['nik'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        Auth::login($user);
        $request->session()->regenerate();

        // Arahkan ke dashboard sesuai status
        switch ($user->status) {
            case 1:
                return redirect()->route('administrator.dashboard');
            case 2:
                return redirect()->route('admin.dashboard');
            case 3:
                return redirect()->route('teknisi.dashboard');
            default:
                return redirect('/dashboard'); // fallback kalau status tidak dikenali
        }
    }

    return back()->withErrors([
        'nik' => 'NIK atau password salah.',
    ])->withInput();
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
