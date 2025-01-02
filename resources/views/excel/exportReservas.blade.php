<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Quincho</th>
            <th>RUT</th>
            <th>Persona</th>
            <th>Correo</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Teléfono</th>
            <th>Fecha/Hora Solicitada</th>
            <th>Estado Quincho</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->numero_quincho }}</td>
                <td>{{ $reserva->rut }}</td>
                <td>{{ $reserva->nombre }}</td>
                <td>{{ $reserva->correo }}</td>
                <td>{{ $reserva->fecha_arriendo }}</td>
                <td>{{ $reserva->hora_arriendo }}</td>
                <td>{{ $reserva->telefono }}</td>
                <td>{{ $reserva->created_at }}</td>
                <td>
                    @if($reserva->id_estado == 1)
                        Disponible
                    @elseif($reserva->id_estado == 2)
                        Reservado
                    @elseif($reserva->id_estado == 3)
                        Ocupado
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
