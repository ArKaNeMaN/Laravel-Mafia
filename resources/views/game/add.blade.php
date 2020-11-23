@extends('app')
@section('title', 'Добавление игры')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model(new App\Models\Game(), ['method' => 'post', 'route' => 'game.store']) !!}
        @csrf

        <div class="form-group">
            {!! Form::label('day_id', 'Day ID') !!}
            {!! Form::number('day_id', null, ['class' => 'form-control']) !!}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('leader_id', 'Leader ID') !!}
            {!! Form::number('leader_id', null, ['class' => 'form-control']) !!}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('best_red_id', 'Best Red ID') !!}
            {!! Form::number('best_red_id', null, ['class' => 'form-control']) !!}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('best_black_id', 'Best Black ID') !!}
            {!! Form::number('best_black_id', null, ['class' => 'form-control']) !!}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('result', 'Result', []) !!}
            {!! Form::select('result', ['red_win' => 'Red Win', 'black_win' => 'Black Win'], null, ['class' => 'form-control']) !!}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description', []) !!}
            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Создать" class="btn btn-dark btn-block">
    {!! Form::close() !!}

@endsection
