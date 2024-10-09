<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function loginaction(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('Admin.dashboard');
            } elseif ($user->role == 'user') {
                return redirect()->route('User.dashboard');
            }
                return redirect()->route('home')->with('error', 'Role não reconhecida.');
        }
                return redirect()->back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function registerSave(Request $request)
    {
        $request->validate([
            'name' => 'required|',
            'email' => 'required|email|',
            'password' => 'required|',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('Login')->with('success', 'Cadastro realizado com sucesso!');

    }
}
