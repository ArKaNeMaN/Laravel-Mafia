<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;

class DayController extends Controller
{
    public function show(Day $day){
        return view('day/show', ['day' => $day]);
    }

    public function showList(){
        $days = Day::orderBy('id', 'desc')->paginate(10);
        return view('day/show-list', ['days' => $days]);
    }
}
