<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function show(Player $player){
        return view('player/show', ['player' => $player]);
    }

    public function showList(){
        $players = Player::orderBy('id', 'desc')->paginate(10);
        return view('player/show-list', ['players' => $players]);
    }


    public function showCreateForm(Request $request){
        return view('player/form');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());
        $player = Player::create($request->all());
        return back()->with('success', "Игрок #{$player->id} создан.");
    }


    public function showEditForm(Player $player){
        return view('player/form', ['player' => $player]);
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        $player = Player::findOrFail($id);
        $player->fill($request->all())->save();
        return back()->with('success', "Игрок #{$player->id} обновлён.");
    }

    public function rules(){
        return [
            'nickname' => ['required', 'unique:App\Models\Player'],
            'name' => ['required'],
            'birth_year' => ['required', 'numeric', 'min:1900', 'max:'.date('Y')],
        ];
    }
}
