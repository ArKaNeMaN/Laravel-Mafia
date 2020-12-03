<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Описание</th>
            <th class="text-nowrap">Кол-во игр</th>
            @role('admin')
            <th></th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($tournaments as $t)
            <tr>
                <td scope="row"><a href="{{ route('tournament.show', ['tournament' => $t]) }}">{{ $t->id }}</a></td>
                <td>{{ $t->name }}</td>
                <td>{{ $t->description }}</td>
                <td>{{ $t->games->count() }}</td>
                @role('admin')
                <td>
                    <a href="{{ route('tournament.edit-form', ['tournament' => $t]) }}">Изменить</a>
                </td>
                @endrole
            </tr>
        @endforeach
    </tbody>
</table>
