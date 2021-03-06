<?php
  require 'functions.php';
  require 'product_list_model.php';
  require 'product_model.php';

  class sort_type {
    private $name;
    private $sql_string;

    function __construct($name, $sql_string) {
      $this->name = $name;
      $this->sql_string = $sql_string;
    }

    public function get_name() {
      return $this->name;
    }

    public function get_sql_string() {
      return $this->sql_string;
    }
  }

  // Lista de ordenações
  $newer = new sort_type('Mais novo', "`id` DESC");
  $alphabetic = new sort_type('Ordem alfabética', "`nome` ASC");
  $cheaper = new sort_type('Menor preço', "`preco` ASC");

  $sort_types = array($newer, $alphabetic, $cheaper);

  if (!empty($_GET['sort']) && array_key_exists($_GET['sort'], $sort_types)) {
    $sort_index = $_GET['sort'];
    $sort_sql = $sort_types[$sort_index]->get_sql_string();
  } else {
    $sort_index = 0;
    $sort_sql = $sort_types[$sort_index]->get_sql_string();
  }

  $filtered_categories = array();
  if (!empty($_GET['categorias-filtradas'])) {
    foreach ($_GET['categorias-filtradas'] as $filter) {
      $filtered_categories[] = $filter;
    }
  }

  $search_text = NULL;
  if (!empty($_GET['pesquisa'])) {
    $search_text = trim($_GET['pesquisa']);
  }

  require 'db_connection.php';

  $product_model = new product_model($db_connection);

  $product_list_model = new product_list_model($db_connection);
  $categories = $product_list_model->get_categories();

  $products = $product_list_model->get_products($sort_sql, $filtered_categories, $search_text);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia - Produtos</title>
  <?php require 'head.php'; ?>
  <link rel="stylesheet" href="../assets/css/produtos.css">
  <link rel="stylesheet" href="../assets/css/dialogo-produto.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <h1>Produtos</h1>

    <div class="painel-principal row">
      <!-- Painel de pesquisa -->
      <div class="col-lg-3 col-md-4 mb-4">
        <form>
          <!-- Pesquisa -->
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="search" name="pesquisa" value="<?= $search_text; ?>" placeholder="Procurar produtos">

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

              <select name="sort" id="input-ordem" class="custom-select" required>
                <?php foreach ($sort_types as $index => $sort): ?>

                  <?php
                    if ($index == $sort_index)
                      $sort_selected = 'selected';
                    else
                      $sort_selected = NULL;
                  ?>

                  <option value="<?= $index; ?>" <?= $sort_selected; ?>><?= $sort->get_name(); ?></option>

                <?php endforeach; ?>
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
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $product): ?>

            <?php
              $product_id = $product['id'];
              $product_name = $product['nome'];
              $product_price = $product['preco'];
              $product_image = $product['imagem'];
              $product_category = $product_model->get_category_name($product['Categoria_id']);
            ?>

            <!-- Produto -->
            <li class="col-sm-6 col-lg-4">
              <?php require 'product_template.php'; ?>
            </li>
            <!-- Produto -->

          <?php endforeach; ?>
        <?php else: ?>

          <p class="nenhum-produto">Nenhum produto encontrado!</p>

        <?php endif; ?>
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
  <script src="../assets/javascript/modal_voltar.js"></script>

</body>

</html>
