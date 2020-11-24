<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showPassForm(){
        $this->middleware('auth');

        return view('user.pass');
    }

    public function changePassword(Request $request){
        $this->middleware('auth');

        $this->validate($request, [
            'old_password' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        $user = Auth::user();
        if(!Hash::check($request->old_password, $user->password))
            return back()->withErrors(['old_password', 'Текущий пароль указан неверно.']);

        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Пароль изменён');
    }

    public function showAccount(){
        $this->middleware('auth');
        return view('user.acc', ['user' => Auth::user()]);
    }
}
