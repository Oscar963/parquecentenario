<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Comprobante de la reserva del quincho</title>
	<style type="text/css">
	    table { width: 100%; padding: 10px; }
	    th, td {  padding: 5px;  margin: 0;  }
			* {	font-family: Helvetica, Arial, sans-serif;	}
			footer { position: fixed; bottom: 60px; left: 0px; right: 0px;}
    </style>
</head>

<body>
	<table>
		<tr>
	
		</tr>
		<tr>
			<td style="border-bottom:3px solid #35d0b0;">
					<strong style="font-size:23px;margin-top:40px;margin-bottom:40px;"> Comprobante de la reserva del quincho Nº {{ $reserva->id_quincho }} / {{ \Carbon\Carbon::parse($reserva->fecha_arriendo)->format('d-m-Y') }}
  </strong>
			</td>
		</tr>
	</table>
    <table>
			<thead>
				<tr>
					<th colspan="2">Datos Personales:</th>
					<th colspan="2">Datos de la Reserva:</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nombre :</td>
					<td>{{ $reserva->nombre }}</td>
					<td>Código: </td>
					<td> <strong>{{ $reserva->id }}</strong> </td>
				</tr>
				<tr>
					<td>Rut :</td>
					<td>{{ $reserva->rut }}</td>
					<td>Nº Quincho:</td>
					<td><strong>{{ $reserva->numero_quincho}}</strong> </td>
				</tr>
				<tr>
					<td>Dirección:</td>
					<td>{{ $reserva->direccion }}</td>
					<td>Fecha:</td>
					<td>{{ \Carbon\Carbon::parse($reserva->fecha_arriendo)->format('d-m-Y') }}</td>
				</tr>
				<tr>
					<td>Correo:</td>
					<td>{{ $reserva->correo }}</td>
					<td>Hora: </td>
					<td>{{ $reserva->hora_arriendo }}</td>
				</tr>
				<tr>
					<td>Teléfono: </td>
					<td>{{ $reserva->telefono }}</td>
				</tr>
			</tbody>
    </table>
		<footer>
			<table style="padding:0px !important;">
				<tr style="padding:0px !important;">
					<td style="padding:0px !important;">
						<!-- <img width="700px" src="{{ url('img/logos/footer.png') }}" alt=""> -->
					</td>
				</tr>
			</table>
		</footer>
</body>
</html>
