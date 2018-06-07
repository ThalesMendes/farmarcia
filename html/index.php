<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Home</title>

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <link rel="stylesheet" href="../assets/css/dialogo-produto.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow pr-5 pl-5 mb-0 bg-white rounded">
    <a class="navbar-brand" href="../html/home.html">
      <img src="../assets/imgs/logo.png" alt="Logo" style="width: 150px;">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse pt-2" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a href="../html/home.html" class="nav-link">Início</a>
        </li>
        <li class="nav-item">
          <a href="../html/quemsomos.html" class="nav-link">Quem somos</a>
        </li>
        <li class="nav-item">
          <a href="../html/produtos.html" class="nav-link">Produtos</a>
        </li>
        <li class="nav-item">
          <a href="../html/localizacao.html" class="nav-link">Localização</a>
        </li>
        <li class="nav-item">
          <a href="../html/contato.html" class="nav-link">Contato</a>
        </li>
      </ul>

      <div class="form-group pt-2">
        <div class="input-group">
          <input class="form-control" type="search" placeholder="Procurar produtos">
          
          <div class="input-group-append">
            <button class="btn btn-danger" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <main>
    <!-- Slideshow -->
    <section>
      <div id="slideshow" class="carousel slide" data-ride="carousel">
        <div class="container">
          <h2 class="titulo-section">Promoção</h2>
        </div>

        <ol class="carousel-indicators">
          <li data-target="#slideshow" data-slide-to="0" class="active"></li>
          <li data-target="#slideshow" data-slide-to="1"></li>
        </ol>

        <div class="container">
          <div class="carousel-inner">
            <!-- Slide -->
            <div class="carousel-item slide-item active">
              <div class="row">
                <!-- Imagem -->
                <div class="col-lg-4 img-container">
                  <img class="img-fluid" src="../assets/imgs/produto-placeholder.png">
                </div>

                <a href="pagina-produto.html">
                  <button class="btn btn-primary btn-lg">Página do produto</button>
                </a>
              </div>
            </div>
            <!-- Slide -->

            <!-- Slide -->
            <div class="carousel-item slide-item">
              <div class="row">
                <!-- Imagem -->
                <div class="col-lg-4 img-container">
                  <img class="img-fluid" src="../assets/imgs/produto-placeholder.png">
                </div>

                <a href="pagina-produto.html">
                  <button class="btn btn-primary btn-lg">Página do produto</button>
                </a>
              </div>
            </div>
            <!-- Slide -->

            <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Slideshow -->

    <!-- Produtos em destaque -->
    <section class="container destaques">
      <h2 class="titulo-section">Destaques</h2>

      <ol class="row">
        <!-- Produto -->
        <li class="col-12 col-md-6 col-lg-4">
          <figure class="produto card p-2">
            <!-- Imagem -->
            <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
              <img src="../assets/imgs/produto-placeholder.png" alt="Foto do produto">
            </a>
            <!-- Imagem -->

            <!-- Descrição -->
            <figcaption class="card-body">
              <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <h4>Lorem ipsum dolor sit amet</h4>
              </a>
              <p class="marca">Consectetur</p>
            </figcaption>
            <!-- Descrição -->

            <!-- Botão -->
            <div class="btn-container">
              <a class="btn-destaque" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-12 col-md-6 col-lg-4">
          <figure class="produto card p-2">
            <!-- Imagem -->
            <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
              <img src="../assets/imgs/produto-placeholder.png" alt="Foto do produto">
            </a>
            <!-- Imagem -->

            <!-- Descrição -->
            <figcaption class="card-body">
              <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <h4>Fusce lacinia ex sed odio scelerisque</h4>
              </a>
              <p class="marca">Sed</p>
            </figcaption>
            <!-- Descrição -->

            <!-- Botão -->
            <div class="btn-container">
              <a class="btn-destaque" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-12 col-md-6 col-lg-4">
          <figure class="produto card p-2">
            <!-- Imagem -->
            <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
              <img src="../assets/imgs/produto-placeholder.png" alt="Foto do produto">
            </a>
            <!-- Imagem -->

            <!-- Descrição -->
            <figcaption class="card-body">
              <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <h4>Nulla tristique ac elit rutrum fermentum</h4>
              </a>
              <p class="marca">Nullam</p>
            </figcaption>
            <!-- Descrição -->

            <!-- Botão -->
            <div class="btn-container">
              <a class="btn-destaque" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-12 col-md-6 col-lg-4">
          <figure class="produto card p-2">
            <!-- Imagem -->
            <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
              <img src="../assets/imgs/produto-placeholder.png" alt="Foto do produto">
            </a>
            <!-- Imagem -->

            <!-- Descrição -->
            <figcaption class="card-body">
              <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <h4>Maecenas odio libero accumsan sit amet nisi eget commodo tincidunt enim</h4>
              </a>
              <p class="marca">Praesent</p>
            </figcaption>
            <!-- Descrição -->

            <!-- Botão -->
            <div class="btn-container">
              <a class="btn-destaque" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-12 col-md-6 col-lg-4">
          <figure class="produto card p-2">
            <!-- Imagem -->
            <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
              <img src="../assets/imgs/produto-placeholder.png" alt="Foto do produto">
            </a>
            <!-- Imagem -->

            <!-- Descrição -->
            <figcaption class="card-body">
              <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <h4>Curabitur sed enim et tellus ultricies malesuada a nec ex</h4>
              </a>
              <p class="marca">Sed</p>
            </figcaption>
            <!-- Descrição -->

            <!-- Botão -->
            <div class="btn-container">
              <a class="btn-destaque" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-12 col-md-6 col-lg-4">
          <figure class="produto card p-2">
            <!-- Imagem -->
            <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
              <img src="../assets/imgs/produto-placeholder.png" alt="Foto do produto">
            </a>
            <!-- Imagem -->

            <!-- Descrição -->
            <figcaption class="card-body">
              <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <h4>Proin non lorem magna</h4>
              </a>
              <p class="marca">Fusce</p>
            </figcaption>
            <!-- Descrição -->

            <!-- Botão -->
            <div class="btn-container">
              <a class="btn-destaque" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->
      </ol>
    </section>
    <!-- Produtos em destaque -->

    <!-- Diálogo do Produto -->
    <div id="modal-produto" class="modal fade" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <!-- Conteúdo preenchido com as informações correspondentes ao produto -->
        </div>
      </div>
    </div>
    <!-- Diálogo do Produto -->
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
          <div class="mb-2 flex-center">
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
  <script src="../assets/javascript/dialogo_produto.js"></script>
</body>

</html>