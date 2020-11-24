@extends('app')
@section('title', 'Авторизация')

@section('content')
    <form action="{{ route('user.login') }}" method="post">
        @csrf

        @if(Session::has('status'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('status') }}
            </div>
        @endif

        <div class="form-group">
            {!! Form::label('login', 'Имя пользователя') !!}
            {!! Form::text('login', null, ['class' => 'form-control']) !!}
            @error('login')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Пароль') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::submit('Авторизоваться', ['class' => 'btn btn-dark btn-block']) !!}
        </div>
    </form>
@endsection
