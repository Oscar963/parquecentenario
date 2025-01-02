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
    <title>Parque Centenario</title>
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/imageviewer.css') }}" type="text/css">
    <script src="{{ asset('js/imageviewer.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <style>
        .gallery-items {
            float: left;
            height: 350px;
        }

        .fondo-formulario {
            background: #ECE9E6;
            background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6);
            background: linear-gradient(to right, #FFFFFF, #ECE9E6);
        }
    </style>
</head>

<body class="grid-container fondo-formulario">
    @include('partials.header_publico')
    @include('partials.section_navigation')
    <div class="d-flex justify-content-center align-items-center m-4 scroll-formulario">
        <div class="card shadow p-4" style="max-width: 1200px; width: 100%;">
            <h1 class="mb-2 text-center">Reserve su Quincho</h1>
            <hr style="w-100">
            <section>
                <div class="row mb-4">
                    <div class="col-md-5 d-flex flex-column align-items-start" style="height: 100%;">
                        <img src="{{ asset('img/plano_parque.jpg') }}" alt="Plano Parque"
                            class="img-fluid mb-2 gallery-items"
                            style="object-fit: contain; height: auto; width: 100%;">
                        <div class="w-100 text-center mt-2 d-none">
                            <a target="_blank" href="https://www.youtube.com/watch?v=igfJs2mTZfI"
                                class="btn btn-primary btn-lg">¿Cómo reservar un quincho?</a>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <h4 class="mb-3 pt-3">Datos Personales</h4>
                        <form id="form" action="{{ route('reservas.store') }}" method="POST">
                            @csrf
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
                                    <input type="text" id="rut" class="form-control" placeholder="11111111-1"
                                        name="rut">
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
                            <hr>
                            <h4 class="mt-4 mb-3">Datos Quincho</h4>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label class="form-label">Día</label>
                                    <input type="text" id="datepicker" class="form-control" name="fecha_arriendo"
                                        style="text-align: center" required readonly>
                                    <label class="error-message" id="error-dia"></label>
                                    @error('fecha_arriendo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="numeroQuincho" class="form-label">Tipo Quincho</label>
                                    <select id="quinchos" class="form-control" name="opcion" placeholder="hola">
                                        <option value="" disabled selected>Selecciona un tipo de quincho</option>
                                        <option value="1">Unifamiliar - $3.000 - Capacidad Máxima de 8 personas
                                        </option>
                                        <option value="2">Multifamiliar - $20.000 - Capacidad Máxima de 32
                                            personas</option>
                                    </select>
                                    <label class="error-message" id="error-tipo-quincho"></label>
                                    @error('opcion')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="numeroPersonas" class="form-label">N° de Personas</label>
                                    <input id="nPersonas" type="number" class="form-control" autocomplete="off"
                                        name="numero_personas" max="10" min="1" value=""
                                        placeholder="¿Cuánta gente llevará?">
                                    <label class="error-message" id="error-nPersonas"></label>
                                    @error('numero_personas')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="numeroQuincho" class="form-label">Quincho</label>
                                    <select id="numeroQuincho" class="form-control" name="numero_quincho">
                                        <option value="" disabled selected>Cargando...</option>
                                    </select>
                                    <label class="error-message" id="error-seleccion-quinchos"></label>
                                    @error('numero_quincho')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="hora" class="form-label">Hora llegada</label>
                                    <select id="hora" class="form-control" name="hora"></select>
                                    <label class="error-message" id="error-seleccion-horas"></label>
                                    @error('hora_arriendo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-5 mb-3">
                                <div class="d-flex align-items-start">
                                    <input type="checkbox" id="aceptarReglamento" class="me-2 mt-2">
                                    <div class="d-flex align-items-center" style="white-space: nowrap;">
                                        <!-- Evitar el salto de línea -->
                                        <label for="aceptarReglamento" class="mb-0 me-2">Acepto los términos y
                                            condiciones de uso del quincho.</label>
                                        <a target="_blank" href="{{ route('reglamentos') }}">Ver Reglamento</a>
                                    </div>
                                </div>
                                <label class="error-message" id="error-aceptar-reglamento"></label>
                            </div>

                            <div class="d-md-flex justify-content-between align-items-end">
                                <h6>*Todos los datos del formulario de la reserva se enviarán a su correo.</h6>
                                <button type="submit" id="checkButton"
                                    class="btn btn-success btn-lg">Reservar</button>
                            </div>
                        </form>
                    </div>
            </section>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/mostrarHora.js') }}"></script>
    <script src="{{ asset('js/scrollAnimation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
@include('partials.footer')

</html>
