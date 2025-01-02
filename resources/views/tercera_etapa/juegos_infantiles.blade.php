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
    <link rel="stylesheet" href="{{ asset('css/zonas.css') }}">
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

<body class="griden">
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
    <main>
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
        <div class="wrapper">
            <div class="main-photo-wrapper">
                <img id="mainPhoto" src="">
                <button id="togglePause">
                    <img id="pauseIcon" src="/assets/iconos/boton-de-play.png" alt="Play" />
                </button>
            </div>
            <div class="image-wrapper">
                <img class="imgCarousel" src="{{ asset('assets/etapa3/zonas/infantil/full/zinfantil1.jpg') }}">
                <img class="imgCarousel" src="{{ asset('assets/etapa3/zonas/infantil/full/zinfantil2.jpg') }}">
                <img class="imgCarousel" src="{{ asset('assets/etapa3/zonas/infantil/full/zinfantil3.jpg') }}">
                <img class="imgCarousel" src="{{ asset('assets/etapa3/zonas/infantil/full/zinfantil4.jpg') }}">
            </div>
        </div>
        <div class="flex-info-zona-container">
            <section class="info-zona">
                <h2>Área Infantil</h2>

                <article>
                    <h3>Descripción Cualitativa</h3>
                    <p>
                        La zona infantil considera como criterio vital, la interacción de sus usuarios por igual, a
                        través de una inclusión real de todos los niños con capacidades diferentes en cada uno de los
                        juegos.
                    </p>
                    <p>
                        El sector escogido se emplaza en una infraestructura existente (ex - piscinas), con distintos
                        niveles que se aprovechan para que el lugar en sí mismo sea una experiencia lúdica, a través de
                        un juego entretenido y creativo, el cual está inserto en un entorno arbóreo, resguardado y
                        cobijado por especies existentes, que permiten la conexión entre el niño y la naturaleza.
                    </p>
                    <p>
                        Además, este espacio propone el encuentro social con sus pares, para lo cual se dispone de un
                        anfiteatro infantil que potencia la sociabilización, a través de distintas actividades
                        culturales y de expresión artística entre otras.
                    </p>
                </article>

                <article>
                    <h3>Descripción Cuantitativa</h3>

                    <section>
                        <h4>A. Superficie total de la zona Juegos Infantiles</h4>
                        <p>11.153 m², que se subdivide en:</p>
                        <ul>
                            <li>A.1. Plaza Inclusiva = 2.835 m²</li>
                            <li>A.2. Parque Natural = 8.318 m²</li>
                        </ul>
                    </section>

                    <section>
                        <h4>B. Tipos de Juego</h4>
                        <p>
                            Fomentan el desarrollo físico, la estimulación de los sentidos, el desarrollo social y el
                            cognitivo a través de la incorporación de juegos estimulantes e inclusivos de tipo
                            sensoriales, colaborativos, juegos libres, de roles, entre muchos otros.
                        </p>
                    </section>

                    <section>
                        <h4>C. Tipos de Usuarios</h4>
                        <p>Se proponen distribuidos de dos formas: una por rango etario y otra de encuentro social según
                            el siguiente detalle:</p>

                        <section>
                            <h5>c.1. Rango Etario:</h5>
                            <ul>
                                <li>1ª Infancia (Entre 0 a 2 años)</li>
                                <li>2ª Infancia (Entre 2 a 5 años)</li>
                                <li>3ª Infancia (Entre 5 a 12 años)</li>
                                <li>Adultos en general</li>
                                <li>Adultos Mayores</li>
                            </ul>
                        </section>

                        <section>
                            <h5>c.2. Encuentro social:</h5>
                            <p>En los lugares de encuentro social se reúnen todos los rangos etarios indicados en el
                                punto c.1.</p>
                        </section>
                    </section>

                    <section>
                        <h4>D. Carga de Ocupación</h4>
                        <p>Se estima una carga de ocupación de 530 personas aproximadamente.</p>
                    </section>
                </article>
            </section>
            <section class="nav-video-container">
                <article class="video-container">
                    <h2 class="video-titulo">
                        <img src="/assets/iconos/youtube.png" alt="" class="icon-youtube">
                        Video - Zona de Juegos
                    </h2>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ob64VAwePJI?start=0"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </article>
                <nav class="enlaces-zonas">
                    <div class="deportivas nav-modr">
                        <a href="{{ route('deportivas') }}">
                            <h5>Zona deportiva</h5>
                        </a>
                    </div>
                    <div class="infantiles nav-modr">
                        <a href="{{ route('juegos_infantiles') }}">
                            <h5>Zona de juegos infantiles</h5>
                        </a>
                    </div>
                    <div class="natural nav-modr">
                        <a href="{{ route('vida_natural') }}">
                            <h5>Zona de vida natural</h5>
                        </a>
                    </div>
                    <div class="ambiental nav-modr">
                        <a href="{{ route('educacion_ambiental') }}">
                            <h5>Zona de educación ambiental</h5>
                        </a>
                    </div>
                </nav>
            </section>
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
    <script src="{{ asset('js/imageCarruselZonas.js') }}"></script>
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
