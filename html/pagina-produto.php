<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Nome do Produto</title>

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/pagina-produto.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <figure class="produto-container">
      <div class="row">
        <!-- Imagem do produto -->
        <div class="thumb-container col-lg-5 img-thumbnail">
          <img class="thumb-img img-fluid" src="../assets/imgs/produto-placeholder.png">
        </div>
        <!-- Imagem do produto -->

        <!-- Descrição do produto -->
        <figcaption class="col-lg-7">
          <h1 class="titulo-produto">Cataflam 50mg Com 10 Comprimidos</h3>
            <p class="marca">Marca</p>

            <p>In hac habitasse platea dictumst. Etiam in quam eget velit molestie maximus sed sed augue. In dapibus sapien
              vel justo tempor interdum. Vestibulum dolor nisi, venenatis quis dolor quis, volutpat tincidunt arcu.
            </p>
        </figcaption>
        <!-- Descrição do produto -->
      </div>

      <!-- Informações adicionais -->
      <div class="info-extra row">
        <div class="col-lg-4 col-md-6">
          <h3>Lorem</h3>
          <p>Etiam sodales in urna nec consequat. In hac habitasse platea dictumst. Aliquam accumsan ex vel lectus maximus,
            nec facilisis ex malesuada. Aliquam sem ipsum, sollicitudin nec rhoncus in, porttitor nec augue</p>
        </div>
        <div class="col-lg-4 col-md-6">
          <h3>Ipsum</h3>
          <p>Praesent sed leo eu lectus facilisis congue. Suspendisse porta ipsum sit amet risus hendrerit rhoncus. Integer
            suscipit augue sit amet arcu ullamcorper, id facilisis neque euismod.</p>
        </div>
        <div class="col-lg-4 col-md-6">
          <h3>Dolor</h3>
          <p>Aenean quis tellus non est accumsan tincidunt sit amet ut turpis. Suspendisse tristique magna in massa ultrices
            vehicula. Duis facilisis ligula non diam tempus, vel tempus nisl aliquet.</p>
        </div>
      </div>
      <!-- Informações adicionais -->
    </figure>
  </main>

  <footer class="bg-dark text-white footer">
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
      
      <div class="text-center">
        Copyright © 2018 Farmárcia
      </div>
    </div>
  </footer>

  <script src="../assets/javascript/jquery.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>