<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Rule;
use App\Models\Day;

class DayController extends Controller
{
    public function show(Day $day){
        return view('day.show', ['day' => $day]);
    }

    public function showList(){
        $days = Day::orderBy('id', 'desc')->paginate(10);
        return view('day.show-list', ['days' => $days]);
    }

    public function showCreateForm(Request $request){
        $request->flash();
        return view('day.form');
    }

    public function showEditForm(Day $day){
        return view('day.form', ['day' => $day]);
    }


    public function store(Request $request){
        $this->validate($request, $this->rules());
        $day = Day::create($request->all());
        return back()->with('success', "День #{$day->id} добавлен.");
    }

    public function update(Request $request, $id){
        $this->validate($request, $this->rules());
        Day::findOrFail($id)->fill($request->all())->save();
        return back()->with('success', "День #{$id} обновлён.");
    }

    public function delete(Request $request, $id){
        Day::findOrFail($id)->delete();
        return redirect(route('day.show-list'))->with('success', "День #{$id} удалён.");
    }

    public function rules(){
        return [
            'day_date' => ['required', 'date'],
            'description' => ['required', 'max:255'],
        ];
    }
}
