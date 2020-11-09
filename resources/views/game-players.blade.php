{{ $slot }}
<table>
    <thead>
        <th>№</th>
        <th>Nickname</th>
        <th>Role</th>
        <th>Fouls</th>
        <th>Is Removed</th>
        <th>Score</th>
    </thead>
    <tbody>
        @foreach ($players as $v)
            <tr>
                <td>{{ $v->ingame_player_id }}</td>
                <td><a href="{{ url('player', ['player' => $v->player->id]) }}">{{ $v->player->nickname }}</a></td>
                <td>{{ $v->role }}</td>
                <td>{{ $v->fouls }}</td>
                <td>{{ $v->is_removed }}</td>
                <td>{{ $v->score }}</td>
            </tr>
        @endforeach
    </tbody>
</table>