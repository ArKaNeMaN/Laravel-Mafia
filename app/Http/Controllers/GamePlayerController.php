<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\GamePlayer;
use App\Models\Game;

class GamePlayerController extends Controller
{
    public function showCreateFormForGame(Game $game){
        return view('game/player-form', ['game' => $game]);
    }

    public function showCreateForm(Request $request){
        return view('game/player-form');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());
        $player = GamePlayer::create($request->all());
        return back()->with('success', "Участник #{$player->id} игры #{$request->game_id} успешно создан.");
    }


    public function showEditForm(GamePlayer $player){
        return view('game/player-form', ['player' => $player]);
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        $player = GamePlayer::findOrFail($id);
        $player->fill($request->all())->save();
        return back()->with('success', "Участник #{$id} игры #{$player->game->id} успешно обновлён.");
    }


    public function delete(Request $request, $id){
        $player = GamePlayer::findOrFail($id);
        $game = $player->game;
        $player->delete();
        return redirect('game.show', ['game' => $game])->with('success', "Участник #{$id} игры #{$game->id} успешно удалён.");
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
