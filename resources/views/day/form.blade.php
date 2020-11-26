@extends('app')
@if (isset($day))
    @section('title', 'Обновление игрового дня #'.$day->id)
@else
    @section('title', 'Добавление игрового дня')
@endif


@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if (isset($day))
        {!! Form::model($day, ['method' => 'post', 'route' => ['day.update', $day]]) !!}
        @method('PUT')
    @else
        {!! Form::model(new App\Models\Day(), ['method' => 'post', 'route' => 'day.store']) !!}
    @endif

        <div class="form-group">
            {!! Form::label('day_date', 'Дата') !!}
            {!! Form::date('day_date', null, ['class' => 'form-control']) !!}
            @error('day_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        @if (isset($day))
            <input type="submit" value="Обновить" class="btn btn-dark btn-block">
        @else
            <input type="submit" value="Добавить" class="btn btn-dark btn-block">
        @endif
    {!! Form::close() !!}

@endsection
