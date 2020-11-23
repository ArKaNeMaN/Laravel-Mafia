@extends('app')
@section('title', 'Список игр')

@section('content')
@include('game/table', ['games' => $games])
<div class="d-flex justify-content-center">{{ $games->links() }}</div>
@endsection
