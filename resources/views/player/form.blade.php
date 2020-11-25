@extends('app')

@if(isset($player))
    @section('title', 'Обновление игрока #'.$player->id)
@else
    @section('title', 'Добавление игрока')
@endif

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(isset($player))
        {!! Form::model($player, ['method' => 'put', 'route' => ['player.update', $player]]) !!}
    @else
        {!! Form::model(new App\Models\Player(), ['method' => 'post', 'route' => ['player.store']]) !!}
    @endif
        <div class="form-group">
            {!! Form::label('nickname', 'Ник') !!}
            {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
            @error('nickname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Имя') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('birth_year', 'Год рождения') !!}
            {!! Form::selectRange('birth_year', 1900, date('Y'), null, ['class' => 'form-control']) !!}
            @error('birth_year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            @if(isset($player))
                {!! Form::submit('Обновить', ['class' => 'btn btn-dark btn-block']) !!}
            @else
                {!! Form::submit('Добавить', ['class' => 'btn btn-dark btn-block']) !!}
            @endif
        </div>
    {!! Form::close() !!}

@endsection
