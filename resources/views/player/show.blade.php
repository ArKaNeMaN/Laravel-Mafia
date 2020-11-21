@extends('app')
@section('title', 'Игрок '.$player->nickname)

@section('content')
    <h3>Данные:</h3>
    <ul class="list-group col-4">
        <li class="list-group-item">#{{ $player->id }}</li>
        <li class="list-group-item">Ник: {{ $player->nickname }}</li>
        <li class="list-group-item">Имя: {{ $player->name }}</li>
        <li class="list-group-item">Год рождения: {{ $player->birth_year }}</li>
    </ul>
    <br>
    @component('player/games', ['games' => $player->games()])
        <h3>Игры:</h3>
    @endcomponent
@endsection
