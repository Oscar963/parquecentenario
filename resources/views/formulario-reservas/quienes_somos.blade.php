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
    <link rel="stylesheet" href="{{ asset('css/quienes_somos.css') }}">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
      .gallery-items{
          float: left;
          border-radius: 20px;
          mask-image: linear-gradient(
          #fff 90%,
          transparent
        );
      }
    </style>
</head>
<body class="grid-container">
    @include('partials.header_publico')
    @include('partials.section_navigation')
    <div class="image-container">
      <img src="assets/fotos-parque/comunidad1.jpg" class="d-block w-100" alt="Comunidad 2">
    </div>
    
    <div>
      <div class="flex-quienes-somos">
        <div class="iconos derecha">
          <img src="assets/iconos/grupo.png" alt="">
        </div>
        <div class="quienes-somos izquierda">
          <h3>Quiénes Somos</h3>
          <p>
            Somos el único pulmón verde emblemático de la ciudad de Arica, que después de años de abandono, vuelve a ser parte de la comunidad, un espacio añorado para compartir y disfrutar en familia. En las 3.5 hectáreas que contempla la primera etapa de recuperación, podrás disfrutar de quinchos, esculturas de madera, la recordada Casa del Árbol, además de alrededor de 1.300 especies arbóreas nativas que rodean el Parque. 

            <br><br>Bajo la gestión del alcalde Gerardo Espíndola Rojas, y finalizada la primera etapa de recuperación del Parque Centenario, ejecutada por la Municipalidad de Arica, comienza la administración del recinto, a través del equipo de profesionales, dependiente de la Secretaría Comunal de Planificación (SECPLAN) y treinta funcionarios municipales conformados por guarda parques, jardineros y administrativos, los que están a cargo del cuidado y conservación de las áreas verdes.
          </p>
        </div>
      </div>
      <div class="flex-quienes-somos fondo-negro">
        <div class="quienes-somos derecha">
          <h3 class="color-blanco">Diseño y Construcción</h3>
          <p class="color-blanco">
            El diseño del Parque Centenario es parte del equipo multidisciplinario de la Municipalidad de Arica, que comprende a arquitectos, arqueólogos, agrónomos, constructores civiles, topógrafos, artistas y jardineros, todos estos, herederos de la historia del recinto.

            <br><br>Cabe destacar que este proyecto está inserto dentro del Plan Especial de Desarrollo de Zonas Extremas, PEDZE, recursos que fueron utilizados por la Municipalidad de Arica, para el nuevo diseño, ejecución y recuperación del pulmón verde. 
          </p>
        </div>
        <div class="iconos izquierda">
          <img src="assets/iconos/trabajadores.png" alt="">
        </div>
      </div>
      <div class="flex-quienes-somos">
        <div class="iconos derecha">
          <img src="assets/iconos/simbiosis.png" alt="">
        </div>
        <div class="quienes-somos izquierda">
          <h3>Flora y Fauna</h3>
          <p>
            Después del lamentable cierre del parque el año 2011, la vegetación desapareció del plano, dejando a la comuna aún más desértica, y sin el único lugar al aire libre donde la familia ariqueña podía reunirse y compartir, de asados, juegos y momentos de recreación.

            <br><br>Es por eso que hoy, siete años después, el Parque Centenario vive una etapa de reforestación evidente a los ojos de todos, convirtiéndolo en un parque desértico costero. Adornados por Tamarix, Pimientos, Vilcas, Eucaliptus, Aromos, Cucardas, Laureles y Saponarias, florestas que han ido retomando sus colores característicos, dando hojas nuevas como respuesta al manejo agronómico realizado por especialistas durante el proceso de recuperación.

            <br><br>Las donaciones de árboles, palmeras y la creación de nuevas áreas de césped, han dado vida a zonas específicas del parque, donde el Picaflor de Arica "Eulidia yarrelli" ha encontrado su hábitat, trasformando al Parque Centenario en un lugar donde la naturaleza vuelve a revivir para todas y todos nosotros.
          </p>
        </div>
      </div>
      <div class="mapa fondo-negro">
        <div class="derecha">
          <h3 class="color-blanco centrar-h3">Plano del parque</h3>
        </div>
        <div class="quienes-somos izquierda">
          <img src="{{ asset('assets/fotos-parque/plano_simbologia.jpg') }}" alt="" width="600" class="gallery-items">
        </div>
      </div>
      <div class="mapa">
        <div class="derecha">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.5055614146445!2d-70.3020335239208!3d-18.460745394245276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915aa9a80d4a8685%3A0x9d1d46de613d6df9!2sParque%20Centenario%20Arica!5e0!3m2!1ses-419!2scl!4v1730979262420!5m2!1ses-419!2scl" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="quienes-somos izquierda">
          <address>
            Dirección: Av. España #2820<br>
            Correo Electrónico: <a href="mailto:centenario@municipalidadarica.cl">centenario@municipalidadarica.cl</a><br>
            Teléfono: <a href="tel:+58582206090">(58) 220 6090</a>
          </address>
        </div>
      </div>
      <div class="historia fondo-negro">
        <div style="padding: 30px">
          <h3 class="color-blanco" style="text-align: center; font-size: 50px;">Historia del antes y después</h3>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"></li>
          </ol>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="d-block w-100  zoom-image" src="{{ asset('assets/antesydespues/1-1.jpg') }}" alt="First slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100  zoom-image" src="{{ asset('assets/antesydespues/1-2.jpg') }}" alt="Second slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100  zoom-image" src="{{ asset('assets/antesydespues/2-1.jpg') }}" alt="Third slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100  zoom-image" src="{{ asset('assets/antesydespues/2-2.jpg') }}" alt="Fourth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100  zoom-image" src="{{ asset('assets/antesydespues/3-1.jpg') }}" alt="Fifth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100  zoom-image" src="{{ asset('assets/antesydespues/3-2.jpg') }}" alt="Sixth slide">
              </div>
          </div>
         
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
      <div class="flex-quienes-somos">
        <div class="responsive-estatua">
          <img class="img-estatua" src="assets/fotos-parque/estatuas.jpg" alt="">
        </div>
        <div class="quienes-somos izquierda">
          <h3>Conoce el Parque Centenario</h3>
          <p>
            La primera etapa del Parque Centenario es uno de los grandes proyectos que ha realizado la Municipalidad de Arica, a cargo de la gestión del alcalde Gerardo Espíndola Rojas y que, nuevamente, abre sus puertas a todas las familias de la comuna. 

            <br><br>El espacio se evoca a la actividad familiar que vivían nuestros padres y abuelos durante la época dorada del recinto. Actualmente, cuenta con 53 quinchos unifamiliares para asados y cumpleaños y dos multifamiliares con una capacidad para 38 personas. La recordada Casa del Árbol, una estructura ruinosa de madera, conocida por todos aquellos que asistieron al parque, vuelve a tomar vida en esta primera etapa de recuperación, permitiendo a las y los ariqueños, sumar un atractivo más, para disfrutar los fines de semana en compañía de familias y amigos.

            <br><br>Además, las esculturas talladas en los troncos de antiguos árboles sin vida, vuelven a recuperar su espíritu a través de las manos del artista, Juan de Dios Bustamante, adornando la entrada del jardín, permitiendo, no solo un espacio de entretención, sino también un lugar para apreciar y aprender de la historia regional. 

            <br><br>El Parque Centenario tiene una capacidad de 15.000 visitas al mes, quienes podrán disfrutar de actividades deportivas, compartiendo con la familia y amigos, de las bondades de este espacio al aire libre, y siendo participes, de las múltiples actividades que la Municipalidad de Arica realizará para todos aquellos quienes asistan.
          </p>
        </div>
      </div>
      <div class="flex-quienes-somos fondo-negro">
        <div class="quienes-somos derecha">
          <h3 class="color-blanco">¿Sabías que?</h3>
          <p class="color-blanco">
            Los árboles, palmeras y césped que ves en el parque son donaciones de empresas. El ex Hotel El Paso, donde hoy se encuentra ubicado el Arica City Center, donó 80 especies arbóreas, 80 especies arbustivas y 150 especies gramíneas.

            <br><br>Las esculturas que ves a la entrada del parque fueron hechas por Juan de Dios Bustamante y son de los troncos de los árboles.
          </p>
        </div>
        <div class="izquierda">
          <img class="img-estatua" src="assets/fotos-parque/foto1.jpg" alt="">
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(function () {
          var viewer = ImageViewer();
          $('.gallery-items').click(function () {
              var imgSrc = this.src,
                  highResolutionImage = $(this).data('high-res-img');
      
              viewer.show(imgSrc, highResolutionImage);
          });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scrollAnimation.js') }}"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
</body>
@include('partials.footer')
</html>