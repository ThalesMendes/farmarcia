<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Home</title>

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="stylesheet" href="../assets/css/dialogo-produto.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
</head>

<body>
  <?php require 'navbar.php' ?>

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
                <!-- Imagem -->

                <!-- Descrição -->
                <div class="col-lg-6 descricao-slideshow">
                  <div>
                    <h3>Novalgina Gotas 10ml</h3>
                    <p>In hac habitasse platea dictumst. Etiam in quam eget velit molestie maximus sed sed augue.</p>
                  </div>

                  <a href="pagina-produto.html">
                    <button class="btn btn-primary btn-lg">Ver mais</button>
                  </a>
                </div>
                <!-- Descrição -->
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
                <!-- Imagem -->

                <!-- Descrição -->
                <div class="col-lg-6 descricao-slideshow">
                  <div>
                    <h3>Cataflam 50mg Com 10 Comprimidos</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non finibus dui. Sed facilisis dui
                      a faucibus accumsan.</p>
                  </div>

                  <a href="pagina-produto.html">
                    <button class="btn btn-primary btn-lg">Ver mais</button>
                  </a>
                </div>
                <!-- Descrição -->
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

  <?php require 'navbar.php' ?>

</body>

</html>
