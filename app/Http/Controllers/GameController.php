<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Game;

class GameController extends Controller
{
    public function show(Game $game){
        return view('game/show', ['game' => $game]);
    }

    public function showList(Game $game){
        $games = Game::orderBy('id', 'desc')->paginate(10);
        return view('game/show-list', ['games' => $games]);
    }


    public function showCreateForm(Request $request){
        return view('game/form');
    }

    public function store(Request $request){
        $this->validate($request, $this->rules());
        $game = Game::create($request->all());
        return back()->with('success', "Игра #{$game->id} создана");
    }


    public function showEditForm(Game $game){
        return view('game/form', ['game' => $game]);
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        $game = Game::findOrFail($id);
        $game->fill($request->all())->save();
        return back()->with('success', "Игра #{$game->id} обновлена");
    }

    public function rules(){
        return [
            'day_id' => ['required', 'exists:App\Models\Day,id'],
            'leader_id' => ['required', 'exists:App\Models\Player,id'],
            'best_red_id' => ['nullable', 'exists:App\Models\Player,id'],
            'best_black_id' => ['nullable', 'exists:App\Models\Player,id'],
            'result' => ['required', Rule::in(Game::RESULTS)],
            'description' => ['present', 'max:256'],
        ];
    }
}
