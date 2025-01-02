<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Administración Web</title>
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/imageviewer.css') }}" type="text/css">
    <script src="{{ asset('js/imageviewer.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/privada.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <style>
        .gallery-items {
            float: left;
            height: 350px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .border {
            border: 1px solid #dee2e6;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .error-message {
            font-size: 0.875rem;
        }

        #quinchosSeleccionadosTable {
            border-collapse: collapse;
        }

        #quinchosSeleccionadosTable thead {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;

        }

        #quinchosSeleccionadosTable th,
        #quinchosSeleccionadosTable td {
            text-align: center;
            padding: 8px;
        }
    </style>
</head>

<body>
    @include('partials.header_panel_de_control')
    <div class="container-fluid mt-1">
        @include('partials.titulo_ventana_y_hora_panel_de_control')
        @include('partials.navegacion_panel_de_control')
        <div class="d-flex justify-content-center align-items-center m-4">
            <div class="card shadow p-4" style="max-width: 1200px; width: 100%;">
                <h1 class="text-center">Reserva Gratuita</h1>
                <hr>
                <section>
                    <form id="form" action="{{ route('reservas.formulario.gratuidad') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 d-flex flex-column align-items-start" style="height: 100%;">
                                <img src="{{ asset('img/plano_parque.jpg') }}" alt="Plano Parque"
                                    class="img-fluid mb-2 gallery-items"
                                    style="object-fit: contain; height: auto; width: 100%;">
                            </div>

                            <div class="col-md-7">
                                <h4 class="mb-3">Datos del Responsable</h4>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                                        <input type="text" id="nombreCompleto" class="form-control"
                                            placeholder="Escribe tu nombre completo" name="nombre">
                                        <label class="error-message" id="error-nombre"></label>
                                        @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="rut" class="form-label" style="white-space: nowrap;">RUT (sin
                                            puntos y con guión)</label>
                                        <input type="text" id="rut" class="form-control"
                                            placeholder="11111111-1" name="rut">
                                        <label class="error-message" id="error-rut"></label>
                                        @error('rut')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="direccion" class="form-label">Dirección</label>
                                        <input type="text" id="direccion" class="form-control"
                                            placeholder="Escribe tu dirección" name="direccion">
                                        <label class="error-message" id="error-direccion"></label>
                                        @error('direccion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="correo" class="form-label">Correo Electrónico</label>
                                        <input type="email" id="correo" class="form-control"
                                            placeholder="ejemplo@correo.com" name="correo">
                                        <label class="error-message" id="error-correo"></label>
                                        @error('correo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono" class="form-label">Teléfono (+56)</label>
                                        <input type="tel" id="telefono" class="form-control" min="6"
                                            max="15" placeholder="912345678" name="telefono">
                                        <label class="error-message" id="error-telefono"></label>
                                        @error('telefono')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Campo oculto para los quinchos seleccionados -->
                        <input type="hidden" name="numero_quincho[]" id="numeroQuinchoInput">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-3">Datos Quincho</h4>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Día</label>
                                        <input type="text" id="datepicker" class="form-control"
                                            name="fecha_arriendo" style="text-align: center" required readonly>
                                        <label class="error-message" id="error-dia"></label>
                                        @error('fecha_arriendo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="numeroQuincho" class="form-label">Tipo Quincho</label>
                                        <select id="quinchos" class="form-control" name="opcion">
                                            <option value="" disabled selected>Selecciona un tipo de quincho
                                            </option>
                                            <option value="1">Unifamiliar - Capacidad Máxima de 8 personas
                                            </option>
                                            <option value="2">Multifamiliar - Capacidad Máxima de 32 personas
                                            </option>
                                        </select>
                                        <label class="error-message" id="error-tipo-quincho"></label>
                                        @error('opcion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="numeroPersonas" class="form-label">N° de Personas</label>
                                        <input id="nPersonas" type="number" class="form-control"
                                            name="numero_personas" placeholder="Cantidad máxima de personas" readonly>
                                        <label class="error-message" id="error-nPersonas"></label>
                                        @error('numero_personas')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="hora" class="form-label">Hora llegada</label>
                                        <select id="hora" class="form-control" name="hora"></select>
                                        <label class="error-message" id="error-seleccion-horas"></label>
                                        @error('hora_arriendo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Lista de Quinchos -->
                            <div class="col-md-6 mb-3">
                                <h3 class="text-center mb-4">Lista de Quinchos</h3>
                                <div class="border rounded shadow-sm" style="max-height: 200px; overflow-y: auto;">
                                    <table class="table table-hover table-striped" id="quinchosTable">
                                        <thead class="table-light">
                                            <tr style="text-align: center">
                                                <th scope="col">Seleccionar</th>
                                                <th scope="col">Número de Quincho</th>
                                                <th scope="col">Accesible</th>
                                            </tr>
                                        </thead>
                                        <tbody id="quinchosTableBody" style="text-align: center">
                                            <!-- Aquí se llenarán los quinchos dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                                <label class="error-message text-danger" id="error-seleccion-quinchos-lista"></label>
                            </div>

                            <!-- Quinchos Seleccionados -->
                            <div class="col-md-6 mb-3" id="quinchoContainer">
                                <h3 class="text-center mb-4">Quinchos Seleccionados</h3>
                                <div class="border rounded shadow-sm" style="max-height: 200px; overflow-y: auto;">
                                    <table class="table table-hover table-striped" id="quinchosSeleccionadosTable">
                                        <thead class="table-light">
                                            <tr style="text-align: center">
                                                <th scope="col">Seleccionar</th>
                                                <th scope="col">Número de Quincho</th>
                                                <th scope="col">Accesible</th>
                                            </tr>
                                        </thead>
                                        <tbody id="quinchosSeleccionadosTableBody" style="text-align: center">
                                            <!-- Aquí se llenarán los quinchos seleccionados dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                                <label class="error-message text-danger"
                                    id="error-seleccion-quinchos-seleccionados"></label>
                            </div>
                        </div>

                        <div class="col-md-5 mb-3">
                            <div class="d-flex align-items-start">
                                <input type="checkbox" id="aceptarReglamento" class="me-2 mt-2">
                                <div class="d-flex align-items-center" style="white-space: nowrap;">
                                    <label for="aceptarReglamento" class="mb-0 me-2">Acepto los términos y condiciones de uso
                                        del quincho.</label>
                                    <a target="_blank" href="{{ route('reglamentos') }}">Ver Reglamento</a>
                                </div>
                            </div>
                            <label class="error-message" id="error-aceptar-reglamento"></label>
                        </div>
                        <hr>
                        <div class="d-md-flex justify-content-between align-items-end">
                            <h6>*Todos los datos del formulario de la reserva se enviarán a su correo.</h6>
                            <button type="submit" id="checkButton" class="btn btn-success btn-lg">Reservar</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!--Scripts-->
    <script type="text/javascript">
        $(function() {
            var viewer = ImageViewer();
            $('.gallery-items').click(function() {
                var imgSrc = this.src,
                    highResolutionImage = $(this).data('high-res-img');

                viewer.show(imgSrc, highResolutionImage);
            });
        });
    </script>
    <script src="{{ asset('js/mostrarHoraTiempoReal.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/gratuidadFormulario.js') }}"></script>
    <script src="{{ asset('js/mostrarHora.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>
