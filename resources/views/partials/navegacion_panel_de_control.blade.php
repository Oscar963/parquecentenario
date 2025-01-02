<div class="mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @if (Auth::user()->id_tipo_usuarios == 4 || Auth::user()->id_tipo_usuarios == 1)
            <div class="col">
                <a href="{{ route('privada') }}" class="btn btn-primary w-100 btn-custom">
                    <i class="fas fa-calendar-alt"></i> Reservas
                </a>
            </div>
        @endif
        @if (Auth::user()->id_tipo_usuarios == 4 || Auth::user()->id_tipo_usuarios == 1)
            <div class="col">
                <a href="{{ route('historial') }}" class="btn btn-primary w-100 btn-custom">
                    <i class="fas fa-history"></i> Historial
                </a>
            </div>
        @endif
        @if (Auth::user()->id_tipo_usuarios == 4)
            <div class="col">
                <a href="#" class="btn btn-primary w-100 btn-custom">
                    <i class="fas fa-newspaper"></i> Noticias
                </a>
            </div>
        @endif
        @if (Auth::user()->id_tipo_usuarios == 4)
            <div class="col">
                <a href="#" class="btn btn-primary w-100 btn-custom">
                    <i class="fas fa-globe"></i> Contenido web
                </a>
            </div>
        @endif
        @if (Auth::user()->id_tipo_usuarios == 4 || Auth::user()->id_tipo_usuarios == 2)
            <div class="col">
                <a href="{{ route('formulario_gratuidad') }}" class="btn btn-primary w-100 btn-custom">
                    <i class="fa-solid fa-user-group"></i> Formulario gratuidad
                </a>
            </div>
        @endif
        @if (Auth::user()->id_tipo_usuarios == 4 || Auth::user()->id_tipo_usuarios == 1)
            <div class="col">
                <a href="{{ route('administrar.calendario') }}" class="btn btn-primary w-100 btn-custom">
                    <i class="fa-solid fa-toolbox"></i> Administrar calendario
                </a>
            </div>
        @endif
        @if (Auth::user()->id_tipo_usuarios == 4)
            <div class="col">
                <a href="{{ route('registrar_usuario') }}" class="btn btn-primary w-100 btn-custom">
                    <i class="fa-solid fa-user"></i> Registrar Usuario
                </a>
            </div>
        @endif
    </div>
</div>
