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
        @foreach ($users as $u)
            <tr>
                <td scope="row">{{ $u->id }}</td>
                <td>{{ $u->login }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ __('user.role-'.$u->role) }}</td>
                @role('admin')
                <td>
                    <a href="{{ route('user.edit-form', ['user' => $u]) }}">Изменить</a>
                </td>
                @endrole
            </tr>
        @endforeach
    </tbody>
</table>
