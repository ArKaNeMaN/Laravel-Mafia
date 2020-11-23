<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>День</th>
            <th>Ведущий</th>
            <th>Лучший красный</th>
            <th>Лучший чёрный</th>
            <th>Результат</th>
            <th>Описание</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $g)
            <tr>
                <td scope="row"><a href="{{ route('game.show', ['game' => $g]) }}">{{ $g->id }}</a></td>
                <td><a href="{{ route('day.show', ['day' => $g->day]) }}">{{ $g->day->day_date }}</a></td>
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
            </tr>
        @endforeach
    </tbody>
</table>
