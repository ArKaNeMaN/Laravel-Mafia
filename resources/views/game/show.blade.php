@extends('app')
@section('title', 'Игра #'.$game->id)
@section('breadcrumbs', Breadcrumbs::render('game', $game))

@section('content')
    <h2>
        Данные:
        @role('admin')
        <a href="{{ route('game.edit-form', $game) }}" class="p-3"><button class="btn btn-primary">Изменить игру</button></a>
        @endrole
    </h2>
    <ul class="list-group col-md-4">
        <li class="list-group-item"><b>#</b>{{ $game->id }}</li>
        <li class="list-group-item"><b>Игровой день:</b> <a href="{{ route('day.show', ['day' => $game->day]) }}">{{ $game->day->day_date }}</a></li>
        <li class="list-group-item">
            <b>Турнир: </b>
            @if ($game->tournament)
                <a href="{{ route('tournament.show', ['tournament' => $game->tournament]) }}">{{ $game->tournament->id }}</a>
            @else
                -
            @endif
        </li>
        <li class="list-group-item"><b>Ведущий:</b> <a href="{{ route('player.show', ['player' => $game->leader]) }}">{{ $game->leader->nickname }}</a></li>
        @if ($game->bestRed)
            <li class="list-group-item"><b>Лучший красный:</b> <a href="{{ route('player.show', ['player' => $game->bestRed]) }}">{{ $game->bestRed->nickname }}</a></li>
        @endif
        @if ($game->bestBlack)
            <li class="list-group-item"><b>Лучший чёрный:</b> <a href="{{ route('player.show', ['player' => $game->bestBlack]) }}">{{ $game->bestBlack->nickname }}</a></li>
        @endif
    </ul>
    <br>
    <h2>Игроки:</h2>
    @include('game.player.table', ['players' => $game->players, 'hideGame' => '1'])
    @role('admin')
    <a href="{{ route('game.player.create-form', ['game_id' => $game->id]) }}" class="p-3"><button class="btn btn-primary">Добавить участника</button></a>
    @endrole
@endsection
