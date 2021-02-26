<div class="d-flex flex-wrap flex-column align-content-stretch">
    @foreach ($games as $g)
    <div class="card shadow m-2">
        <div class="card-header">
            Игра №{{ $g->id }}
            <span class="{{ $g->result == 'red_win' ? 'bg-danger' : 'bg-dark' }} float-right text-monospace px-1 rounded-sm">{{ __('mafia.result-'.$g->result) }}</span>
        </div>
        <div class="card-body d-md-flex">
            <div class="mr-md-5">
                <p><b>Дата: </b>{{ $g->f_date_time }}</p>
                @if($g->tournament)
                    <p><b>Турнир: </b><a href="{{ route('tournament.show', ['tournament' => $g->tournament]) }}">{{ $g->tournament->name }}</a></p>
                @endif
                @if(!empty($g->description))
                <p><b>Описание: </b>{{ $g->description }}</p>
                @endif
            </div>
            <div class="mr-md-5">
                <p><b>Ведущий: </b><a href="{{ route('player.show', ['player' => $g->leader]) }}">{{ $g->leader->nickname }}</a></p>
                <p><b>Кол-во участников: </b>{{ $g->players->count() }}</p>
            </div>
            <div class="mr-md-5">
                @if($g->bestRed)
                    <p><b>Лучший красный: </b><a href="{{ route('player.show', ['player' => $g->bestRed]) }}">{{ $g->bestRed->nickname }}</a></p>
                @endif
                @if($g->bestBlack)
                    <p><b>Лучший чёрный: </b><a href="{{ route('player.show', ['player' => $g->bestBlack]) }}">{{ $g->bestBlack->nickname }}</a></p>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <div class="card-text float-right">
                @role('admin')
                <a href="{{ route('game.edit-form', ['game' => $g]) }}" class="card-link">
                    <button type="button" class="btn btn-primary btn-sm">Изменить</button>
                </a>
                @endrole
                <a href="{{ route('game.show', ['game' => $g]) }}" class="card-link">
                    <button type="button" class="btn btn-primary btn-sm">Подробнее...</button>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
