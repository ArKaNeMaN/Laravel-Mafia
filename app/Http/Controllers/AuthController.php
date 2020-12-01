<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm(Request $request){
        $prevUrl = url()->previous();
        if(
            $prevUrl != URL::route('login')
            && $prevUrl != URL::route('user.login')
        ) $request->session()->put('afterLogin', $prevUrl);

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

        if($request->session()->has('afterLogin')){
            $url = $request->session()->get('afterLogin');
            $request->session()->forget('afterLogin');
            return redirect($url);
        }
        else return redirect(route('home'));
    }

    public function logOut(Request $request){
        $this->middleware('auth');
        Auth::logout();
        return back();
    }
}
