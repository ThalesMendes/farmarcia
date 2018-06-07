<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Contato</title>

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/contato.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow pr-5 pl-5 mb-4 bg-white rounded">
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

  <main class="container">
    <h1>Contato</h1>

    <form class="form-centro">
      <!-- Nome -->
      <div class="form-group">
        <label class="obrigatorio" for="input-nome">Nome:</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>

          <input id="input-nome" class="form-control" type="text" required>
        </div>
      </div>
      <!-- Nome -->

      <!-- Email -->
      <div class="form-group">
        <label class="obrigatorio" for="input-email">Email:</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-at"></i>
            </div>
          </div>

          <input id="input-email" class="form-control" type="email" required>
        </div>
      </div>
      <!-- Email -->

      <!-- Telefone -->
      <div class="form-group">
        <label for="input-telefone">Telefone:</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-phone"></i>
            </div>
          </div>

          <input id="input-telefone" class="form-control" type="tel">
        </div>
      </div>
      <!-- Telefone -->

      <!-- Assunto -->
      <div class="form-group">
        <label class="obrigatorio" for="input-assunto">Assunto:</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-question-circle"></i>
            </div>
          </div>

          <select id="input-assunto" class="custom-select" required>
            <option selected>Outro</option>
          </select>
        </div>
      </div>
      <!-- Assunto -->

      <!-- Mensagem -->
      <div class="form-group form-mensagem">
        <label class="obrigatorio" for="input-mensagem">Mensagem:</label>

        <div class="input-group">
          <textarea id="input-mensagem" class="form-control" rows="8" required></textarea>
        </div>
      </div>
      <!-- Mensagem -->

      <small>Os campos marcados com um
        <span class="marcador-obrigatorio">*</span> são obrigatórios.</small>

      <!-- Enviar -->
      <button class="btn btn-danger btn-lg btn-enviar" type="submit">
        Enviar
        <i class="fas fa-paper-plane"></i>
      </button>
      <!-- Enviar -->
    </form>
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
</body>

</html>