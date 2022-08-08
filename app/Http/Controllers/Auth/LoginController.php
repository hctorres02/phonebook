<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Não existe usuário associado a este e-mail!',
        ]);
    }
}
