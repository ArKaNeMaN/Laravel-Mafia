@extends('app')

@if(isset($night))
    @section('title', 'Обновление ночи для игры #'.$night->game->id)
    @section('breadcrumbs', Breadcrumbs::render('gNight.edit', $night))
@else
    @section('title', 'Добавление ночи')
    @isset($_GET['game_id'])
        @section('breadcrumbs', Breadcrumbs::render('gNight.create.forGame', $_GET['game_id']))
    @else
        @section('breadcrumbs', Breadcrumbs::render('gNight.create'))
    @endif
@endif

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(isset($night))
        {!! Form::model($night, ['method' => 'put', 'route' => ['game.night.update', $night]]) !!}
    @else
        {!! Form::model(new App\Models\GamePlayer(), ['method' => 'post', 'route' => ['game.night.store']]) !!}
    @endif

        <div class="form-group">
            {!! Form::label('game_id', 'Индекс игры') !!}
                {!! Form::number('game_id', null, ['class' => 'form-control']) !!}
            @error('game_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('ingame_id', 'Номер внутри игры') !!}
                {!! Form::selectRange('ingame_id', 1, 10, null, ['class' => 'form-control']) !!}
            @error('ingame_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('killed_id', 'Индекс убитого игрока') !!}
                {!! Form::number('killed_id', null, ['class' => 'form-control']) !!}
            @error('killed_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('checked_don_id', 'Индекс игрока. проверенного доном') !!}
                {!! Form::number('checked_don_id', null, ['class' => 'form-control']) !!}
            @error('checked_don_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('checked_sheriff_id', 'Индекс игрока. проверенного шерифом') !!}
                {!! Form::number('checked_sheriff_id', null, ['class' => 'form-control']) !!}
            @error('checked_sheriff_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            @if(isset($night))
                {!! Form::submit('Обновить', ['class' => 'btn btn-dark btn-block']) !!}
            @else
                {!! Form::submit('Добавить', ['class' => 'btn btn-dark btn-block']) !!}
            @endif
        </div>
    {!! Form::close() !!}

@endsection
