<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{

    public function showList(){
        $this->middleware('role:admin');
        $users = User::paginate(10);
        return view('user.show-list', ['users' => $users]);
    }

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

    public function showCreateForm(Request $request){
        $this->middleware('role:admin');
        $request->flash();
        return view('user.form');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());

        $req = $request->all();
        $req['password'] = Hash::make($req['password']);

        $user = User::create($req);

        return back()->with('success', "Пользователь #{$user->id} создан.");
    }

    public function showEditForm(User $user){
        $this->middleware('role:admin');
        return view('user.form', ['user' => $user]);
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        $this->validate($request, [
            'login' => [Rule::unique('users')->ignore($id)],
            'email' => [Rule::unique('users')->ignore($id)],
        ]);

        $req = $request->all();
        $req['password'] = Hash::make($req['password']);

        $user = User::findOrFail($id);
        $user->fill($req)->save();

        return back()->with('success', "Пользователь #{$user->id} обновлён.");
    }

    public function rules(){
        return [
            'login' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
            ],
            'role' => [
                'required',
                Rule::in(User::ROLES),
            ],
        ];
    }
}
