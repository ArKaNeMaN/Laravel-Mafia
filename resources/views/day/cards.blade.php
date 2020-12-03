<div class="d-flex flex-wrap flex-column align-content-stretch">
    @foreach ($days as $d)
    <div class="card shadow m-2">
        <div class="card-header">
            Игровой день №{{ $d->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">{{ $d->day_date }}</h5>
            <p class="card-text"><b>Описание: </b>{{ $d->description }}</p>
            <p class="card-text"><b>Кол-во игр: </b>{{ $d->games->count() }}</p>
        </div>
        <div class="card-footer">
            <div class="card-text float-right">
                @role('admin')
                <a href="{{ route('day.edit-form', ['day' => $d]) }}" class="card-link">
                    <button type="button" class="btn btn-primary btn-sm">Изменить</button>
                </a>
                @endrole
                <a href="{{ route('day.show', ['day' => $d]) }}" class="card-link">
                    <button type="button" class="btn btn-primary btn-sm">Подробнее...</button>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
