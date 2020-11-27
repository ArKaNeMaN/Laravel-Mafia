@extends('app')
@section('title', 'Игрок '.$player->nickname)
@section('breadcrumbs', Breadcrumbs::render('player', $player))

@section('content')
    <h2>
        Данные:
        @role('admin')
        <a href="{{ route('player.edit-form', $player) }}" class="p-3"><button class="btn btn-primary">Изменить игрока</button></a>
        @endrole
    </h2>
    <ul class="list-group col-md-4">
        <li class="list-group-item">#{{ $player->id }}</li>
        <li class="list-group-item">Ник: {{ $player->nickname }}</li>
        <li class="list-group-item">Имя: {{ $player->name }}</li>
        <li class="list-group-item">Год рождения: {{ $player->birth_year }}</li>
    </ul>
    <br>
    <h2>Игры:</h2>
    @include('game.table', ['games' => $player->games()])
@endsection
