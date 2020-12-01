<table class="table">
    <thead>
        @empty($hideGame)
        <th>Игра</th>
        @endempty
        <th>#</th>
        <th>Ник</th>
        <th>Консильери</th>
        <th>Роль</th>
        <th>Фолы</th>
        <th>Удалён</th>
        @role('admin')
        <th></th>
        @endrole
    </thead>
    <tbody>
        @foreach ($players as $v)
            <tr>
                @empty($hideGame)
                <td><a href="{{ route('game.show', ['game' => $v->game]) }}">{{ $v->game->id }}</a></td>
                @endempty
                <td>{{ $v->ingame_player_id }}</td>
                <td><a href="{{ route('player.show', ['player' => $v->player]) }}">{{ $v->player->nickname }}</a></td>
                @if ($v->helper)
                    <td><a href="{{ route('player.show', ['player' => $v->helper]) }}">{{ $v->helper->nickname }}</a></td>
                @else
                    <td>-</td>
                @endif
                <td>{{ __('mafia.role-'.$v->role) }}</td>
                <td>{{ $v->fouls }}</td>
                <td>{{ $v->is_removed ? 'Да' : 'Нет' }}</td>
                @role('admin')
                <td>
                    <a href="{{ route('game.player.edit-form', ['gPlayer' => $v]) }}">Изменить</a>
                </td>
                @endrole
            </tr>
        @endforeach
    </tbody>
</table>
