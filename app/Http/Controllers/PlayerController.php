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
}
