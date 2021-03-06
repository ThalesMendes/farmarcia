<?php
  require 'check_login.php';
  require 'db_connection.php';
  function get_categories($db_connection)
  {
      $result = $db_connection->query(
          'SELECT *
          FROM `categoria`
          ORDER BY `nome` ASC'
      );

      $categories[] = $row;
      if ($result !== false) {
          while ($row = $result->fetch_assoc()) {
              $categories[] = $row;
          }
      }
      return $categories;
  }

function get_product($db_connection, $id)
{
    $result = $db_connection->query(
        "SELECT *
      FROM `croduto`
      WHERE id = '$id'"
    );

    return $result ? $result->fetch_row() : null;
}
$id = $_GET['id'];
$categories = get_categories($db_connection);
$produto = get_product($db_connection, $id);

?>
<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia</title>
  <?php require 'head.php'; ?>
  <link rel="stylesheet" href="../assets/css/contato.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <h1><?php
    if ($id > 0) {
        echo 'Editar';
    } else {
        echo 'Cadastrar';
    }
    ?> Produto</h1>

    <form class="form-centro" method="post" action="
    <?php
      if ($id > 0) {
          echo 'atualizar-produto.php';
      } else {
          echo 'cadastrar-produto.php';
      }
     ?>">
      <!-- id -->
      <input type="hidden" name="id" value="<?= $id ?>">

      <!-- Nome -->
      <div class="form-group">
        <label class="obrigatorio" for="input-nome">Nome:</label>
          <input id="input-nome" class="form-control" type="text" name="nome"
            value = "<?php
            if ($id > 0) {
                echo $produto[1];
            }
            ?>"
          required>
        </div>
      </div>

      <!-- Preço -->
      <div class="form-group">
        <label class="obrigatorio" for="input-email">Preço:</label>
          <input id="input-email" class="form-control" type="text" name="preco"
          value = "<?php
          if ($id > 0) {
              echo $produto[2];
          }
          ?>"
          required>
        </div>
      </div>


      <!-- Categoria -->
      <div class="form-group">
        <label class="obrigatorio" for="input-assunto">Categoria:</label>

        <div class="input-group">
          <select id="input-assunto" class="custom-select" name="categoria" required>

          <?php foreach ($categories as $category): ?>
            <option <?php
                if ($id > 0) {
                    if ($produto[5] == $category['id']) {
                        echo 'selected';
                    }
                }
                ?>
             name = "categoria" value="<?= $category['id']; ?>">
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
          <textarea id="input-descricao" class="form-control" rows="8" name="descricao">
            <?php
            if ($id > 0) {
                echo $produto[3];
            }
            ?>
          </textarea>
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
  <?php require 'footer.php' ?>

</body>

</html>
