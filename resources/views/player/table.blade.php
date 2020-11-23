<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Ник</th>
            <th>Имя</th>
            <th>Год рождения</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($players as $p)
            <tr>
                <td scope="row">{{ $p->id }}</td>
                <td><a href="{{ route('player.show', ['player' => $p]) }}">{{ $p->nickname }}</a></td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->birth_year }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
