
<!--Quiero mostrar la lista de personas y para cada persona las respectivas areas en las que estuvo-->
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Areas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($people as $person)
            <tr>
                <td>{{ $person->first_name }}</td>
                <td>{{ $person->last_name }}</td>
                <td>{{ $person->email }}</td>
                <td>
                    @foreach($person->areas as $area)
                        {{ $area->name }}<br>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>