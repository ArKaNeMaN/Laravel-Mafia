@extends('app')
@section('title', 'Админ-панель')

@section('content')

    <a href="{{ route('user.show-list') }}">Пользователи</a>

@endsection
