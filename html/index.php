<?php
  $db_connection = new mysqli('localhost', 'root', '', 'farmarcia', 3306);

  if ($db_connection->error) {
    exit;
  }

  define('PROMO_PRODUCTS_COUNT', 3);
  define('HIGHLIGHTED_PRODUCTS_COUNT', 6);

  define('PRODUCT_IMAGE_PATH', '../assets/imgs/');
  define('DESCRIPTION_CHAR_LIMIT', 300);

  function get_homepage_products() {
    global $db_connection;

    $result = $db_connection->query(
      "SELECT *
       FROM `Produto`
       ORDER BY `id` ASC
       LIMIT " . (PROMO_PRODUCTS_COUNT + HIGHLIGHTED_PRODUCTS_COUNT));

    $products = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
      $products[$i] = $row;
      $i++;
    }

    return $products;
  }
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
    <?php $homepage_products = get_homepage_products(); ?>

    <!-- Slideshow -->
    <section>
      <div id="slideshow" class="carousel slide" data-ride="carousel">
        <div class="container">
          <h2 class="titulo-section">Promoção</h2>
        </div>

        <?php
          if (count($homepage_products) > 0) { ?>

            <ol class="carousel-indicators">
              <?php
                for ($i = 0; $i < PROMO_PRODUCTS_COUNT; $i++) { ?>

                  <li data-target="#slideshow" data-slide-to="<?php echo $i ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>

                <?php }
              ?>
            </ol>

            <div class="container">
              <div class="carousel-inner">
                <?php for ($i = 0; $i < PROMO_PRODUCTS_COUNT; $i++) { ?>

                  <!-- Slide -->
                  <div class="carousel-item slide-item <?php if ($i == 0) echo 'active'; ?>">
                    <div class="row">
                      <!-- Imagem -->
                      <div class="col-lg-4 img-container">
                        <?php
                          $img = PRODUCT_IMAGE_PATH;
                          if ($homepage_products[$i]['imagem'] != NULL)
                            $img .= $homepage_products[$i]['imagem'];
                          else
                            $img .= 'produto-placeholder.png';
                        ?>

                        <img class="img-fluid" src="<?php echo $img; ?>">
                      </div>
                      <!-- Imagem -->

                      <!-- Descrição -->
                      <div class="col-lg-6 descricao-slideshow">
                        <div>
                          <h3><?php echo $homepage_products[$i]['nome']; ?></h3>
                          <p>
                            <?php
                              $description = $homepage_products[$i]['descricao'];

                              if (strlen($description) > DESCRIPTION_CHAR_LIMIT) {
                                echo explode("\n", wordwrap($description, DESCRIPTION_CHAR_LIMIT))[0] . '...';
                              } else {
                                echo $description;
                              }
                            ?>
                          </p>
                        </div>

                        <a href="pagina-produto.php">
                          <button class="btn btn-primary btn-lg">Ver mais</button>
                        </a>
                      </div>
                      <!-- Descrição -->
                    </div>
                  </div>
                  <!-- Slide -->
                <?php } ?>

                <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Próximo</span>
                </a>
            </div>

          <?php } else { ?>
            <p class="nenhum-produto">Não há produtos em promoção!</p>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- Slideshow -->

    <!-- Produtos em destaque -->
    <section class="container destaques">
      <h2 class="titulo-section">Destaques</h2>

      <?php if (count($homepage_products) > PROMO_PRODUCTS_COUNT) { ?>

        <ol class="row">
          <?php for ($i = PROMO_PRODUCTS_COUNT; $i < count($homepage_products); $i++) { ?>
            <!-- Produto -->
            <li class="col-12 col-md-6 col-lg-4">
              <figure class="produto card p-2">
                <!-- Imagem -->
                <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                  <?php
                    $img = PRODUCT_IMAGE_PATH;
                    if ($homepage_products[$i]['imagem'] != NULL)
                      $img .= $homepage_products[$i]['imagem'];
                    else
                      $img .= 'produto-placeholder.png';
                  ?>
                  <img src="<?php echo $img ?>" alt="Foto do produto">
                </a>
                <!-- Imagem -->

                <!-- Descrição -->
                <figcaption class="card-body">
                  <a href="dialogo-produto.html" data-toggle="modal" data-target="#modal-produto">
                    <h4><?php echo $homepage_products[$i]['nome']; ?></h4>
                  </a>
                  <p class="marca">R$ <?php echo number_format($homepage_products[$i]['preco'], 2, ',','.'); ?></p>
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
          <?php } ?>
        </ol>
      <?php } else { ?>
        <p class="nenhum-produto">Não há produtos em destaque!</p>
      <?php } ?>
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
