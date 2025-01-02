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
    @if(Auth::user()->id_tipo_usuarios == 4)
            <!-- Sección de enlaces -->
            @include('partials.navegacion_panel_de_control')
            <!-- Sección de formulario-->
        <div class="row mt-4 justify-content-center">
            <div class="col-md-3">
                <div class="p-4">
                    <h2 class="text-center mb-4">Cambiar Contraseña</h2>
                    <form id="cambiarContrasena" method="POST" action="{{ route('cambiar-contrasena') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="contrasenaActual" class="form-label">Contraseña Actual</label>
                            <input type="password" class="form-control" id="contrasenaActual" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="nuevaContrasena" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nuevaContrasena" name="new_password" required>
                            <small class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
                        </div>
                        <div class="mb-3">
                            <label for="confirmarContrasena" class="form-label">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="confirmarContrasena" name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Actualizar Contraseña</button>
                    </form>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error en el formulario',
                    html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif
    @endif
    <!-- Scripts-->
    <script src="{{ asset('js/mostrarHoraTiempoReal.js') }}"></script>
    <script src="{{ asset('js/validarCamposRegistroUsuario.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Cambio exitoso',
                text: "{{ session('success') }}",
                confirmButtonText: 'Aceptar'
            });
        </script>
        @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>