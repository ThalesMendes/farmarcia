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
  <?php require 'navbar.php' ?>

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

  <?php require 'footer.php' ?>

</body>

</html>
