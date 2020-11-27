@extends('app')

@if(isset($tournament))
    @section('title', 'Обновление турнира #'.$tournament->id)
    @section('breadcrumbs', Breadcrumbs::render('tournament.edit', $tournament))
@else
    @section('title', 'Добавление турнира')
    @section('breadcrumbs', Breadcrumbs::render('tournament.create'))
@endif

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(isset($tournament))
        {!! Form::model($tournament, ['method' => 'put', 'route' => ['tournament.update', $tournament]]) !!}
    @else
        {!! Form::model(new App\Models\Tournament(), ['method' => 'post', 'route' => ['tournament.store']]) !!}
    @endif
        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            @if(isset($tournament))
                {!! Form::submit('Обновить', ['class' => 'btn btn-dark btn-block']) !!}
            @else
                {!! Form::submit('Добавить', ['class' => 'btn btn-dark btn-block']) !!}
            @endif
        </div>
    {!! Form::close() !!}

@endsection
