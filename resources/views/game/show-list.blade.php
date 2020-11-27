@extends('app')
@section('title', 'Список игр')
@section('breadcrumbs', Breadcrumbs::render('games'))

@section('content')
@include('game/table', ['games' => $games])
@role('admin')
<a href="{{ route('game.create-form') }}" class="p-3"><button class="btn btn-primary">Добавить игру</button></a>
@endrole
<div class="d-flex justify-content-center">{{ $games->links() }}</div>
@endsection
