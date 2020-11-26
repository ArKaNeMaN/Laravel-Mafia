<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>День</th>
            <th>Турнир</th>
            <th>Ведущий</th>
            <th>Лучший красный</th>
            <th>Лучший чёрный</th>
            <th>Результат</th>
            <th>Описание</th>
            @role('admin')
            <th></th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $g)
            <tr>
                <td scope="row"><a href="{{ route('game.show', ['game' => $g]) }}">{{ $g->id }}</a></td>
                <td><a href="{{ route('day.show', ['day' => $g->day]) }}">{{ $g->day->day_date }}</a></td>
                @if($g->tournament)
                    <td><a href="{{ route('tournament.show', ['tournament' => $g->tournament]) }}">{{ $g->tournament->id }}</a></td>
                @else
                    <td>-</td>
                @endif
                <td><a href="{{ route('player.show', ['player' => $g->leader]) }}">{{ $g->leader->nickname }}</a></td>
                @if($g->bestRed)
                    <td><a href="{{ route('player.show', ['player' => $g->bestRed]) }}">{{ $g->bestRed->nickname }}</a></td>
                @else
                    <td>-</td>
                @endif
                @if($g->bestBlack)
                    <td><a href="{{ route('player.show', ['player' => $g->bestBlack]) }}">{{ $g->bestBlack->nickname }}</a></td>
                @else
                    <td>-</td>
                @endif
                <td>{{ __('mafia.result-'.$g->result) }}</td>
                <td>{{ $g->description }}</td>
                @role('admin')
                <td>
                    <a href="{{ route('game.edit-form', ['game' => $g]) }}">Изменить</a>
                </td>
                @endrole
            </tr>
        @endforeach
    </tbody>
</table>
