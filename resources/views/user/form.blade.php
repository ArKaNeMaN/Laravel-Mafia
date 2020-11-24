@extends('app')
@if (isset($user))
    @section('title', 'Обновление пользователя #'.$user->id)
@else
    @section('title', 'Добавление пользователя')
@endif


@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if (isset($user))
        {!! Form::model($user, ['method' => 'post', 'route' => ['user.update', $user]]) !!}
        @method('PUT')
    @else
        {!! Form::model(new App\Models\User(), ['method' => 'post', 'route' => 'user.store']) !!}
    @endif

        <div class="form-group">
            {!! Form::label('login', 'Логин') !!}
            {!! Form::text('login', null, ['class' => 'form-control']) !!}
            @error('login')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Электронная почта') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            @error('email')
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
            {!! Form::label('role', 'Роль') !!}
            {!! Form::select('role', [
                'user' => __('user.role-user'),
                'admin' => __('user.role-admin'),
            ], null, ['class' => 'form-control']) !!}
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        @if (isset($user))
            <input type="submit" value="Обновить" class="btn btn-dark btn-block">
        @else
            <input type="submit" value="Добавить" class="btn btn-dark btn-block">
        @endif
    {!! Form::close() !!}

@endsection
