<?php
  require 'check_login.php';
  require 'functions.php';
  require 'db_connection.php';
  require 'product_list_model.php';
  require 'product_model.php';

  function get_products_count($db_connection, $category_id) {
    $sql = "SELECT
            COUNT(*) AS 'count'
            FROM `produto`
            WHERE `Categoria_id` = $category_id;";

    $result = $db_connection->query($sql);
    $data = $result->fetch_assoc();

    return $data['count'];
  }

  $sort_sql = "`id` DESC";
  $products = NULL;
  $search_text = NULL;

  $product_list_model = new product_list_model($db_connection);
  if (isset($_GET['pesquisa']) && !empty(trim($_GET['pesquisa']))) {
    $search_text = trim($_GET['pesquisa']);
    $products = $product_list_model->get_products($sort_sql, NULL, $search_text);
  } else
    $products = $product_list_model->get_default_products($sort_sql, NULL);

  $categories = $product_list_model->get_categories();
  $product_model = new product_model($db_connection);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia - Administrador</title>
  <?php require 'head.php'; ?>
  <link rel="stylesheet" href="../assets/css/administrador.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <a class="deslogar" href="logout.php">Sair</a>
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

      <?php if ($_SESSION && $_SESSION['login'] == "admin@admin"): ?>
        <a href="cadastrar_usuario.php">
          <button class="btn btn-danger btn-enviar" type="submit">
            Adicionar novo usuario
            <i class="fas fa-plus-circle"></i>
          </button>
        </a>
      <?php endif; ?>

      <a href="cadastro-produto.php?id=0">
        <button class="btn btn-danger btn-enviar"  type="submit">
          Adicionar Produto
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
      <a href="cadastro-categoria.php?id=0">
        <button class="btn btn-danger btn-enviar" type="submit">
          Adicionar Categoria
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
    </div>

    <!--tabela de produtos-->
    <form method="POST" action="remover_produto.php">
      <?php if (!empty($products)): ?>
        <table class="tabela-produtos table">
          <thead>
            <tr>
              <th scope="col" class="checkbox">
                <input type="checkbox" name="select-all" class="select-all" checkbox-target="checkbox-produto">
                Selec. Todos
              </th>
              <th scope="col" class="nome">Nome</th>
              <th class="categoria">Categoria</th>
              <th scope="col" class="descricao">Descrição</th>
              <th scope="col" class="preco">Preço</th>
              <th scope="col" class="editar">Editar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product): ?>
              <?php
                $product_id = $product['id'];
                $product_name = $product['nome'];
                $product_category = $product_model->get_category_name($product['Categoria_id']);
                $product_price = $product['preco'];
                $product_image = $product['imagem'];
                $product_descricao = $product['descricao']
              ?>
              <!-- Produto -->
              <?php require 'administrador_produto_template.php'; ?>
              <!-- Produto -->
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p class="nenhum-item">Nenhum produto encontrado!</p>
      <?php endif; ?>

      <div class="text-right">
        <button name="remover" class="btn btn-danger btn-enviar" type="submit">
          Remover
          <i class="fas fa-trash-alt"></i>
        </button>
      </div>
    </form>
    <!--tabela de produtos-->

    <h2>Categorias</h2>
    <form action="remover-categoria.php" method="post">
      <?php if (!empty($categories)): ?>
        <!-- Tabela de categorias -->
        <table class="table-categoria table">
          <thead>
            <tr>
              <th>
                <input type="checkbox" class="select-all" checkbox-target="checkbox-categoria">
                Selec. Todos
              </th>
              <th>Id</th>
              <th>Nome</th>
              <th class="categoria-num-produtos">Nº de produtos</th>
              <th>Editar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $category): ?>
              <?php
                $category_id = $category['id'];
                $category_name = $category['nome'];
                $product_count = get_products_count($db_connection, $category_id);

                include 'administrador_categoria_template.php';
              ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- Tabela de categorias -->

        <!-- Remover categorias -->
        <div class="text-right">
          <button type="button" id="remover-categoria-btn" class="btn btn-danger btn-enviar" data-toggle="modal">
            Remover categorias
            <i class="fas fa-trash-alt"></i>
          </button>
        </div>
        <!-- Remover categorias -->

        <!-- Diálogo de remoção de categoria -->
        <div id="remover-categoria-modal" class="modal fade" role="dialog" tabindex="-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Remover categorias</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <p><strong>Todos os produtos contidos nas categorias selecionadas serão deletados.
                Tem certeza de que quer continuar?</strong></p>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn">Remover</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Diálogo de remoção de categoria -->

        <!-- Diálogo nenhuma categoria selecionada -->
        <?php
          $modal_id = 'nenhuma-categoria-modal';
          $modal_title = 'Remover categorias';
          $modal_text = 'Nenhuma categoria selecionada.';
          require 'ok_modal_template.php';
        ?>
        <!-- Diálogo nenhuma categoria selecionada -->
      <?php else: ?>
        <p class="nenhum-item">Nenhuma categoria encontrada!</p>
      <?php endif; ?>
    </form>
  </main>

  <?php require 'footer.php'; ?>

  <!--script do checkbox-->
  <script>
    $('.select-all').click(function(event) {
      var check_value = this.checked;
      $(':checkbox.' + this.getAttribute("checkbox-target")).each(function() {
        this.checked = check_value;
      });
    });

    $('#remover-categoria-btn').click(function() {
      if ($('.checkbox-categoria:checked').length > 0) {
        $(this).attr('data-target', '#remover-categoria-modal');
      } else {
        $(this).attr('data-target', '#nenhuma-categoria-modal');
      }
    });
  </script>
  <!--script do checkbox-->

  <?php if (isset($_SESSION['remocao_categorias'])): ?>
    <?php
      unset($_SESSION['remocao_categorias']);

      $modal_id = 'categoria-removida-modal';
      $modal_title = 'Categorias removidas';
      $modal_text = 'Categorias removidas com sucesso.';
      require 'ok_modal_template.php';
    ?>

    <script>
      $(window).on('load', function() {
        $('#categoria-removida-modal').modal('show');
      });
    </script>
  <?php endif; ?>
</body>

</html>
