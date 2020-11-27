@extends('app')
@section('title', 'Игровой день #'.$day->id)
@section('breadcrumbs', Breadcrumbs::render('day', $day))

@section('content')
    <h2>
        Данные:
        @role('admin')
        <a href="{{ route('day.edit-form', $day) }}" class="p-3"><button class="btn btn-primary">Изменить игровой день</button></a>
        @endrole
    </h2>
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
