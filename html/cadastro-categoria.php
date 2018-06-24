<?php require 'check_login.php'; ?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/contato.css">
</head>

<body>

  <main class="container">
    <h1>Cadastrar Categoria</h1>

    <form class="form-centro" method="post" action="cadastrar-categoria.php">
      <!-- Nome -->
      <div class="form-group">
        <label class="obrigatorio" for="input-nome">Nome:</label>
          <input id="input-nome" class="form-control" type="text" name="nome" required>
        </div>
      </div>

      <small>Os campos marcados com um
        <span class="marcador-obrigatorio">*</span> são obrigatórios.</small>

      <!-- Enviar -->
      <button class="btn btn-danger btn-lg btn-enviar" type="submit">
        Cadastrar
      </button>
    </form>
  </main>


</body>

</html>
