<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Ник</th>
            <th>Имя</th>
            <th>Год рождения</th>
            @role('admin')
            <th></th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($players as $p)
            <tr>
                <td scope="row">{{ $p->id }}</td>
                <td><a href="{{ route('player.show', ['player' => $p]) }}">{{ $p->nickname }}</a></td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->birth_year }}</td>
                @role('admin')
                <td>
                    <a href="{{ route('player.edit-form', ['player' => $p]) }}">Изменить</a>
                </td>
                @endrole
            </tr>
        @endforeach
    </tbody>
</table>
