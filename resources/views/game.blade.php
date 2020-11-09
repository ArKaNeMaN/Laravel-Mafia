@extends('app')
@section('title', 'Игра #'.$game->id)

@section('content')
    @component('game-players', ['players' => $game->players])
        <h3>Игроки:</h3>
    @endcomponent
@endsection