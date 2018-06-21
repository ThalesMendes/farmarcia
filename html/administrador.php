<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Administrador</title>

  <?php
    require 'functions.php';
    require 'db_connection.php';
    require 'product_list_model.php';

    $sort_sql = "`id` DESC";
    $products = NULL;

    $product_list_model = new product_list_model($db_connection);
    if (!empty($_GET['pesquisa']))
      $products = $product_list_model->get_products($sort_sql, NULL, $_GET['pesquisa']);
    else
      $products = $product_list_model->get_default_products($sort_sql, NULL);

    foreach ($products as $product) {
      echo "<pre>";
      var_dump($product);
      echo "</pre><br>";
    }
  ?>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/administrador.css">
  <link rel="stylesheet" href="../assets/css/comum.css">
</head>

<body>
  <main class="container">
      <h1>Administrador</h1>
      <form class="form-group pt-2">
      <div class="input-group">
        <input class="form-control" type="search" name="pesquisa" placeholder="Procurar produtos">

        <div class="input-group-append">
          <button class="btn btn-danger" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
      </form>
      <div class="text-right">
      <a  href="cadastro-produto.php">
        <button class="btn btn-danger btn-lg btn-enviar"  type="submit">
          Adicionar Produto
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
      <a href="cadastro-categoria.php">
        <button class="btn btn-danger btn-lg btn-enviar" type="submit">
          Adicionar Categoria
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
    </div>

    <!--<i class="fas fa-edit"></i>  botão de editar-->

    <?php if (false): ?>

      <!-- Produtos aqui -->

    <?php else: ?>
      <p class="nenhum-produto">Nenhum produto cadastrado</p>
    <?php endif; ?>

    <div class="text-right">
      <button class="btn btn-danger btn-lg btn-enviar" type="submit">
        Remover
        <i class="fas fa-trash-alt"></i>
      </button>
    </div>

  </main>
</body>

</html>
