<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <title>Administración Web</title>
    <style>
        html, body {
            height: 100%; 
        }
        body {
            display: flex;
            flex-direction: column;
            background: radial-gradient(ellipse at center, #0264d6 1%, #1c2b5a 100%);
        }
        main {
            flex: 1; 
        }
        .nav-background {
            background: #0575E6;  
            background: -webkit-linear-gradient(to right, #021B79, #0575E6); 
            background: linear-gradient(to right, #021B79, #0575E6); 
        }
        .btn-warning {
            color: #ffffff;
            background-color: #ff851b;
            border-color: #ff7701;
        }
    </style>
</head>
<body>
    <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 align-self-center">
                <img src="{{ 'assets/logos/logo.png' }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6" style="max-width: 570px;">
                <div style="border-left: 2px #fff solid;">
                    <div class="p-3">
                        <h1 class="text-white text-center pb-4">
                            Administración Web
                            <br>
                            Parque Centenario
                        </h1>
                    </div>
                    <form method="POST" action="{{route('inicia-sesion')}}" style="padding: 10px;" id="loginForm">
                        @csrf
                        <div class="mb-3" style="margin: 0 auto;">
                            <input type="email" class="form-control" id="emailInput" name="email" placeholder="Correo Electrónico" required style="padding: 10px;">
                            <small id="emailError" class="form-text text-danger" style="display: none;">Por favor, ingresa un correo electrónico válido.</small>
                        </div>
                        <div class="mb-3" style="margin: 0 auto;">
                            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Contraseña" required style="padding: 10px;">
                            <small id="passwordError" class="form-text text-danger" style="display: none;">La contraseña debe tener al menos 6 caracteres.</small>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" style="max-width: 100px; width: 100%;">Acceder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error en el login',
                html: '<ul style="list-style-type: none; padding: 0; margin: 0;">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                confirmButtonText: 'Aceptar',
                position: 'top-end',
                toast: true,
                showConfirmButton: true,
                timer: 5000,
                timerProgressBar: true,
            });
        </script>
    @endif
    <script>
            document.addEventListener("DOMContentLoaded", function() {
            
            const form = document.getElementById('loginForm');
            const emailInput = document.getElementById('emailInput');
            const passwordInput = document.getElementById('passwordInput');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            
            form.addEventListener('submit', function(event) {
               
                const email = emailInput.value;
                const password = passwordInput.value;
                let valid = true;

                emailError.style.display = 'none';
                passwordError.style.display = 'none';

                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!email) {
                    emailError.textContent = "El correo electrónico es obligatorio.";
                    emailError.style.display = 'block';
                    valid = false;
                } else if (!emailRegex.test(email)) {
                    emailError.textContent = "Por favor, ingresa un correo electrónico válido.";
                    emailError.style.display = 'block';
                    valid = false;
                }

                if (!password) {
                    passwordError.textContent = "La contraseña es obligatoria.";
                    passwordError.style.display = 'block';
                    valid = false;
                } else if (password.length < 6) {
                    passwordError.textContent = "La contraseña debe tener al menos 6 caracteres.";
                    passwordError.style.display = 'block';
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
