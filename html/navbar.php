<nav class="navbar navbar-expand-lg navbar-light bg-light shadow pr-5 pl-5 mb-4 bg-white rounded">
  <a class="navbar-brand" href="../html/index.php">
    <img src="../assets/imgs/logo.png" alt="Logo" style="width: 150px;">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse pt-2" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a href="../html/index.php" class="nav-link">Início</a>
      </li>
      <li class="nav-item">
        <a href="../html/quemsomos.php" class="nav-link">Quem somos</a>
      </li>
      <li class="nav-item">
        <a href="../html/produtos.php" class="nav-link">Produtos</a>
      </li>
      <li class="nav-item">
        <a href="../html/localizacao.php" class="nav-link">Localização</a>
      </li>
      <li class="nav-item">
        <a href="../html/contato.php" class="nav-link">Contato</a>
      </li>
    </ul>

    <form class="form-group pt-2" action="produtos.php">
      <div class="input-group">
        <input class="form-control" type="search" name="pesquisa" placeholder="Procurar produtos">

        <div class="input-group-append">
          <button class="btn btn-danger" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>
