<?php
  class homepage {
    private const PROMO_PRODUCTS_COUNT = 3;
    private const HIGHLIGHTED_PRODUCTS_COUNT = 6;

    private $db_connection;

    function __construct($db_connection) {
      $this->db_connection = $db_connection;
    }

    public function get_promo_products() {
      return $this->get_products(0, self::PROMO_PRODUCTS_COUNT);
    }

    public function get_highlighted_products() {
      return $this->get_products(self::PROMO_PRODUCTS_COUNT, self::HIGHLIGHTED_PRODUCTS_COUNT);
    }

    private function get_products($index, $count) {
      $result = $this->db_connection->query(
        "SELECT *
         FROM `Produto`
         ORDER BY `id` ASC
         LIMIT " . $index . "," . $count . ";");

      $products = array();
      while ($row = $result->fetch_assoc()) {
        $products[] = $row;
      }
      $result->close();

      return $products;
    }
  }

  define('DESCRIPTION_CHAR_LIMIT', 300);

  function get_image_path($img_name) {
    $product_image_directory = '../assets/imgs/';

    if ($img_name != NULL)
      return $product_image_directory . $img_name;
    else
      return $product_image_directory . 'produto-placeholder.png';
  }

  function limit_description_text($text) {
    $count = 300;

    if (strlen($text) > $count)
      return explode("\n", wordwrap($text, $count))[0] . '...';
    else
      return $text;
  }
?>

<?php
  $db_connection = new mysqli('localhost', 'root', '', 'farmarcia', 3306);

  if ($db_connection->error) {
    exit;
  }

  $homepage = new homepage($db_connection);
  $promo_products = $homepage->get_promo_products();
  $highlighted_products = $homepage->get_highlighted_products();
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Home</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="stylesheet" href="../assets/css/dialogo-produto.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
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

              <li data-target="#slideshow" data-slide-to="<?= $index ?>" class="<?php if ($index == 0) echo 'active'; ?>"></li>

            <?php endforeach; ?>
          </ol>

          <div class="container">
            <div class="carousel-inner">
              <?php foreach($promo_products as $index => $product): ?>

                <!-- Slide -->
                <div class="carousel-item slide-item <?php if ($index == 0) echo 'active'; ?>">
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
                        <p><?= limit_description_text($product['descricao']); ?></p>
                      </div>

                      <a href="pagina-produto.php">
                        <button class="btn btn-primary btn-lg">Ver mais</button>
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
          <?php foreach($highlighted_products as $product): ?>

            <!-- Produto -->
            <li class="col-12 col-md-6 col-lg-4">
              <figure class="produto card p-2">
                <!-- Imagem -->
                <a href="dialogo-produto.php" data-toggle="modal" data-target="#modal-produto">
                  <img src="<?= get_image_path($product['imagem']); ?>" alt="Foto do produto">
                </a>
                <!-- Imagem -->

                <!-- Descrição -->
                <figcaption class="card-body">
                  <a href="dialogo-produto.php" data-toggle="modal" data-target="#modal-produto">
                    <h4><?= $product['nome']; ?></h4>
                  </a>
                  <p class="marca">R$ <?= number_format($product['preco'], 2, ',', '.'); ?></p>
                </figcaption>
                <!-- Descrição -->

                <!-- Botão -->
                <div class="btn-container">
                  <a class="btn-destaque" href="dialogo-produto.php" data-toggle="modal" data-target="#modal-produto">
                    <button class="btn btn-danger">Ver mais</button>
                  </a>
                </div>
                <!-- Botão -->
              </figure>
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
</body>

</html>
