@extends('app')
@section('title', 'Игровой день #'.$day->id)

@section('content')
    <h2>Дата:</h2>
    <h4>{{ $day->day_date }}</h4>
    <br>
    <h2>Игры:</h2>
    @include('game/table', ['games' => $day->games])
@endsection
