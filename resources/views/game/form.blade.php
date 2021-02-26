@extends('app')
@if (isset($game))
    @section('title', 'Обновление игры #'.$game->id)
    @section('breadcrumbs', Breadcrumbs::render('game.edit', $game))
@else
    @section('title', 'Добавление игры')
    @section('breadcrumbs', Breadcrumbs::render('game.create'))
@endif


@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if (isset($game))
        {!! Form::model($game, ['method' => 'post', 'route' => ['game.update', $game]]) !!}
        @method('PUT')
    @else
        {!! Form::model(new App\Models\Game(), ['method' => 'post', 'route' => 'game.store']) !!}
    @endif

        <div class="form-group">
            {!! Form::label('tournament_id', 'Индекс турнира') !!}
            {!! Form::number('tournament_id', null, ['class' => 'form-control']) !!}
            @error('tournament_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('leader_id', 'Индекс ведущего игрока') !!}
            {!! Form::number('leader_id', null, ['class' => 'form-control']) !!}
            @error('leader_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('best_red_id', 'Индекс лучшего красного игрока') !!}
            {!! Form::number('best_red_id', null, ['class' => 'form-control']) !!}
            @error('best_red_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('best_black_id', 'Индекс лучшего чёрного игрока') !!}
            {!! Form::number('best_black_id', null, ['class' => 'form-control']) !!}
            @error('best_black_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('result', 'Результат игры', []) !!}
            {!! Form::select('result', ['red_win' => 'Победа красных', 'black_win' => 'Победа чёрных'], null, ['class' => 'form-control']) !!}
            @error('result')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('date_time', 'Дата и время игры', []) !!}
            {!! Form::datetimeLocal('date_time', null, ['class' => 'form-control']) !!}
            @error('date_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('played', 'Сыграна ли игра', []) !!}
            {!! Form::select('played', [false => 'Нет', true => 'Да'], null, ['class' => 'form-control']) !!}
            @error('played')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Заметки об игре') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        @if (isset($game))
            <input type="submit" value="Обновить" class="btn btn-dark btn-block">
        @else
            <input type="submit" value="Добавить" class="btn btn-dark btn-block">
        @endif
    {!! Form::close() !!}

@endsection
