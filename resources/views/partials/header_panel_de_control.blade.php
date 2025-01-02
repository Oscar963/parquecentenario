<style>
    .nav-background {
        background: #0575E6;  
        background: -webkit-linear-gradient(to right, #021B79, #0575E6); 
        background: linear-gradient(to right, #021B79, #0575E6); 
    }
</style>

<nav class="navbar navbar-light nav-background">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ 'assets/logos/logo.png' }}" alt="Logo" width="300"  class="d-inline-block align-text-top">
        </a>
        <div class="d-flex align-items-center">
            <span class="text-white me-3">{{ Auth::user()->name }}</span>
            <div class="dropdown">
                <button type="button" class="btn btn-outline-light me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> Perfil
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('cambio_contrasena')}}">Cambiar contraseña</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-door-open"></i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

