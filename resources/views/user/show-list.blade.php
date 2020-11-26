@extends('app')
@section('title', 'Список пользователей')

@section('content')
    @include('user.table', ['users' => $users])
    @role('admin')
    <a href="{{ route('user.create-form') }}" class="p-3"><button class="btn btn-primary">Добавить пользователя</button></a>
    @endrole
    <div class="d-flex justify-content-center">{{ $users->links() }}</div>
@endsection
