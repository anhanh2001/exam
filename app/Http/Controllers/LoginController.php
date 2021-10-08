<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );

        if (Auth::attempt($credentials, $remember_me)) {
            // $request->session()->regenerate();
            // $user = auth()->user();
            // // dd($user);
            return redirect()->route('user.list');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function signin()
    {
        return view('welcome');
    }
    public function postSignin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required'],
            'password_again' => ['required'],
        ]);
        if ($request->password != $request->password_again) {
            return back()->withErrors([
                'password_again' => 'Mật khẩu không trùng',
            ]);
        }
        $model = new User();
        $model->fill($request->all());
        $model['password'] = Hash::make($request->password);
        $model->save();
        $model->assignRole('user');
        return redirect()->route('login');
    }
}
