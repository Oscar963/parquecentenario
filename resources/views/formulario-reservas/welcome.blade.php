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
    @include('partials.header_publico')
    @include('partials.section_navigation')
    <div id="carouselExample" class="carousel slide carousel-fade image-container" data-bs-ride="carousel"
        data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/fotos-parque/foto3.jpg" class="d-block w-100 responsive-image sombra" alt="Logo">
                <a href="{{ route('formulario') }}" class="custom-hover centered-link">¡Reserva tu quincho!</a>
            </div>
            <div class="carousel-item">
                <img src="assets/fotos-parque/multifamiliar.jpg" class="d-block w-100 responsive-image sombra"
                    alt="Logo">
                <a href="{{ route('formulario') }}" class="custom-hover centered-link">¡Reserva tu quincho!</a>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h2 style="text-align: center; margin-top: 30px; margin-bottom: 30px" class="animation-h2">Antes de reservas, cosas
        que debes saber...</h2>
    <div class="parent">
        <div class="container-reglas">
            <img src="assets/iconos/globo.png" alt="">
            <hr class="separador">
            <p>Está prohibido el ingreso de globos</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/tarjeta-de-identificacion.png" alt="">
            <hr class="separador">
            <p>Dejar cédula de identidad en boletería al momento de arrendar un quincho</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/apreton-de-manos.png" alt="">
            <hr class="separador">
            <p>Respeta a los funcionarios</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/casa-del-arbol.png" alt="">
            <hr class="separador">
            <p>No se permite el uso de la casa del árbol</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/reloj-de-arena.png" alt="">
            <hr class="separador">
            <p>Si llegas después de 59 minutos a tu quincho, perderás tu reserva</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/carne-asada.png" alt="">
            <hr class="separador">
            <p>Si desea hacer un asado, tiene como tope de ingreso hasta las 14:00</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/drone-de-camara.png" alt="">
            <hr class="separador">
            <p>Está prohibido el uso de drones en el parque</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/hervidor-electrico.png" alt="">
            <hr class="separador">
            <p>Está prohibido conectar elementos electrónico de gran consumo que superen los 250 watts</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/alimento.png" alt="">
            <hr class="separador">
            <p>No está permitido comercializar en el parque</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/fotografo.png" alt="">
            <hr class="separador">
            <p>Si deseas hacer una sesión de fotografía particular, deberás solicitar mediante una carta dirigida al
                Alcalde la autorización</p>
        </div>
        <div class="container-reglas">
            <img src="assets/iconos/perro.png" alt="">
            <hr class="separador">
            <p>No se autoriza el ingreso de animales</p>
        </div>
    </div>

    <div class="info-mapas-container">
        <div class="mapa-container">
            <h2>Plano del parque</h2>
            <img src="{{ asset('assets/fotos-parque/plano_simbologia.jpg') }}" alt="" width="700"
                height="450" class="gallery-items">
        </div>
        <div class="mapa-container">
            <h2 style="text-align: center;">¿Dónde nos encontramos?</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.5055614146445!2d-70.3020335239208!3d-18.460745394245276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915aa9a80d4a8685%3A0x9d1d46de613d6df9!2sParque%20Centenario%20Arica!5e0!3m2!1ses-419!2scl!4v1730979262420!5m2!1ses-419!2scl"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <address>
                Dirección: Av. España #2820<br>
                Correo Electrónico: <a
                    href="mailto:centenario@municipalidadarica.cl">centenario@municipalidadarica.cl</a><br>
                Teléfono: <a href="tel:+58582206090">(58) 220 6090</a>
            </address>
        </div>
        <div class="mapa-container informacion">
            <h2>Horarios y tarifas</h2>

            <section>
                <h3>Horarios</h3>
                <p>
                    A partir del día domingo 8 de septiembre, haremos el cambio a nuestro horario de verano, que será de
                    martes a domingo, en horario continuo desde las 10:00 hasta las 19:00 horas.
                </p>
                <p>
                    Los lunes, el parque permanecerá cerrado por labores de mantención.
                </p>
            </section>

            <section>
                <h3>Tarifas</h3>

                <h6>Cobros por ingreso al parque</h6>
                <ul>
                    <li>Niños de 6 a 12 años: $250</li>
                    <li>Personas de la tercera edad: $250</li>
                    <li>Adultos: $500</li>
                </ul>

                <h6>Cobros por ocupación de quincho</h6>
                <ul>
                    <li>Quinchos unifamiliares: $3.000</li>
                    <li>Quinchos multifamiliares: $20.000</li>
                </ul>
            </section>
            <div class="boton-info pb-3">
                <a href="{{ route('horarios_tarifas') }}" class="grow"> Más información aquí</a>
            </div>
        </div>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/fotos-parque/entradax900.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/fotos-parque/estatuas.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/fotos-parque/foto1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/fotos-parque/lugar1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/fotos-parque/comunidad1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/fotos-parque/comunidad2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
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
