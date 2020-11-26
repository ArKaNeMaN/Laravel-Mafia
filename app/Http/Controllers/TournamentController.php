<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class TournamentController extends Controller
{
    public function show(Tournament $tournament){
        return view('tournament.show', ['tournament' => $tournament]);
    }

    public function showList(){
        $tournaments = Tournament::orderBy('id', 'desc')->paginate(10);
        return view('tournament.show-list', ['tournaments' => $tournaments]);
    }

    public function showCreateForm(Request $request){
        $request->flash();
        return view('tournament.form');
    }

    public function showEditForm(Tournament $tournament){
        return view('tournament.form', ['tournament' => $tournament]);
    }


    public function store(Request $request){
        $this->validate($request, $this->rules());
        $tournament = Tournament::create($request->all());
        return back()->with('success', "Турнир #{$tournament->id} создан.");
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        $tournament = Tournament::findOrFail($id);
        $tournament->fill($request->all())->save();
        return back()->with('success', "Турнир #{$tournament->id} обновлён.");
    }

    public function delete(Request $request, $id){
        $this->validate($request, $this->rules());
        Tournament::findOrFail($id)->delete();
        return back()->with('success', "Турнир #{$tournament->id} удалён.");
    }

    public function rules(){
        return [
            'description' => ['required', 'max:255'],
        ];
    }
}
