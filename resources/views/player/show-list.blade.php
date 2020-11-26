@extends('app')
@section('title', 'Список игроков')

@section('content')
@include('player.table', ['players' => $players])
@role('admin')
<a href="{{ route('player.create-form') }}" class="p-3"><button class="btn btn-primary">Добавить игрока</button></a>
@endrole
<div class="d-flex justify-content-center">{{ $players->links() }}</div>
@endsection
