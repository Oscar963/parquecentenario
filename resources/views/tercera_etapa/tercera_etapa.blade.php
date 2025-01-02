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
    <link rel="stylesheet" href="{{ asset('css/tercera_etapa.css') }}">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        .gallery-items {
            float: left;
            height: 350px;
        }
    </style>
</head>

<body class="grid-container">
    <header>
        <div class="header">
            <a href="#" class="logo"><img src="{{ 'assets/logos/logo.png' }}"></a>
            <nav class="navbar">
                <a href="https://www.facebook.com/MunicipalidaddeArica" target="_blank"><i
                        class="fab fa-facebook grow"></i></a>
                <a href="https://www.youtube.com/channel/UCcVtpRl__F8KinypQGhO7VA/feed" target="_blank"><i
                        class="fab fa-youtube grow"></i></a>
                <a href="https://x.com/i/flow/login?redirect_after_login=%2Fmuniarica" target="_blank"><i
                        class="fab fa-twitter grow"></i></a>
                <a href="https://www.instagram.com/muniarica/" target="_blank"><i class="fab fa-instagram grow"></i></a>
                <a href="https://www.flickr.com/photos/muniarica/" target="_blank"><i
                        class="fab fa-flickr grow"></i></a>
            </nav>
        </div>
    </header>

    <section class="section">
        <a href="{{ route('welcome') }}" class="logo sombra"><img src="{{ asset('assets/logos/parque.png') }}"
                alt="Logo Parque"></a>
        <nav class="navbar2">
            <a href="{{ route('quienes_somos') }}" class="hvr-underline-from-left hvr-icon-forward enlaces">
                Quiénes somos
                <i class="fa fa-info-circle hvr-icon"></i>
            </a>
            <a href="{{ route('horarios_tarifas') }}" class="hvr-underline-from-left hvr-icon-forward enlaces">
                Horarios y tarifas
                <i class="fa fa-clock hvr-icon"></i>
            </a>
            <a href="{{ route('reglamentos') }}" class="hvr-underline-from-left hvr-icon-forward enlaces">
                Reglamentos
                <i class="fa fa-file-alt hvr-icon"></i>
            </a>
            <a href="{{ route('tercera_etapa') }}" class="hvr-underline-from-left hvr-icon-forward enlaces">
                Tercera etapa
                <i class="fa fa-flag hvr-icon"></i>
            </a>
        </nav>
    </section>

    <main>
        <div class="flex-tercera-etapa-container">
            <div class="img-container">
                <img src="{{ asset('assets/etapa3/Planta-General-Plan-Maestro-3.jpg') }}" alt="">
            </div>
            <div class="info-container" style="padding: 0px 20px;">
                <h3>Parque Centenario - Tercera Etapa</h3>
                <p>
                    La nueva Etapa 3 del Parque Centenario habilitará un total de 40.125 m2 de su superficie,
                    equivalentes al 41% del total del área verde.

                    <br><br>El diseño original y completo del Parque está referido a un Plan Maestro Municipal, validado
                    en una consulta ciudadana el año 2014, donde participaron más de 25.000 personas. Este Plan proponía
                    volver al concepto original del parque tradicional y recreacional, con quinchos y equipamientos
                    complementarios.

                    <br><br>La Secretaría Comunal de Planificación de la Municipalidad de Arica, desarrolla los detalles
                    del diseño de la Etapa 3, que corresponde a la participación ciudadana en consulta. Esta etapa
                    contará con nuevas zonas de esparcimiento para el parque, las cuales están contempladas en el Plan
                    Maestro Original.

                    <br><br>Su objetivo es el complementar las actividades de las Etapas 1 y 2, a fin de seguir
                    aumentando su superficie habilitada en un 41% más, es decir 4 hectáreas nuevas de parque que
                    concretarán un 86% de todo el Parque Centenario. El 14% restante está destinado a una laguna y
                    piscinas, que se desarrollarían en forma posterior debido la complejidad de su ejecución.
                </p>
            </div>
            <div class="flex-zona-container">
                <div class="zona">
                    <a href="{{ route('juegos_infantiles') }}">
                        <img src="{{ asset('assets/etapa3/zonas/253x200-juegos-infantiles.jpg') }}" alt="">
                        <h5>Zona de juegos infantiles</h5>
                    </a>
                </div>
                <div class="zona">
                    <a href="{{ route('deportivas') }}">
                        <img src="{{ asset('assets/etapa3/zonas/253x200-area-deportiva.jpg') }}" alt="">
                        <h5>Zona deportiva</h5>
                    </a>
                </div>
                <div class="zona">
                    <a href="{{ route('educacion_ambiental') }}">
                        <img src="{{ asset('assets/etapa3/zonas/253x200-area-ambiental.jpg') }}" alt="">
                        <h5>Zona de educación ambiental</h5>
                    </a>
                </div>
                <div class="zona">
                    <a href="{{ route('vida_natural') }}">
                        <img src="{{ asset('assets/etapa3/zonas/253x200-area-natural.jpg') }}" alt="">
                        <h5>Zona de vida natural</h5>
                    </a>
                </div>
            </div>
        </div>
    </main>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scrollAnimation.js') }}"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
