<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequests\LoginRequest;
use App\Http\Requests\AuthRequests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function create()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->validated();
        //dd($request->toArray());

        if (!Auth::attempt($credentials, $request->remember)):
            return back()->withErrors('Email/Senha Inválido!');
        endif;

        return redirect()->intended(route('dashboard'));
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->intended(route('dashboard'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
