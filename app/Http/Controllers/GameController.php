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


    public function showCreateForm(Request $request){
        return view('game/add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'day_id' => ['required', 'exists:App\Models\Day,id'],
            'leader_id' => ['required', 'exists:App\Models\Player,id'],
            'best_red_id' => ['nullable', 'exists:App\Models\Player,id'],
            'best_black_id' => ['nullable', 'exists:App\Models\Player,id'],
            'result' => ['required', Rule::in(Game::RESULTS)],
            'description' => ['max:256'],
        ]);
        $game = Game::create($request->all());
        return back()->with('success', 'Игра создана');
    }


    public function showEditForm(Game $game){
        return view('game/edit', ['game' => $game]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'day_id' => ['required', 'exists:App\Models\Day,id'],
            'leader_id' => ['required', 'exists:App\Models\Player,id'],
            'best_red_id' => ['nullable', 'exists:App\Models\Player,id'],
            'best_black_id' => ['nullable', 'exists:App\Models\Player,id'],
            'result' => ['required', Rule::in(Game::RESULTS)],
            'description' => ['required', 'max:256'],
        ]);
        $game = Game::findOrFail($id);
        $game->fill($request->all())->save();
        return back()->with('success', 'Игра обновлена');
    }
}
