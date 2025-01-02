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
    <link rel="stylesheet" href="{{ asset('css/reglamentos.css') }}">
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
    @include('partials.header_publico')
    @include('partials.section_navigation')
    <h1 class="titulo-reglamentos">
        <img src="/assets/iconos/normas.png" alt="" class="normas-icono">
        Normas generales de uso
    </h1>

    <div class="container-info">
        <nav class="info">
            <a href="#horarios">Horarios</a>
            <a href="#cobros-multas">Cobros y Multas</a>
            <a href="#normas-generales">Normas Generales de uso</a>
            <a href="#normas-especificas">Normas Específicas de uso por Zona</a>
        </nav>
    </div>

    <div class="grid-normas">
        <div class="centra">
            <div id="horarios" class="norma horarios">
                <h3>El Horario de funcionamiento del Parque Centenario será el siguiente:</h3>
                <hr>
                <p><strong>Horario de Verano:</strong> a partir del <span>06-sept-2023</span> al
                    <span>06-04-2024</span>, de martes a domingo, horario continuado de <span>10:00 a 19:00</span>
                    horas.</p>
                <p><strong>Horario de Invierno:</strong> a partir del <span>07-04-2024</span> al
                    <span>06-09-2024</span>, de martes a domingo, horario continuado de <span>10:00 a 17:00</span>
                    horas.</p>
                <p><em>* Los lunes no abrirá el parque por encontrarse en labores de mantención.</em></p>
                <p><strong>NOTA:</strong> La Ilustre Municipalidad de Arica se reserva el derecho de modificar los
                    horarios.</p>
            </div>
        </div>

        <div class="centra">
            <div id="cobros-multas" class="norma cobros-multas hidden">
                <h3>COBROS:</h3>
                <hr>
                <strong>A.1 Cobros por Ingreso al Parque:</strong>
                <ul>
                    <li>Valor $500 por Adulto</li>
                    <li>Valor $250 por Niño de 6 a 12 años</li>
                    <li>Valor $250 por Adulto Mayor</li>
                </ul>
                <strong>A.2 Cobro por Ocupación Quincho Unifamiliar:</strong> Valor $3.000 diario, previo registro de
                formulario entregado en la Administración del Parque, donde deberá dejar su carnet de identidad el
                adulto responsable de la ocupación, quien deberá devolver la infraestructura solicitada en las mismas
                condiciones en que se le facilitó.<br><br>
                <strong>A.3 Cobro por Ocupación Quincho Multifamiliar:</strong> Valor $20.000 diario, previo registro de
                formulario entregado en la Administración del Parque, donde deberá dejar su carnet de identidad el
                adulto responsable de la ocupación, quien deberá devolver la infraestructura solicitada en las mismas
                condiciones en que se le facilitó.
                <p><strong>Nota:</strong> La Ilustre Municipalidad de Arica se reserva el derecho de admisión y cobro.
                </p>

                <h3>MULTAS:</h3>
                <p><strong>MULTA POR DAÑO A LA INFRAESTRUCTURA Y ÁREA VERDE:</strong></p>
                <p>Los daños a cualquier infraestructura, dependencia y áreas verdes del parque causados por los
                    usuarios dentro del establecimiento estarán afectos a una multa que será determinada por el Juzgado
                    de Policía Local correspondiente, previo informe de la Ilustre Municipalidad de Arica.</p>
            </div>
        </div>

        <div class="centra">
            <div id="normas-generales" class="norma normas-generales hidden">
                <h3>NORMAS GENERALES</h3>
                <hr>
                <h4>LIMPIEZA:</h4>
                <ul>
                    <li>Ayúdanos a cuidar el parque. Si ves a alguien tirando basura, dile que no lo haga.</li>
                    <li>Recoge los desechos durante tu estadía y deposítalos en los basureros.</li>
                    <li>Si ves basura, recógela y deposítala en el lugar que corresponde.</li>
                    <li>Avisa a los guardaparques si los basureros están repletos.</li>
                </ul>

                <h4>ÁREAS VERDES:</h4>
                <ul>
                    <li>No dañes las plantas, árboles y jardines.</li>
                    <li>No arranques flores ni deteriores el césped.</li>
                    <li>No escribas en los árboles.</li>
                    <li>No instales carpas en el parque.</li>
                </ul>

                <h4>INSTALACIONES:</h4>
                <ul>
                    <li>No dañes las instalaciones.</li>
                    <li>No destruyas el mobiliario urbano.</li>
                    <li>Pide permiso en la administración para solicitar un quincho o si deseas realizar un evento en el
                        parque.</li>
                    <li>No dejes las llaves de agua potable abiertas.</li>
                    <li>No circules ni estaciones vehículos o motocicletas dentro del parque, solo en lugares
                        habilitados.</li>
                    <li>Los menores de edad deben estar acompañados por un adulto responsable durante toda su estadía en
                        el parque.</li>
                    <li>Se prohíbe fumar en todo el recinto debido a la alta posibilidad de incendio.</li>
                    <li>Se prohíbe traspasar el cierre perimetral interior del parque que separa la primera etapa.</li>
                    <li>Se prohíbe el ingreso de cualquier elemento ajeno al parque centenario, como mesas de camping,
                        mesas plegables, sillas, quitasoles, toldos, juegos inflables, taca-taca, parrillas eléctricas,
                        gas o carbón, camas elásticas, hervidores, arroceras, pisos plásticos, drones y volantines.</li>
                    <li>Tanto menores como adultos no pueden estar en el parque sin polera o camisa y/o pies descalzos.
                    </li>
                    <li>El consumo de alcohol debe ser autorizado y restringido al interior del quincho solamente.</li>
                    <li>Se prohíbe el uso de globos en el interior del parque.</li>
                </ul>
                <strong>
                    El ingreso de mascotas solo se permitirá a animales de asistencia emocional, presentando los
                    certificados que lo acrediten como tal al momento del ingreso al parque.
                </strong>
            </div>
        </div>
        <div class="centra">
            <div id="normas-especificas" class="norma normas-especificas hidden">
                <nav class="nav-normas">
                    <a href="#zona-cultural">
                        <img src="{{ asset('assets/botones-planos/boton zona cultural.png') }}" alt="Zona Cultural">
                    </a>

                    <a href="#quinchos">
                        <img src="{{ asset('assets/botones-planos/boton quinchos.png') }}" alt="Quinchos">
                    </a>

                    <a href="#juegos">
                        <img src="{{ asset('assets/botones-planos/boton juegos.png') }}" alt="Juegos">
                    </a>

                    <a href="#deportiva">
                        <img src="{{ asset('assets/botones-planos/boton deportiva.png') }}" alt="Deportiva">
                    </a>

                    <a href="#casa">
                        <img src="{{ asset('assets/botones-planos/boton casa.png') }}" alt="Casa">
                    </a>
                </nav>

                <div id="zona-cultural" class="info1">
                    <h2>REGLAMENTO PARQUE CENTENARIO</h2>
                    <h3>ZONA CULTURAL:</h3>
                    <p>La zona cultural ofrece al visitante una serie de esculturas realizadas por don Juan de Dios
                        Bustamante a partir de los troncos de árboles, los cuales son testigos de la historia de este
                        patrimonio cultural, pasando por culturas como la chinchorro e inca y épocas como la colonial
                        hasta la república. A continuación, se presentan las obras de este reconocido escultor.</p>
                    <ul>
                        <li>“La inspiración” (2000 – 2001)</li>
                        <li>“AWKISA, Homenaje al padre” (2001-2002)</li>
                        <li>“MAIZERA ORIGINARIA” (2005)</li>
                        <li>“EL CACIQUE INCA ARIACA” (2010)</li>
                        <li>“LA ASCENSIÓN DE CRISTO” (2011)</li>
                        <li>“Hitos Históricos y prehistóricos de Arica” (2012)</li>
                    </ul>
                    <h3>NORMAS DE USO:</h3>
                    <ul>
                        <li>No se permitirá dañar de manera alguna a las esculturas, ni ingresar al perímetro de
                            protección de ellas.</li>
                        <li>Ninguna persona deberá remover fósiles, artefactos arqueológicos o culturales que se
                            encuentren en el interior del parque.</li>
                        <li>Favor reportar cualquier problema a la administración del parque.</li>
                    </ul>
                </div>

                <div id="quinchos" class="info1 hidden">
                    <h2>REGLAMENTO PARQUE CENTENARIO</h2>
                    <h3>ZONA QUINCHOS:</h3>
                    <p>Los quinchos están en un lugar recreacional y de esparcimiento donde el objetivo es fraternizar y
                        compartir con los suyos, permitiendo en un ambiente sano y familiar, programar sus distintas
                        actividades.</p>
                    <ul>
                        <li>52 quinchos unifamiliares con capacidad de 8 personas.</li>
                        <li>02 quinchos multifamiliares con capacidad de 32 personas.</li>
                    </ul>
                    <h3>NORMAS DE USO:</h3>
                    <ul>
                        <li>Tendrán derecho a ocupar los quinchos y sus instalaciones, solo los usuarios que hayan
                            solicitado la reserva y uso de quincho, mediante formulario entregado en la administración
                            del parque, donde se deberá dejar su carnet de identidad hasta que abandone el quincho donde
                            le será devuelto.</li>
                        <li>No se permitirá el destrozo o deterioro, de cualquier elemento del quincho y del parque, de
                            lo contrario será sancionado.</li>
                        <li>El proceder del usuario en los quinchos se debe enmarcar dentro de las buenas costumbres,
                            por ej. respetando el sitio asignado, orinando en los baños, depositando sus desperdicios en
                            los basureros que se encuentran en el parque y lo más importante no se permitirá que las
                            personas producto del consumo de alcohol, tengan una conducta indecorosa, la contravención a
                            estas normas generara sanciones y el retiro inmediato de las dependencias del parque.</li>
                        <li>En caso que al quincho asistan menores de edad, se establece como condición esencial la
                            presencia de un adulto responsable hasta la finalización del uso en el recinto, quien tendrá
                            a su cargo el estricto control de los menores. Queda totalmente prohibido el consumo de
                            alcohol por menores de edad.</li>
                        <li>La administración se reserva el derecho a admisión y permanencia en el parque. (ley 19.327)
                        </li>
                        <li>En el caso del uso de equipos de sonido estos deberán ser pequeños y con volumen bajo de
                            manera de no molestar a los otros usuarios del parque. En el supuesto que ocurra algún
                            reclamo, el usuario hará de inmediato caso a la orden impartida por la administración del
                            parque de lo contrario se atendrá a las sanciones dispuestas por ella.</li>
                        <li>En el caso de los lavaderos comunes de los quinchos multifamiliares, no se debe dejar la
                            llave del agua abierta la cual debe ser utilizada en forma racional y exclusivamente para el
                            lavado de utensilios, evitando el gasto innecesario de este vital elemento. Tampoco se
                            permitirá botar basura ni desechos en ningún lugar que no sea el habilitado para ello. (ley
                            18.697)</li>
                        <li>El usuario responsable una vez terminado el uso del quincho deberá entregarlo en perfectas
                            condiciones de limpieza y conservación. Si no se cumpliera tal premisa será sancionado.</li>
                        <li>Está totalmente prohibido el uso de pirotecnia y de todo tipo o cualquier clase de material
                            combustible dentro de los quinchos. Solo se permitirá el uso de carbón en las parrillas
                            habilitadas para ello, por lo que antes de abandonar el área después de un fuego, el usuario
                            deberá empapar los carbones calientes con agua hasta que estén fríos.</li>
                        <li>Los fuegos para asados se permiten solo en las parrillas habilitadas en el parque. No se
                            permitirán parrillas externas, se prohíbe fumar en cualquier zona del parque. Ante la mínima
                            posibilidad de incendio se deberá inmediatamente avisar a la administración y utilizar los
                            extintores dispuestos en el interior del parque.</li>
                        <li>No se deberá tirar basura en el parque. Todos los desechos, basura y materiales reciclables
                            originados durante su permanencia deberán ser colocados en los contenedores de basura y
                            reciclaje habilitados para ello.</li>
                        <li>No se permitirá instalar elementos que afecten la estética del conjunto, su aspecto o que
                            impliquen daños, a no ser que se cuente con la autorización expresa de la administración.
                        </li>
                        <li>Queda terminantemente prohibido arrojar papel picado u otro elemento similar en el quincho y
                            equipamiento varios, como así también en los jardines del parque.</li>
                        <li>La carga máxima instalada eléctrica por quincho es de 250 watts/220 volts (125 watts por
                            cada enchufe). Por lo que no se permitirá utilizar equipos que superen dicha potencia.</li>
                    </ul>
                </div>
                <div id="juegos" class="info1 hidden">
                    <h2>REGLAMENTO PARQUE CENTENARIO</h2>
                    <h3>ZONA JUEGOS INFANTILES:</h3>
                    <p>Los juegos infantiles están en un lugar recreacional y de esparcimiento donde el objetivo es
                        ofrecer a los niños la posibilidad de jugar al aire libre y de hacer amigos como ejercicio
                        físico. Cuide sus instalaciones y siga las siguientes normas:</p>
                    <h3>NORMAS DE USO:</h3>
                    <ul>
                        <li>El uso de los juegos infantiles está permitido para niños entre 5 a 12 años, con una
                            capacidad máxima de hasta 30 niños por juego.</li>
                        <li>Está prohibido el uso de los juegos para niños mayores de 12 años.</li>
                        <li>El uso correcto de estos equipamientos queda bajo la estricta supervisión y responsabilidad
                            de padres y adultos responsables a cargo de los niños.</li>
                        <li>El destrozo o deterioro de cualquier elemento de los juegos infantiles será sancionado por
                            la administración del parque.</li>
                        <li>Está prohibido el ingreso con alimentos, bebidas o mascotas al área de juegos, ni menos a
                            los juegos infantiles.</li>
                        <li>Está prohibido cualquier tipo de juego rudo en toda el área de juego que pueda ocasionar
                            accidentes.</li>
                        <li>No empujarse ni forcejear mientras jueguen.</li>
                        <li>Se prohíbe escarbar en la zona de arena ni tampoco remover fósiles arqueológicos o
                            culturales de propiedad del parque.</li>
                        <li>Está prohibido encaramarse en los árboles, ni dañar plantas, árboles y jardines.</li>
                        <li>Favor reportar cualquier problema a la administración del parque.</li>
                    </ul>
                </div>

                <div id="deportiva" class="info1 hidden">
                    <h2>REGLAMENTO PARQUE CENTENARIO</h2>
                    <h3>ZONA DEPORTIVA:</h3>
                    <p>Las canchas de arena son un lugar recreacional y de esparcimiento donde el objetivo es
                        fraternizar y compartir con los suyos, permitiendo un ambiente sano y familiar para programar
                        sus distintas actividades. A continuación, se informan las normas de uso con derechos y
                        obligaciones, donde todas las personas o instituciones que ocupen las canchas de arena, se
                        comprometen a asumir por el solo hecho de solicitar su uso.</p>
                    <h3>NORMAS DE USO:</h3>
                    <ul>
                        <li>Tendrán derecho a ocupar las canchas y sus instalaciones, solo los usuarios que cuenten con
                            el formulario de reserva y uso de canchas, entregado por la administración del parque.</li>
                        <li>El destrozo o deterioro de cualquier elemento de las canchas de arena, ocasionado por sus
                            integrantes, será asumido por el usuario responsable que figura en el formulario de reserva
                            y uso de cancha. Actuando como aval. En caso de daños serán de cargo del peticionario
                            responsable, debiendo este reintegrar el costo de las reparaciones que deban efectuarse.
                        </li>
                        <li>Se hará entrega de la cancha al usuario con el formulario, previa firma y entrega del
                            documento donde se dejan constancia de las condiciones de uso y horarios de uso.</li>
                        <li>No se permitirá el consumo de alcohol ni drogas al interior de las canchas.</li>
                        <li>El uso de los equipos deportivos estará sujeto a la disponibilidad y buena condición de los
                            mismos, debiendo devolverlos en el mismo estado que se entregaron.</li>
                    </ul>
                </div>

                <div id="casa" class="info1 hidden">
                    <h2>REGLAMENTO PARQUE CENTENARIO</h2>

                    <h3>CASA DEL ÁRBOL:</h3>
                    <p>
                        La casa del árbol es una estructura ruinosa de madera que se encontraba en el parque antes de
                        ser remodelado, también conocida como la casa embrujada o de trazan, entre otros nombres. Se ha
                        reconstruido de igual forma con el diseño original, de manera de rememorar este espacio, lleno
                        de magia que atesora historias y recuerdos de muchos ariqueños que la usaron en el pasado.
                    </p>

                    <h3>NORMAS DE USO:</h3>
                    <ul>
                        <li>El uso de la casa del árbol debe ser controlado respecto de la cantidad de personas que
                            pueden acceder a ella, por lo que el uso máximo de ocupación es de 20 personas.</li>
                        <li>El uso correcto de este equipamiento queda bajo la estricta supervisión y responsabilidad de
                            padres y adultos responsables a cargo de los niños.</li>
                        <li>El destrozo o deterioro de cualquier elemento de este equipamiento será sancionado por la
                            administración del parque.</li>
                        <li>Está prohibido ingresar con ningún tipo de alimentos, bebidas o mascotas al interior de este
                            equipamiento.</li>
                        <li>Está prohibido fumar, hacer grafitis, ingerir alcohol, hacer picnic o acampar al interior de
                            este equipamiento.</li>
                        <li>El proceder del usuario se debe enmarcar dentro de las buenas costumbres, por ejemplo,
                            cuidando esta infraestructura, orinando en los baños, depositando sus desperdicios en los
                            basureros habilitados que se encuentran en el parque y lo más importante, no se permitirá
                            que las personas tengan una conducta indecorosa en este espacio. La contravención a estas
                            normas generará sanciones y el retiro inmediato de las dependencias del parque.</li>
                        <li>Se prohíbe escalar, trepar o jugar en el sector de barandas.</li>
                        <li>Favor reportar cualquier problema a la administración del parque.</li>
                    </ul>
                </div>
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
    <script src="{{ asset('js/ocultarDivs.js') }}"></script>
    <script src="{{ asset('js/ocultarNormas.js') }}"></script>
</body>
@include('partials.footer')

</html>
