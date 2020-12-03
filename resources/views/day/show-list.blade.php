@extends('app')
@section('title', 'Список игровых дней')
@section('breadcrumbs', Breadcrumbs::render('days'))

@section('content')
@include('day.cards', ['days' => $days])
@role('admin')
<a href="{{ route('day.create-form') }}" class="p-3"><button class="btn btn-primary">Добавить игровой день</button></a>
@endrole
<div class="d-flex justify-content-center">{{ $days->links() }}</div>
@endsection
