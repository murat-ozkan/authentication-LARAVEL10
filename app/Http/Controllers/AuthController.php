<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth.login');
        } else if ($request->method() == 'POST') {
            $data = $request->only('email', 'password');
            if (Auth::attempt($data)) {
                // login success
                return redirect(route('home'))->with('login', 'Giriş İşlemi Başarılı!');
            } else {
                // login failed
                return redirect()->back()->with('login', 'Login işlemi gerçekleştirilemedi!');
            };
        }
    }

    public function register(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth.register');
        } else if ($request->method() == 'POST') {
            $data = $request->only('name', 'email', 'password');
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return redirect(route('login'))->with('register', 'Kayıt İşlemi Başarılı!');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('login'))->with('login', 'Oturum İşlemi Sonlandırıldı!');
    }
}
