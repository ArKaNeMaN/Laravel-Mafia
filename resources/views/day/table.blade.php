<table class="table table-reflow">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-nowrap">Дата</th>
            <th>Заметки</th>
            <th class="text-nowrap">Кол-во игр</th>
            @role('admin')
            <th></th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($days as $d)
            <tr>
                <td scope="row">{{ $d->id }}</td>
                <td class="text-nowrap"><a href="{{ route('day.show', ['day' => $d]) }}">{{ $d->day_date }}</a></td>
                <td>{{ $d->description }}</td>
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