</body>
<footer id="footer">
    <div class="container">
        <div class="row pt-4 pb-2 align-items-center justify-content-between">
            <div class="col-md-6 d-flex align-items-center">
                <h2 class="logoAricaFooter mb-0">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('assets/logos/logo.png') }}" width="75%" />
                    </a>
                </h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="social-networks">
                    <a target="_blank" href="https://www.facebook.com/Ilustre-Municipalidad-de-Arica-161510384004301/"
                        class="facebook"><i class="fab fa-facebook"></i></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCcVtpRl__F8KinypQGhO7VA/feed"
                        class="google"><i class="fab fa-youtube"></i></a>
                    <a target="_blank" href="https://twitter.com/muniarica" class="twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a target="_blank" href="https://www.flickr.com/photos/muniarica/" class="flick"><i
                            class="fab fa-flickr"></i></a>
                    <a target="_blank" href="https://www.instagram.com/muniarica/" class="instagram"><i
                            class="fab fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-xs-6 col-lg-3">
                <h5>Más Información</h5>
                <span>Dirección: Av. España #2820</span> <br />
                <span>E-mail: centenario@municipalidadarica.cl</span> <br />
                <span>Teléfonos: 432380090 +56964770797 432380091 </span>
            </div>
            <div class="col-sm-3 col-xs-6 col-lg-3">
                <h5>Intranet</h5>
                <ul>
                    <li>
                        <a href="http://172.25.23.201" target="_blank">Intranet Municipal</a>
                    </li>
                    <li>
                        <a href="http://intranetarica.smc.cl/" target="_blank">Intranet SMC</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-6 col-lg-3">
                <h5>Ley de Transparencia</h5>
                <ul>
                    <li>
                        <a
                            href="https://www.portaltransparencia.cl/PortalPdT/web/guest/directorio-de-organismos-regulados?p_p_id=pdtorganismos_WAR_pdtorganismosportlet&amp;orgcode=9b754cd45ececd0138f367362452894d">Portal
                            de Transparencia</a>
                    </li>
                    <li>
                        <a href="https://transparencia.municipalidaddearica.cl/">Transparencia Activa</a>
                    </li>
                    <li>
                        <a href="https://transparencia.municipalidaddearica.cl/page.php?p=380">Actas del Concejo
                            Municipal</a>
                    </li>
                    <li>
                        <a href="https://transparencia.municipalidaddearica.cl/page.php?p=11">Cuenta Pública</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-6 col-lg-3">
                <h5>Municipalidad</h5>
                <ul>
                    <li><a href="http://www.gmail.com">WebMail</a></li>
                    <li><a href="{{ route('login') }}">Administración WEB</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>Ilustre Municipalidad de Arica</p>
    </div>
</footer>

</html>
