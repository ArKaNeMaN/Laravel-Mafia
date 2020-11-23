@extends('app')
@section('title', 'Список игроков')

@section('content')
@include('player/table', ['players' => $players])
<div class="d-flex justify-content-center">{{ $players->links() }}</div>
@endsection
