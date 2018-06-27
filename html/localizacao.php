<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia - Localização</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../assets/css/localizacao.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/comum.css">
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

  <?php require 'footer.php' ?>

</body>

</html>
