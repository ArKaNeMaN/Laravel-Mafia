{{ $slot }}
<table>
    <thead>
        <th>№</th>
        <th>Day</th>
        <th>Leader</th>
        <th>Result</th>
        <th>Description</th>
    </thead>
    <tbody>
        @foreach ($games as $v)
            <tr>
                <td><a href="{{ url('game', ['game' => $v->id]) }}">{{ $v->id }}</a></td>
                <td>{{ $v->day->day_date }}</td>
                <td>{{ $v->leader->nickname }}</td>
                <td>{{ $v->result }}</td>
                <td>{{ $v->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>