<?php
  require 'functions.php';
  require 'db_connection.php';

  function get_categories($db_connection) {
    $result = $db_connection->query(
      "SELECT *
       FROM `Categoria`
       ORDER BY `nome` ASC");

    $categories = array();
    while ($row = $result->fetch_assoc()) {
      $categories[] = $row;
    }
    $result->close();

    return $categories;
  }

  // Duplicação da função "get_products" em "index.php"
  function get_default_products($db_connection) {
    $default_products_count = 10;

    $result = $db_connection->query(
      "SELECT *
       FROM `Produto`
       ORDER BY `id` ASC
       LIMIT $default_products_count;");

    $products = array();
    while ($row = $result->fetch_assoc()) {
      $products[] = $row;
    }
    $result->close();

    return $products;
  }
?>

<?php
  $categories = get_categories($db_connection);

  $filtered_categories = array();
  if (isset($_GET['categorias-filtradas'])) {
    foreach ($_GET['categorias-filtradas'] as $filter) {
      $filtered_categories[] = $filter;
    }
  }

  $products = get_default_products($db_connection);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Produtos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
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
      <div class="col-lg-3 col-md-4 mb-4">
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
              <?php foreach($categories as $category): ?>
                <?php
                  if (in_array($category['id'], $filtered_categories))
                    $checked = 'checked';
                  else
                    $checked = NULL;
                ?>

                <label>
                  <input type="checkbox" name="categorias-filtradas[]" value="<?= $category['id']; ?>"
                    <?= $checked ?>> <?= $category['nome']; ?>
                </label>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- Categorias -->
          <button class="btn btn-danger btn-md btn-enviar" type="submit">
            Atualizar
            <i class="fas fa-sync"></i>
          </button>
        </form>
      </div>
      <!-- Painel de pesquisa -->

      <!-- Lista de produtos -->
      <ol class="lista-produtos row col-lg-9 col-md-8">
        <?php foreach ($products as $product): ?>
          <?php
            $product_id = $product['id'];
            $product_name = $product['nome'];
            $product_price = $product['preco'];
            $product_image = $product['imagem'];
          ?>

          <!-- Produto -->
          <li class="col-sm-6 col-lg-4">
            <?php require 'product_template.php'; ?>
          </li>
          <!-- Produto -->

        <?php endforeach; ?>
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
  <script src="../assets/javascript/dialogo_produto.js"></script>

</body>

</html>
