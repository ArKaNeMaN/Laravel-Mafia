@extends('app')
@section('title', 'Турнир №'.$tournament->id)
@section('breadcrumbs', Breadcrumbs::render('tournament', $tournament))

@section('content')
    <h2>
        Данные:
        @role('admin')
        <a href="{{ route('tournament.edit-form', $tournament) }}" class="p-3"><button class="btn btn-primary">Изменить турнир</button></a>
        @endrole
    </h2>
    <ul class="list-group col-md-4">
        <li class="list-group-item"><b>#</b>{{ $tournament->id }}</li>
        <li class="list-group-item"><b>Описание:</b> {{ $tournament->description }}</li>
    </ul>
    <br>
    <h2>Игры:</h2>
    @include('game.table', ['games' => $tournament->games])
    @role('admin')
    <a href="{{ route('game.create-form', ['tournament_id' => $tournament->id]) }}" class="p-3"><button class="btn btn-primary">Добавить игру</button></a>
    @endrole
@endsection
