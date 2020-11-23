@extends('app')
@section('title', 'Список игровых дней')

@section('content')
@include('day/table', ['days' => $days])
<div class="d-flex justify-content-center">{{ $days->links() }}</div>
@endsection
