@extends('app')
@section('title', 'Игрок '.$player->nickname)

@section('content')
    <ul>
        <li>#{{ $player->id }}</li>
        <li>Ник: {{ $player->nickname }}</li>
        <li>Имя: {{ $player->name }}</li>
        <li>Год рождения: {{ $player->birth_year }}</li>
    </ul>

    @component('player-games', ['games' => $player->games()])
        <h3>Игры:</h3>
    @endcomponent
@endsection