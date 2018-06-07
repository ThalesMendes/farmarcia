<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Produtos</title>

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/produtos.css">
  <link rel="stylesheet" href="../assets/css/dialogo-produto.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <h1>Produtos</h1>

    <div class="row">
      <!-- Painel de pesquisa -->
      <div class="col-lg-3 col-md-4">
        <form>
          <!-- Pesquisa -->
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Procurar produtos">
              <div class="input-group-append">
                <button class="btn btn-danger" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Pesquisa -->

          <!-- Ordenação -->
          <div class="form-group">
            <label class="nome-campo" for="input-ordem">Ordenar por</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-sort-amount-down"></i>
                </div>
              </div>

              <select id="input-ordem" class="custom-select" required>
                <option selected>Mais novo</option>
                <option>Ordem alfabética</option>
                <option>Menor preço</option>
              </select>
            </div>
          </div>
          <!-- Ordenação -->

          <!-- Categorias -->
          <div class="form-group">
            <label class="nome-campo" for="input-categoria">Categorias</label>

            <div class="input-group categorias">
              <label>
                <input type="checkbox"> Analgésico
              </label>
              <label>
                <input type="checkbox"> Oftálmico
              </label>
              <label>
                <input type="checkbox"> Anti-inflamatório
              </label>
            </div>
          </div>
          <!-- Categorias -->
        </form>
      </div>
      <!-- Painel de pesquisa -->

      <!-- Lista de produtos -->
      <ol class="lista-produtos row col-lg-9 col-md-8">
        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->

        <!-- Produto -->
        <li class="col-sm-6 col-lg-4">
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
              <a class="btn-ver-mais" href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                <button class="btn btn-danger">Ver mais</button>
              </a>
            </div>
            <!-- Botão -->
          </figure>
        </li>
        <!-- Produto -->
      </ol>
      <!-- Lista de produtos -->
    </div>

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

  <?php require 'footer.php' ?>

</body>

</html>
