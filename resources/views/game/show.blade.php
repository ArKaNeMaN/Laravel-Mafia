@extends('app')
@section('title', 'Игра #'.$game->id)

@section('content')
    <h3>Данные:</h3>
    <ul class="list-group col-4">
        <li class="list-group-item"><b>#</b>{{ $game->id }}</li>
        <li class="list-group-item"><b>Ведущий:</b> <a href="{{ route('player.show', ['player' => $game->leader->id]) }}">{{ $game->leader->nickname }}</a></li>
        @if ($game->bestRed)
            <li class="list-group-item"><b>Лучший красный:</b> <a href="{{ route('player.show', ['player' => $game->bestRed->id]) }}">{{ $game->bestRed->nickname }}</a></li>
        @endif
        @if ($game->bestBlack)
            <li class="list-group-item"><b>Лучший чёрный:</b> <a href="{{ route('player.show', ['player' => $game->bestBlack->id]) }}">{{ $game->bestBlack->nickname }}</a></li>
        @endif
    </ul>
    <br>
    @component('game/players', ['players' => $game->players])
        <h3>Игроки:</h3>
    @endcomponent
@endsection
