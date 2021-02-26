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
        <li class="list-group-item"><b>Дата: </b>{{ $game->f_date_time }}</li>
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
        <li class="list-group-item"><b>Ночей:</b> {{ $game->nights->count() }}</li>
        <li class="list-group-item"><b>Голосований:</b> {{ $game->votings->count() }}</li>
    </ul>
    <br>

    <h2>Игроки:</h2>
    @include('game.player.table', ['players' => $game->players, 'hideGame' => '1'])
    @role('admin')
    <a href="{{ route('game.player.create-form', ['game_id' => $game->id]) }}" class="p-3"><button class="btn btn-primary">Добавить участника</button></a>
    @endrole
    <br>

    <div class="d-flex justify-content-around flex-column flex-lg-row">
        <div class="col-lg-6">
            <h2>Ночи:</h2>
            @include('game.night.table', ['nights' => $game->nights, 'hideGame' => '1'])
            @role('admin')
            <a href="{{ route('game.night.create-form', ['game_id' => $game->id]) }}" class="p-3"><button class="btn btn-primary">Добавить ночь</button></a>
            @endrole
        </div>

        <div class="col-lg-6">
            <h2>Голосования:</h2>
            Тут будет таблица голосований
        </div>
    </div>
@endsection
