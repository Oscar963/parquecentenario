<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/view_admin_calendario.css') }}">
     <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <title>Administración Web</title>
</head>
<body>
    <!-- Sección header-->
    @include('partials.header_panel_de_control')
        <div class="container-fluid mt-1">
            <!-- Sección Título ventana actual y hora tiempo real -->
        @include('partials.titulo_ventana_y_hora_panel_de_control')
    @if(Auth::user()->id_tipo_usuarios == 1 || Auth::user()->id_tipo_usuarios == 4)
        <!-- Sección de enlaces -->
        @include('partials.navegacion_panel_de_control')
        </div>
        <div class="container mt-4 mb-4">
            <div class="d-flex flex-column align-items-center gap-3">
                <div class="col-md-8 d-flex flex-column align-items-center position-relative" id="container-opciones">
                    <h4 class="text-center">Administración de Disponibilidad Mensual</h4>
                    <div class="position-absolute top-0 end-0 mt-2 me-3">
                        <a href="{{ route('administrar.calendario')}}" class="btn btn-primary">
                            <i class="fa-solid fa-rotate-right"></i> Recargar
                        </a>
                    </div>
                    <div class="container-mes mt-3">
                        <div class="row-button">
                            <select id="selectMes" class="form-select btn-custom-size" style="width: 150px;">
                                <option value="0">Enero</option>
                                <option value="1">Febrero</option>
                                <option value="2">Marzo</option>
                                <option value="3">Abril</option>
                                <option value="4">Mayo</option>
                                <option value="5">Junio</option>
                                <option value="6">Julio</option>
                                <option value="7">Agosto</option>
                                <option value="8">Septiembre</option>
                                <option value="9">Octubre</option>
                                <option value="10">Noviembre</option>
                                <option value="11">Diciembre</option>
                            </select>
                        </div>
                        <div class="row-button">
                            <button id="habilitarMes" class="btn btn-primary btn-custom-size">Habilitar Mes</button>
                        </div>
                        <div class="row-button">
                            <button id="deshabilitarMes" class="btn btn-danger btn-custom-size">Deshabilitar Mes</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h5 class="text-center">Disponibilidad de Meses</h5>
                        <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                            <button class="btn btn-outline-secondary btn-month" value="0">Enero</button>
                            <button class="btn btn-outline-secondary btn-month" value="1">Febrero</button>
                            <button class="btn btn-outline-secondary btn-month" value="2">Marzo</button>
                            <button class="btn btn-outline-secondary btn-month" value="3">Abril</button>
                            <button class="btn btn-outline-secondary btn-month" value="4">Mayo</button>
                            <button class="btn btn-outline-secondary btn-month" value="5">Junio</button>
                            <button class="btn btn-outline-secondary btn-month" value="6">Julio</button>
                            <button class="btn btn-outline-secondary btn-month" value="7">Agosto</button>
                            <button class="btn btn-outline-secondary btn-month" value="8">Septiembre</button>
                            <button class="btn btn-outline-secondary btn-month" value="9">Octubre</button>
                            <button class="btn btn-outline-secondary btn-month nov" value="10">Noviembre</button>
                            <button class="btn btn-outline-secondary btn-month" value="11">Diciembre</button>
                        </div>
                    </div> 
                    <div class="color-guide mt-auto" style="align-self: flex-start; margin-top: auto; margin-bottom: 10px;">
                        <div style="display: flex; align-items: center;">
                            <div style="width: 15px; height: 15px; background-color: red; margin-right: 5px; border-radius: 3px;"></div>
                            <span style="font-size: 15px; color: gray">Deshabilitado</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div style="width: 15px; height: 15px; background-color: green; margin-right: 5px; border-radius: 3px;"></div>
                            <span style="font-size: 15px; color: gray">Habilitado</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 d-flex flex-column align-items-center" id="container-calendario">
                    <h3 class="text-center">Administración de Disponibilidad Diaria</h3>
                    <div class="container-dia mt-3">
                        <div class="row-button">    
                            <input type="text" id="datepicker-admin" class="form-control btn-custom-size" placeholder="Calendario">
                        </div>
                        <div class="row-button">
                            <button id="habilitarDia" class="btn btn-primary btn-custom-size">Habilitar Día</button>
                        </div>
                        <div class="row-button">
                            <button id="deshabilitarDia" class="btn btn-danger btn-custom-size">Deshabilitar Día</button>
                        </div>
                    </div>
                    <div class="color-guide mt-auto" style="align-self: flex-start; margin-top: auto; margin-bottom: 10px;">
                        <div id="instrucciones-container">
                            <div style="display: flex; align-items: center;">
                                <span style="font-size: 15px; color: #000">1. Seleccione una <b>fecha</b> y haga clic en <b>"Habilitar Día"</b> o <b>"Deshabilitar Día"</b>.</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <span style="font-size: 15px; color: #000">2. Los días <b>deshabilitados</b> aparecerán en <b>"Días inhabilitados"</b>.</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <span style="font-size: 15px; color: #000;">3. Para <b>habilitar</b> un día, selecciónelo de la lista y haga clic en <b>"Habilitar Día"</b>.</span>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center">Días inhabilitados</h5>
                    <ul tabindex="0" id="listaDiasDeshabilitados" class="mt-3"></ul>
                </div>
            </div>
        </div>
    @endif
    <script src="{{ asset('js/mostrarHoraTiempoReal.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
