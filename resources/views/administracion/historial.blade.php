<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/view_admin_historial.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <title>Administración Web</title>
</head>

<body>
    <!-- Sección header-->
    @include('partials.header_panel_de_control')
    <div class="container-fluid mt-1">
        <!-- Sección Título ventana actual y hora tiempo real -->
        @include('partials.titulo_ventana_y_hora_panel_de_control')
        @if (Auth::user()->id_tipo_usuarios == 1 || Auth::user()->id_tipo_usuarios == 4)
            <!-- Sección de enlaces -->
            @include('partials.navegacion_panel_de_control')
            <!-- Sección de inputs-->
            <div class="mt-4">
                <form method="GET" id="form" action="{{ route('historial') }}">
                    <h4 class="pb-3">Filtrado de datos</h4>
                    <div class="row mb-3">
                        <div class="col input-group">
                            <label for="quincho" class="form-label">Número de Quincho</label>
                            <input type="text" class="form-control form-control-sm custom-input" id="quincho"
                                name="quincho" placeholder="N° Quincho">
                        </div>
                        <div class="col input-group">
                            <label for="rut" class="form-label">RUT</label>
                            <input type="text" class="form-control form-control-sm custom-input" id="rut"
                                name="rut" placeholder="Ingrese su RUT">
                        </div>
                        <div class="col input-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm custom-input" id="nombre"
                                name="nombre" placeholder="Ingrese su nombre">
                        </div>
                        <div class="col input-group">
                            <label for="diaReserva" class="form-label">Día de Reserva</label>
                            <input type="text" class="form-control form-control-sm custom-input" id="datepicker"
                                name="fecha_arriendo">
                        </div>
                        <div class="col input-group">
                            <label for="horaLlegada" class="form-label">Hora de Llegada</label>
                            <select id="hora" class="form-control form-control-sm custom-input"
                                name="hora"></select>
                        </div>
                        <div class="col-auto d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100 btn-lg-custom" id="submit-btn"> <i
                                    class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                        </div>
                        <div class="col-auto d-flex align-items-end">
                            <button type="reset" class="btn btn-secondary w-100 btn-lg-custom" name="limpiar"
                                id="limpiar-btn"> <i class="fa-solid fa-broom"></i> Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-4 p-2 rounded shadow" style="background-color: rgb(0, 162, 255);">
                <div class="row align-items-center">
                    <div class="col text-start">
                        <ul>
                            <li>
                                El sistema cambiará automaticamente a quincho disponible después de 60 min de retraso, o
                                no se ha marcado un check in.
                            </li>
                            <li>
                                Descargue el listado de las reservas según la fecha ingresada.
                            </li>
                        </ul>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('historico.reservas.pdf', request()->query()) }}" class="btn btn-danger me-2">
                            <i class="fa-sharp fa-solid fa-file-pdf"></i> PDF
                        </a>
                        <a href="{{ route('exportarHistorial', ['fecha_arriendo' => request('fecha_arriendo')]) }}"
                            class="btn btn-success me-2">
                            <i class="fa-solid fa-file-excel"></i> Excel
                        </a>
                        <a href="{{ route('historial', request()->query()) }}" class="btn btn-primary">
                            <i class="fa-solid fa-rotate-right"></i> Recargar
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h6>Historial de Reservas</h6>
               <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Quincho</th>
                            <th>RUT</th>
                            <th>Persona</th>
                            <th>Correo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Teléfono</th>
                            <th>Fecha/Hora Solicitada</th>
                            <th>Estado Reserva</th>
                            <th>Comprobante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                            <tr class="text-center">
                                <td>{{ $item->numero_quincho }}</td>
                                <td>{{ $item->rut }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->correo }}</td>
                                <td>{{ $item->fecha_arriendo }}</td>
                                <td>{{ $item->hora_arriendo }}</td>
                                <td>{{ $item->telefono }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <button type="button" id="estado-quincho-{{ $item->id }}"
                                        class="btn text-center 
                                    @if ($item->id_estado == 3) btn-danger @endif btn-sm">

                                        @if ($item->id_estado == 3)
                                            Ocupado
                                        @endif
                                    </button>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('reserva.especifica.pdf', ['id' => $item->id]) }}"
                                        class="btn btn-danger me-2">
                                        <i class="fa-sharp fa-solid fa-file-pdf"></i> PDF
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
            </div>
    </div>
    @endif
    <script src="{{ asset('js/mostrarHoraTiempoReal.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/mostrarHora.js') }}"></script>
    <script src="{{ asset('js/checkReservas.js') }}"></script>
    <script src="{{ asset('js/limpiarCampos.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>
