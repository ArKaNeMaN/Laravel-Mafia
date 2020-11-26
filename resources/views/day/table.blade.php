<table class="table table-reflow">
    <thead>
        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>Заметки</th>
            <th>Кол-во игр</th>
            @role('admin')
            <th></th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($days as $d)
            <tr>
                <td scope="row">{{ $d->id }}</td>
                <td><a href="{{ route('day.show', ['day' => $d]) }}">{{ $d->day_date }}</a></td>
                <td  style="width: 50%;">{{ $d->description }}</td>
                <td>{{ $d->games->count() }}</td>
                @role('admin')
                <td>
                    <a href="{{ route('day.edit-form', ['day' => $d]) }}">Изменить</a>
                </td>
                @endrole
            </tr>
        @endforeach
    </tbody>
</table>
