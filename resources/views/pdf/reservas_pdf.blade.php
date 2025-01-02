<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Comprobante de las reservas del día</title>
    <style type="text/css">
	    table { width: 100%; padding: 10px; }
	    th, td {  padding: 5px;  margin: 0;  }
			* {	font-family: Helvetica, Arial, sans-serif;	}
			footer { position: fixed; bottom: 60px; left: 0px; right: 0px;}
    </style>
</head>
<body>
    <div class="mt-4">
        <div style="border-bottom:3px solid #35d0b0;text-align:center;">
            <strong style="font-size:23px;margin-top:40px;margin-bottom:40px;"> Lista de Reservas - {{ \Carbon\Carbon::createFromFormat('d/m/Y', $fechaParaVista)->format('d-m-Y') }}  </strong>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f5f5f5; color: black;">
                    <th style="padding: 10px; border: 1px solid #dee2e6; text-align: left;">Quincho</th>
                    <th style="padding: 10px; border: 1px solid #dee2e6; text-align: left;">RUT</th>
                    <th style="padding: 10px; border: 1px solid #dee2e6; text-align: left;">Persona</th>
                    <th style="padding: 10px; border: 1px solid #dee2e6; text-align: left;">Correo</th>
                    <th style="padding: 10px; border: 1px solid #dee2e6; text-align: left;">Fecha</th>
                    <th style="padding: 10px; border: 1px solid #dee2e6; text-align: left;">Hora</th>
                    <th style="padding: 10px; border: 1px solid #dee2e6; text-align: left;">Estado Quincho</th>
                </tr>
            </thead>
            <tbody id="reservas-lista">
                @if ($datos->count() > 0)
                    @foreach ($datos as $item)
                    <tr style="text-align: center;">
                        <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $item->numero_quincho ?? 'N/A' }}</td>
                        <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $item->rut }}</td>
                        <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $item->nombre }}</td>
                        <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $item->correo }}</td>
                        <td style="padding: 10px; border: 1px solid #dee2e6;">{{ \Carbon\Carbon::parse($item->fecha_arriendo)->format('d-m-Y') }}</td>
                        <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $item->hora_arriendo }}</td>
                        <td style="padding: 10px; border: 1px solid #dee2e6;">
                            @if($item->id_estado == 1)
                                <span style="color: green; font-weight: bold;">Disponible</span>
                            @elseif($item->id_estado == 2)
                                <span style="color: orange; font-weight: bold;">Reservado</span>
                            @elseif($item->id_estado == 3)
                                <span style="color: red; font-weight: bold;">Ocupado</span>
                            @else
                                <span style="color: gray;">Desconocido</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" style="padding: 10px; text-align: center; border: 1px solid #dee2e6;">Todavía no hay reservas para este día.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>



