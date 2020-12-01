@extends('app')

@if(isset($player))
    @section('title', 'Обновление участника игры #'.$player->game->id)
    @section('breadcrumbs', Breadcrumbs::render('gPlayer.edit', $player))
@else
    @section('title', 'Добавление участника игры')
    @isset($_GET['game_id'])
        @section('breadcrumbs', Breadcrumbs::render('gPlayer.create.forGame', $_GET['game_id']))
    @else
        @section('breadcrumbs', Breadcrumbs::render('gPlayer.create'))
    @endif
@endif

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(isset($player))
        {!! Form::model($player, ['method' => 'put', 'route' => ['game.player.update', $player]]) !!}
    @else
        {!! Form::model(new App\Models\GamePlayer(), ['method' => 'post', 'route' => ['game.player.store']]) !!}
    @endif

        <div class="form-group">
            {!! Form::label('game_id', 'Индекс игры') !!}
                {!! Form::number('game_id', null, ['class' => 'form-control']) !!}
            @error('game_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('player_id', 'Глобальный индекс игрока') !!}
            {!! Form::number('player_id', null, ['class' => 'form-control']) !!}
            @error('player_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('helper_id', 'Индекс консильери') !!}
            {!! Form::number('helper_id', null, ['class' => 'form-control']) !!}
            @error('helper_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('ingame_player_id', 'Номер внутри игры') !!}
            {!! Form::selectRange('ingame_player_id', 1, 10, null, ['class' => 'form-control']) !!}
            @error('ingame_player_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('role', 'Роль') !!}
            {!! Form::select('role', ['red' => 'Красный', 'black' => 'Чёрный', 'don' => 'Дон', 'sheriff' => 'Шериф'], null, ['class' => 'form-control']) !!}
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('fouls', 'Фолы') !!}
            {!! Form::number('fouls', null, ['class' => 'form-control', 'min' => '0']) !!}
            @error('fouls')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('score', 'Счёт') !!}
            {!! Form::number('score', null, ['class' => 'form-control', 'step' => '0.1']) !!}
            @error('score')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('is_removed', 'Был ли удалён') !!}
            {!! Form::select('is_removed', [false => 'Нет', true => 'Да'], null, ['class' => 'form-control']) !!}
            @error('is_removed')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <input type="submit" value="Создать" class="btn btn-dark btn-block">
    {!! Form::close() !!}

@endsection
