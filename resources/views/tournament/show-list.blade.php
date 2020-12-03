@extends('app')
@section('title', 'Список турниров')
@section('breadcrumbs', Breadcrumbs::render('tournaments'))

@section('content')
    @include('tournament.cards', ['tournaments' => $tournaments])
    @role('admin')
    <a href="{{ route('tournament.create-form') }}" class="p-3"><button class="btn btn-primary">Добавить турнир</button></a>
    @endrole
    <div class="d-flex justify-content-center">{{ $tournaments->links() }}</div>
@endsection
