<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia - Localização</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/localizacao.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <h1>Localização</h1>

    <div class="row">
      <div class="col-md-7">
        <div id="map"></div>
        <script>
          function initMap() {
            var uluru = { lat: -21.772934384046984, lng: -43.370630955437946 };
            var map = new google.maps.Map(document.getElementById('map'), { zoom: 17, center: uluru });
            var marker = new google.maps.Marker({ position: uluru, map: map });
          }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSiyG7MJ_-fDhgi-Sn0OUVHYnTE_o_qnc&callback=initMap"></script>
      </div>

      <div class="col-md-5">
        <h2>Endereço</h2>
        <p>Av. Exemplo, 123 - Algum Lugar, Terra do Nunca | MG </p>

        <h2>Telefone</h2>
        <p>(01) 2345-6789</p>

        <h2>Horários de Funcionamento</h2>
        <p>Sempre que possível</p>
      </div>
    </div>
  </main>

  <footer class="bg-dark text-white mt-5 footer">
    <div class="container">
      <div class="pt-2 mb-3 text-center justify-content-center">
        <h6 class="text-uppercase font-weight-bold">
          <a href="../html/home.html">Início</a>
        </h6>
        <h6 class="text-uppercase font-weight-bold">
          <a href="../html/quemsomos.html">Quem Somos</a>
        </h6>
        <h6 class="text-uppercase font-weight-bold">
          <a href="../html/produtos.html">Produtos</a>
        </h6>
        <h6 class="text-uppercase font-weight-bold">
          <a href="../html/localizacao.html">Localização</a>
        </h6>
        <h6 class="text-uppercase font-weight-bold">
          <a href="../html/contato.html">Contato</a>
        </h6>
      </div>

      <div class="row text-center">
        <div class="col-md-12">
          <div class="mb-4 pb-0 flex-center">
            <a class="fb-ic p-2" href="#">
              <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a class="tw-ic p-2" href="#">
              <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a class="insta-ic p-2" href="#">
              <i class="fab fa-instagram fa-2x"></i>
            </a>
          </div>
        </div>
      </div>
      
      <div class="py-2 text-center">
        Copyright © 2018 Farmárcia
      </div>
    </div>
  </footer>
</body>

</html>