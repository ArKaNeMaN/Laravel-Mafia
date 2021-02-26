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
        $request->flash();
        return view('game/form');
    }

    public function showEditForm(Game $game){
        return view('game/form', ['game' => $game]);
    }


    public function store(Request $request){
        $this->validate($request, $this->rules());
        $game = Game::create($request->all());
        return back()->with('success', "Игра #{$game->id} создана.");
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        Game::findOrFail($id)->fill($request->all())->save();
        return back()->with('success', "Игра #{$id} обновлена.");
    }

    public function delete(Request $request, $id){
        $this->validate($request, $this->rules());
        Game::findOrFail($id)->delete();
        return back()->with('success', "Игра #{$id} удалена.");
    }

    public function rules(){
        return [
            'day_id' => ['required', 'exists:App\Models\Day,id'],
            'tournament_id' => ['nullable', 'exists:App\Models\Tournament,id'],
            'leader_id' => ['required', 'exists:App\Models\Player,id'],
            'best_red_id' => ['nullable', 'exists:App\Models\Player,id'],
            'best_black_id' => ['nullable', 'exists:App\Models\Player,id'],
            'result' => ['required', Rule::in(Game::RESULTS)],
            'date_time' => ['required', 'date'],
            'description' => ['present', 'max:256'],
        ];
    }
}
