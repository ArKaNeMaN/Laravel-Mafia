@extends('app')
@section('title', 'Игровой день #'.$day->id)

@section('content')
    <h2>Данные:</h2>
    <ul class="list-group col-md-4">
        <li class="list-group-item"><b>#</b>{{ $day->id }}</li>
        <li class="list-group-item"><b>Дата: </b>{{ $day->day_date }}</li>
        <li class="list-group-item"><b>Описание: </b>{{ $day->description }}</li>
    </ul>
    <br>
    <h2>Игры:</h2>
    @include('game/table', ['games' => $day->games])
    @role('admin')
    <a href="{{ route('game.create-form') }}" class="p-3"><button class="btn btn-primary">Добавить игру</button></a>
    @endrole
@endsection
