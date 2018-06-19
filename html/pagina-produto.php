<?php
  require 'functions.php';
  require 'db_connection.php';
  require 'product_crud.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - <?= $product_text; ?></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/pagina-produto.css">
  <link rel="stylesheet" href="../assets/css/comum.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <?php if ($product != NULL): ?>
      <figure class="produto-container">
        <div class="row">
          <!-- Imagem do produto -->
          <div class="thumb-container col-lg-5 img-thumbnail">
            <img class="thumb-img img-fluid" src="<?= get_image_path($product['imagem']); ?>">
          </div>
          <!-- Imagem do produto -->

          <!-- Descrição do produto -->
          <figcaption class="col-lg-7">
            <h1 class="titulo-produto"><?= $product['nome']; ?></h3>
            <p style="color: #888; margin: 0;"><?= $category ?></P>
            <p class="preco">R$ <?= number_format($product['preco'], 2, ',', '.'); ?></p>

            <p><?= $product['descricao']; ?></p>
          </figcaption>
          <!-- Descrição do produto -->
        </div>
      </figure>

    <?php else: ?>

      <p class="nenhum-produto"><?= $product_text; ?></p>

    <?php endif; ?>
  </main>

  <?php require 'footer.php' ?>

</body>

</html>
