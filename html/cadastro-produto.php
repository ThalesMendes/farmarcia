<?php
require 'db_connection.php';
function get_categories($db_connection) {
      $result = $db_connection->query(
        "SELECT *
         FROM `Categoria`
         ORDER BY `nome` ASC");
      while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
      }
      $result->close();
      return $categories;
    }
$categories = get_categories($db_connection);
?>
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
    <h1>Cadastrar Produto</h1>

    <form class="form-centro" method="post" action="cadastrar-produto.php">

      <!-- Nome -->
      <div class="form-group">
        <label class="obrigatorio" for="input-nome">Nome:</label>
          <input id="input-nome" class="form-control" type="text" name="nome" required>
        </div>
      </div>

      <!-- Preço -->
      <div class="form-group">
        <label class="obrigatorio" for="input-email">Preço:</label>
          <input id="input-email" class="form-control" type="text" name="preco" required>
        </div>
      </div>


      <!-- Categoria -->
      <div class="form-group">
        <label class="obrigatorio" for="input-assunto">Categoria:</label>

        <div class="input-group">
          <select id="input-assunto" class="custom-select" name="categoria" required>

          <?php foreach ($categories as $category): ?>
            <option name = "categoria" value="<?= $category['id']; ?>">
              <?= $category['nome']; ?>
          <?php endforeach; ?>
        </select>
        </div>
      </div>


      <!-- Imagem -->
      <div class="form-group">
        <label for="upload-file">Escolher Imagem:</label>
          <input id="upload-file" class="form-control" type="file" name="imagem">
        </div>
      </div>

      <!-- Descrição -->

      <div class="form-group">
        <label for="input-descricao">Descrição:</label>
        <div class="input-group">
          <textarea id="input-descricao" class="form-control" rows="8" name="descricao"></textarea>
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
