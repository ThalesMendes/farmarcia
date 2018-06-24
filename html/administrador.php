<?php
  require 'functions.php';
  require 'db_connection.php';
  require 'product_list_model.php';

  $sort_sql = "`id` DESC";
  $products = NULL;
  $search_text = NULL;

  $product_list_model = new product_list_model($db_connection);
  if (isset($_GET['pesquisa']) && !empty(trim($_GET['pesquisa']))) {
    $search_text = trim($_GET['pesquisa']);
    $products = $product_list_model->get_products($sort_sql, NULL, $search_text);
  } else
    $products = $product_list_model->get_default_products($sort_sql, NULL);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Administrador</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/administrador.css">
  <link rel="stylesheet" href="../assets/css/comum.css">
</head>

<body>

  <main class="container">
  <a class="deslogar" href="login.php">Sair</a>
    <h1>Administrador</h1>

    <!--barra de pesquisa-->
    <form class="form-group pt-2">
      <div class="input-group">
        <input class="form-control" type="search" name="pesquisa" value="<?= $search_text; ?>" placeholder="Procurar produtos">
          <div class="input-group-append">
            <button class="btn btn-danger" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
      </div>
    </form>
    <!--barra de pesquisa-->

    <div class="container text-right">
      <a  href="cadastro-produto.php">
        <button class="btn btn-danger btn-enviar"  type="submit">
          Adicionar Produto
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
      <a href="cadastro-categoria.php">
        <button class="btn btn-danger btn-enviar" type="submit">
          Adicionar Categoria
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
    </div>

    <div class="tabela-produtos container col-lg-11 col-md-11">
      <?php if (!empty($products)): ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="checkbox">
                <input type="checkbox" name="select-all" id="select-all">
                Selec. Todos
              </th>
              <th scope="col" class="nome">Nome</th>
              <th scope="col" class="descricao">Descrição</th>
              <th scope="col" class="preco">Preço</th>
              <th scope="col" class="editar">Editar</th>
            </tr>
          </thead>
        </table>
          <?php foreach ($products as $product): ?>
            <?php
              $product_id = $product['id'];
              $product_name = $product['nome'];
              $product_price = $product['preco'];
              $product_image = $product['imagem'];
              $product_descricao = $product['descricao']
            ?>
            <!-- Produto -->
            <div>
              <?php require 'administrador_template.php'; ?>
            </div>
            <!-- Produto -->
          <?php endforeach; ?>
      <?php else: ?>
        <p class="nenhum-produto">Nenhum produto encontrado!</p>
      <?php endif; ?>
    </div>
    <!-- Lista de produtos -->

    <div class="text-right">
      <button class="btn btn-danger btn-enviar" type="submit">
        Remover
        <i class="fas fa-trash-alt"></i>
      </button>
    </div>
  </main>

  <!--script do checkbox-->
  <script
    type="text/javascript"
    src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    
    $('#select-all').click(function(event) {   
      if(this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = true;                        
          });
      } else {
          $(':checkbox').each(function() {
              this.checked = false;                       
          });
      }
  });
  }
  </script>
  <!--script do checkbox-->

</body>

</html>
