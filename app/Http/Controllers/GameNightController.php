<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\GameNight;

class GameNightController extends Controller
{
    public function showCreateForm(Request $request){
        $request->flash();
        return view('game.night.form');
    }

    public function showEditForm(GameNight $gNight){
        return view('game.night.form', ['night' => $gNight]);
    }


    public function store(Request $request){
        $this->validate($request, $this->rules($request));
        $gNight = GameNight::create($request->all());
        return back()->with('success', "Ночь #{$gNight->id} игры #{$request->game_id} успешно создана.");
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules($request));
        $gNight = GameNight::findOrFail($id);
        $gNight->fill($request->all())->save();
        return back()->with('success', "Ночь #{$id} игры #{$gNight->game->id} успешно обновлена.");
    }

    public function delete(Request $request, $id){
        $gNight = GameNight::findOrFail($id);
        $game = $gNight->game;
        $gNight->delete();
        return redirect(route('game.show', ['game' => $game]))->with('success', "Ночь #{$id} игры #{$game->id} успешно удалена.");
    }


    public function rules(Request $r){
        return [
            'game_id' => [
                'bail',
                'required',
                'exists:App\Models\Game,id',
            ],
            'ingame_id' => [
                'required',
                'numeric',
                'min:1'
            ],
            'killed_id' => [
                'required',
                'exists:App\Models\GamePlayer,id',
            ],
            'checked_don_id' => [
                'required',
                'exists:App\Models\GamePlayer,id',
            ],
            'checked_sheriff_id' => [
                'required',
                'exists:App\Models\GamePlayer,id',
            ],
        ];
    }
}
