<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm(){
        $this->middleware('guest');
        return view('user/login');
    }

    public function logIn(Request $request){
        $this->middleware('guest');
        $this->validate($request, [
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('login', $request->login)->first();

        if(
            !$user
            || !Hash::check($request->password, $user->password)
        ) return back()->with('status', 'Логин или пароль введены неверно.');

        Auth::login($user);

        return redirect(route('home'));
    }

    public function logOut(Request $request){
        $this->middleware('auth');
        Auth::logout();
        return redirect(route('home'));
    }
}
