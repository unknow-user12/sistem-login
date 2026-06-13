<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/dashboard')
            ->with('success', 'Register berhasil');
}

    public function login(Request $request)
{
    $user = User::where(
        'email',
        $request->email
    )->first();

    if (!$user) {

        return back()->with(
            'error',
            'Email tidak ditemukan'
        );
    }

    if (
        !Hash::check(
            $request->password,
            $user->password
        )
    ) {

        return back()->with(
            'error',
            'Password salah'
        );
    }

    session([
        'user_id' => $user->id,
        'username' => $user->name
    ]);

    return redirect('/dashboard');
}

    public function logout()
{
    session()->flush();

    return redirect('/login');
}
}
