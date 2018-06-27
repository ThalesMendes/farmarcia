<?php
  require 'db_connection.php';
  require 'check_login.php';

  function get_categoria($db_connection, $id){
    $result = $db_connection->query(
      "SELECT *
       FROM `Categoria`
       WHERE id = '$id'");
    $categoria = $result->fetch_row();
    return $categoria;
  }
  $id = 1;
  $categoria = get_categoria($db_connection, $id);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia</title>
  <?php require 'head.php'; ?>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/contato.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/comum.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <h1>Cadastrar Categoria</h1>

    <form class="form-centro" method="post" action="
    <?php
      if($id>0)
        echo "atualizar-categoria.php" ;
      else
        echo "cadastrar-categoria.php";
     ?>">

     <!-- id -->
     <input type="hidden" name="id" value="<?= $id ?>">

      <!-- Nome -->
      <div class="form-group">
        <label class="obrigatorio" for="input-nome">Nome:</label>
          <input id="input-nome" class="form-control" type="text" name="nome"
          value = "<?php
          if($id>0){
            echo $categoria[1];
          }
          ?>"
          required>
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
