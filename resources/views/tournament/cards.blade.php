<div class="d-flex flex-wrap flex-column align-content-stretch">
    @foreach ($tournaments as $t)
    <div class="card shadow m-2">
        <div class="card-header">
            Турнир №{{ $t->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">{{ $t->name }}</h5>
            <p class="card-text"><b>Описание: </b>{{ $t->description }}</p>
            <p class="card-text"><b>Кол-во игр: </b>{{ $t->games->count() }}</p>
        </div>
        <div class="card-footer">
            <div class="card-text float-right">
                @role('admin')
                <a href="{{ route('tournament.edit-form', ['tournament' => $t]) }}" class="card-link">
                    <button type="button" class="btn btn-primary btn-sm">Изменить</button>
                </a>
                @endrole
                <a href="{{ route('tournament.show', ['tournament' => $t]) }}" class="card-link">
                    <button type="button" class="btn btn-primary btn-sm">Подробнее...</button>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
