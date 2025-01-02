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
        <div class="row mt-4 justify-content-center align-items-center">
            <div class="col-md-3">
                <div class="p-4">
                    <h2 class="text-center mb-4">Registrar Nuevo Usuario</h2>
                    <form id="registroUsuario" method="POST" action="{{ route('validar-registro') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="password" required>
                            <small style="display:block;color:gray;">*Mayúsculas y minúsculas</small>
                            <small style="display:block;color:gray;">*Mínimo 8 caracteres</small>
                            <small style="display:block;color:gray;">*Contener números</small>
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <select class="form-select" id="rol" name="id_tipo_usuarios" required>
                                <option value="" disabled selected>Seleccione un rol</option>
                                <option value="1">Usuario de Reservas</option>
                                <option value="2">Usuario de Gratuidad</option>
                                <option value="3">Usuario Cajero</option>
                                <option value="4">Usuario Administrador</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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
                title: 'Registro exitoso',
                text: "{{ session('success') }}",
                confirmButtonText: 'Aceptar'
            });
        </script>
        @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>