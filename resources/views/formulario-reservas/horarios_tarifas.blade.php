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
    <link rel="stylesheet" href="{{ asset('css/horario_tarifas.css') }}">
    <link rel="icon" href="{{ asset('assets/logos/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
      .gallery-items{
          float: left;
          height: 350px;
      }
    </style>
</head>
<body class="grid-container">
    @include('partials.header_publico')
    @include('partials.section_navigation')
    <div class="grid-horarios-tarifas">
      <div class="contenido-horarios-tarifas">
        <div class="espacio-contenido">
          <h2 class="titulo-horario-tarifas">Horario y tarifas</h2>
          <hr>
          <h3>
            <img src="/assets/iconos/calendario.png" alt="" class="icono-size">
            Horarios
          </h3>
          <p>El horario de funcionamiento del Parque Centenario será el siguiente:</p>
          <p>A partir del <strong>domingo 8 de septiembre</strong>, cambiaremos a nuestro horario de verano:</p>
          <ul>
            <li><strong>Martes a Domingo:</strong> Horario continuo desde las 10:00 hasta las 19:00 horas.</li>
            <li><strong>Lunes:</strong> Cerrado por labores de mantención.</li>
          </ul>
          <p><em>Nota:</em> La Ilustre Municipalidad de Arica se reserva el derecho de modificar los horarios.</p>
          <hr>
          <h3>
            <img src="/assets/iconos/billete-de-banco.png" alt="" class="icono-size">
            Tarifas
          </h3>

          <p><strong>Ingreso al parque</strong></p>
          <p>La tarifa de entrada permite a los visitantes acceder al parque y disfrutar de los siguientes espacios:</p>
          <ul>
            <li>Zona deportiva</li>
            <li>Zona de esculturas</li>
            <li>Zona de quinchos</li>
            <li>Zona de juegos infantiles</li>
            <li>Servicios higiénicos y ciclovías</li>
          </ul>
          <p>También podrán disfrutar de los recursos paisajísticos y ambientales, así como realizar otras actividades de recreación y educación ambiental que estén autorizadas y abiertas al uso público.</p>

          <p><strong>Cobros por ingreso al Parque:</strong></p>
          <ul>
            <li><strong>Niños de 6 a 12 años:</strong> $250</li>
            <li><strong>Personas de la Tercera Edad:</strong> $250</li>
            <li><strong>Adultos:</strong> $500</li>
          </ul>

          <p><strong>Ocupación de Quincho</strong></p>
          <p>Para ocupar un quincho, debe registrarse en la administración del parque, donde el adulto responsable deberá dejar su carnet de identidad y devolver la infraestructura en las mismas condiciones en que se le facilitó.</p>

          <p><strong>Cobro por Ocupación de Quincho:</strong></p>
          <ul>
            <li><strong>Quincho Unifamiliar:</strong> $3.000</li>
            <li><strong>Quincho Multifamiliar:</strong> $20.000</li>
          </ul>

          <p><em>Nota:</em> La Ilustre Municipalidad de Arica se reserva el derecho de admisión y cobro.</p>
        </div>
        <div class="imagenes">
          <img src="/assets/fotos-parque/entrada.jpg" alt="foto-entrada">
          <img src="/assets/fotos-parque/multifamiliar.jpg" alt="foto-entrada">
          <img src="/assets/fotos-parque/plantas-blancas.jpg" alt="foto-entrada">
          <img src="/assets/fotos-parque/ninos-jugando.jpg" alt="foto-entrada">
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