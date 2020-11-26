<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\GamePlayer;
use App\Models\Game;

class GamePlayerController extends Controller
{
    public function showCreateForm(Request $request){
        $request->flash();
        return view('game.player.form');
    }

    public function showEditForm(GamePlayer $gPlayer){
        return view('game.player.form', ['player' => $gPlayer]);
    }


    public function store(Request $request){
        $this->validate($request, $this->rules());
        $gPlayer = GamePlayer::create($request->all());
        return back()->with('success', "Участник #{$gPlayer->id} игры #{$request->game_id} успешно создан.");
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        $gPlayer = GamePlayer::findOrFail($id);
        $gPlayer->fill($request->all())->save();
        return back()->with('success', "Участник #{$id} игры #{$gPlayer->game->id} успешно обновлён.");
    }


    public function delete(Request $request, $id){
        $gPlayer = GamePlayer::findOrFail($id);
        $game = $gPlayer->game;
        $gPlayer->delete();
        return redirect(route('game.show', ['game' => $game]))->with('success', "Участник #{$id} игры #{$game->id} успешно удалён.");
    }


    public function rules(){
        return [
            'game_id' => ['required', 'exists:App\Models\Game,id'],
            'player_id' => ['required', 'exists:App\Models\Player,id'],
            'helper_id' => ['nullable', 'exists:App\Models\Player,id'],
            'ingame_player_id' => ['required', 'numeric', 'min:1', 'max:10'],
            'role' => ['required', Rule::in(GamePlayer::ROLES)],
            'fouls' => ['present', 'numeric', 'min:0'],
            'is_removed' => ['present', 'boolean'],
            'score' => ['present', 'numeric'],
        ];
    }
}
