<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>Заметки</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($days as $d)
            <tr>
                <td scope="row">{{ $d->id }}</td>
                <td><a href="{{ route('day.show', ['day' => $d]) }}">{{ $d->day_date }}</a></td>
                <td>{{ $d->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
