<?php
  require 'functions.php';

  class product_list_model {
    private const DEFAULT_PRODUCTS_COUNT = 10;
    private const MIN_SIMILARITY = 65;

    private $db_connection;

    function __construct($db_connection) {
      $this->db_connection = $db_connection;
    }

    public function get_categories() {
      $result = $this->db_connection->query(
        "SELECT *
         FROM `Categoria`
         ORDER BY `nome` ASC");

      while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
      }
      $result->close();

      return $categories;
    }

    public function get_products($sort_sql, $filtered_categories, $search_string) {
      if (empty($search_string) && empty($filtered_categories)) {
        return self::get_default_products($sort_sql);
      }

      $sql = "SELECT * FROM `Produto` ";

      if (empty($filtered_categories)) {
        $sql .= "ORDER BY $sort_sql;";
        $result = $this->db_connection->query($sql);
      } else {
        $result = self::query_filtered_products($sql, $sort_sql, $filtered_categories);
      }

      $categories = self::get_categories();

      $products = array();
      if (!empty($search_string)) {
        $exploded_search = explode(' ', $search_string);

        while ($row = $result->fetch_assoc()) {
          if (self::is_search_match($row['nome'], $exploded_search)) {
            $products[] = $row;
          } else {
            if (self::is_category_search_match($row['Categoria_id'], $categories, $exploded_search))
              $products[] = $row;
          }
        }
      } else {
        while ($row = $result->fetch_assoc()) {
          $products[] = $row;
        }
      }

      $result->close();

      return $products;
    }

    private function get_default_products($sort_sql) {
      $result = $this->db_connection->query(
        "SELECT *
        FROM `Produto`
        ORDER BY $sort_sql
        LIMIT " . self::DEFAULT_PRODUCTS_COUNT . ";");

      while ($row = $result->fetch_assoc()) {
        $products[] = $row;
      }
      $result->close();

      return $products;
    }

    private function query_filtered_products($base_sql, $sort_sql, $filtered_categories) {
        $sql = $base_sql . "WHERE `Categoria_id` = ?";
        $sql .= str_repeat(" OR `Categoria_id` = ?", count($filtered_categories) - 1);
        $sql .= " ORDER BY $sort_sql;";

        $types = str_repeat('i', count($filtered_categories));

        $stmt = $this->db_connection->prepare($sql);

        $params = array($types);
        foreach ($filtered_categories as &$category) {
          $params[] = &$category;
        }
        call_user_func_array(array($stmt, 'bind_param'), $params);

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    private function is_search_match($name, $search_tokens) {
      $name_tokens = explode(' ', $name);

      foreach ($search_tokens as $search_token) {
        if (stripos($name, $search_token) !== false) {
          return true;
        } else {
          foreach ($name_tokens as $name_token) {
            similar_text($name_token, $search_token, $similarity);
            if ($similarity >= self::MIN_SIMILARITY)
              return true;
          }
        }
      }
      return false;
    }

    private function is_category_search_match($product_category_id, $categories, $search_tokens) {
      foreach ($categories as $category) {
        if ($category['id'] == $product_category_id) {
          if (self::is_search_match($category['nome'], $search_tokens))
            return true;
          return false;
        }        
      } 
      return false;
    }
  }

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
  $newer = new sort_type('Mais novo', "`id` ASC");
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
    $search_text = $_GET['pesquisa'];
  }  

  require 'db_connection.php';
  
  $product_list_model = new product_list_model($db_connection);
  $categories = $product_list_model->get_categories();
  
  $products = $product_list_model->get_products($sort_sql, $filtered_categories, $search_text);
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

</body>

</html>
