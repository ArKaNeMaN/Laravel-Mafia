@extends('app')
@section('title', 'Смена пароля')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <form action="{{ route('user.update-pass') }}" method="post">
        @method('PUT')
        @csrf

        <div class="form-group">
            {!! Form::label('old_password', 'Текущий пароль') !!}
            {!! Form::password('old_password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Новый пароль') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Подтверждение пароля') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Изменить', ['class' => 'btn btn-dark btn-block']) !!}
        </div>
    </form>
@endsection
