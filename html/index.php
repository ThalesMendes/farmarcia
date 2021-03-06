<?php
  require 'functions.php';
  require 'product_model.php';

  class home_model
  {
      private const PROMO_PRODUCTS_COUNT = 3;
      private const HIGHLIGHTED_PRODUCTS_COUNT = 6;

      private $db_connection;

      public function __construct($db_connection)
      {
          $this->db_connection = $db_connection;
      }

      public function get_promo_products()
      {
          return $this->get_products(0, self::PROMO_PRODUCTS_COUNT);
      }

      public function get_highlighted_products()
      {
          return $this->get_products(self::PROMO_PRODUCTS_COUNT, self::HIGHLIGHTED_PRODUCTS_COUNT);
      }

      private function get_products($index, $count)
      {
          $result = $this->db_connection->query(
              'SELECT *
              FROM `croduto`
              ORDER BY `id` DESC
              LIMIT ' . $index . ',' . $count . ';'
          );

          $products = [];

          if ($result !== false) {
              while ($row = $result->fetch_assoc()) {
                  $products[] = $row;
              }
              $result->close();
          }

          return $products;
      }
  }

  require 'db_connection.php';

  $product_model = new product_model($db_connection);

  $home_model = new home_model($db_connection);
  $promo_products = $home_model->get_promo_products();
  $highlighted_products = $home_model->get_highlighted_products();

  define('SLIDESHOW_DESCRIPTION_CHAR_LIMIT', 300);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia - Home</title>
  <?php require 'head.php'; ?>
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="stylesheet" href="../assets/css/dialogo-produto.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main>
    <!-- Slideshow -->
    <section>
      <div id="slideshow" class="carousel slide" data-ride="carousel">
        <div class="container">
          <h2 class="titulo-section">Promoção</h2>
        </div>

        <?php if ($promo_products): ?>
          <ol class="carousel-indicators">
            <?php foreach ($promo_products as $index => $product): ?>

              <li data-target="#slideshow" data-slide-to="<?= $index ?>" class="<?php if ($index == 0) {
    echo 'active';
} ?>"></li>

            <?php endforeach; ?>
          </ol>

          <div class="container">
            <div class="carousel-inner">
              <?php foreach ($promo_products as $index => $product): ?>

                <!-- Slide -->
                <div class="carousel-item slide-item <?php if ($index == 0) {
    echo 'active';
} ?>">
                  <div class="row">
                    <!-- Imagem -->
                    <div class="col-lg-4 img-container">
                      <img class="img-fluid" src="<?= get_image_path($product['imagem']); ?>">
                    </div>
                    <!-- Imagem -->

                    <!-- Descrição -->
                    <div class="col-lg-6 descricao-slideshow">
                      <div>
                        <h3><?= $product['nome']; ?></h3>
                        <p><?= $product_model->get_category_name($product['Categoria_id']); ?></p>
                        <p class="descricao-produto"><?= limit_text($product['descricao'], SLIDESHOW_DESCRIPTION_CHAR_LIMIT); ?></p>
                      </div>

                      <a href="pagina-produto.php?id=<?= $product['id']; ?>">
                        <button class="btn btn-primary btn-lg">Página do produto</button>
                      </a>
                    </div>
                    <!-- Descrição -->
                  </div>
                </div>
                <!-- Slide -->

              <?php endforeach; ?>

              <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
              </a>
            </div>
        <?php else: ?>

          <p class="nenhum-produto">Não há produtos em promoção!</p>

        <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- Slideshow -->

    <!-- Produtos em destaque -->
    <section class="container destaques">
      <h2 class="titulo-section">Destaques</h2>

      <?php if ($highlighted_products): ?>

        <ol class="row">
          <?php foreach ($highlighted_products as $product): ?>
            <?php
              $product_id = $product['id'];
              $product_name = $product['nome'];
              $product_price = $product['preco'];
              $product_image = $product['imagem'];
              $product_category = $product_model->get_category_name($product['Categoria_id']);
            ?>

            <!-- Produto -->
            <li class="col-12 col-md-6 col-lg-4">
              <?php require 'product_template.php'; ?>
            </li>
            <!-- Produto -->

          <?php endforeach; ?>
        </ol>
        <?php else: ?>

          <p class="nenhum-produto">Não há produtos em destaque!</p>

        <?php endif; ?>
    </section>
    <!-- Produtos em destaque -->

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
