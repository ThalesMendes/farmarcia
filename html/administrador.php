<?php
  require 'functions.php';
  require 'product_list_model.php';

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
    $search_text = trim($_GET['pesquisa']);
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
    <h1> Administrador</h1>
    <form class="form-group pt-2" action="produtos.php">
      <div class="input-group">
        <input class="form-control" type="search" name="pesquisa" placeholder="Procurar produtos">

          <div class="input-group-append">
            <button class="btn btn-danger" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
      </div>
    </form>
    <div class="container text-right">
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
    <div class="lista-produtos container col-lg-11 col-md-11">
      <?php if (!empty($products)): ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                Selec. Todos
              </th>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Editar</th>
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
              <div class="">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                </div>
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
      <button class="btn btn-danger btn-lg btn-enviar" type="submit">
        Remover
        <i class="fas fa-trash-alt"></i>
      </button>
    </div>

  </main>
</body>

</html>
