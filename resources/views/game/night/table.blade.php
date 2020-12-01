<table class="table">
    <thead>
        @empty($hideGame)
        <th>Игра</th>
        @endempty
        <th>#</th>
        <th>Убит</th>
        <th>Проверен доном</th>
        <th>Проверен шерифом</th>
    </thead>
    <tbody>
        @foreach ($nights as $n)
            <tr>
                @empty($hideGame)
                <td><a href="{{ route('game.show', ['game' => $n->game]) }}">{{ $n->game->id }}</a></td>
                @endempty
                <td>{{ $n->ingame_id }}</td>
                @if ($n->killed)
                    <td><a href="{{ route('player.show', ['player' => $n->killed->player]) }}">{{ $n->killed->player->nickname }}</a></td>
                @else
                    <td>-</td>
                @endif
                @if ($n->checkedDon)
                    <td><a href="{{ route('player.show', ['player' => $n->checkedDon->player]) }}">{{ $n->checkedDon->player->nickname }}</a></td>
                @else
                    <td>-</td>
                @endif
                @if ($n->checkedSheriff)
                    <td><a href="{{ route('player.show', ['player' => $n->checkedSheriff->player]) }}">{{ $n->checkedSheriff->player->nickname }}</a></td>
                @else
                    <td>-</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
