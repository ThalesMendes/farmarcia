<?php
  function get_product($db_connection, $id) {
      $id = $_GET['id'];

      $stmt = $db_connection->prepare(
        "SELECT *
         FROM `Produto`
         WHERE `id` = ?");

      $stmt->bind_param('i', $id);
      $stmt->execute();

      $result = $stmt->get_result();
      $product =  $result->fetch_assoc();
      $result->close();

      return $product;
  }

  function get_category_name($db_connection, $category_id) {
    $stmt = $db_connection->prepare(
      "SELECT `nome`
       FROM `Categoria`
       WHERE `id` = ?");

    $stmt->bind_param('i', $category_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $category = $result->fetch_assoc();
    $result->close();

    return $category['nome'];
  }

  // Função repetida em 'index.php', linha 39
  function get_image_path($img_name) {
    $product_image_directory = '../assets/imgs/produtos/';

    if ($img_name != NULL)
      return $product_image_directory . $img_name;
    else
      return $product_image_directory . 'produto-placeholder.png';
  }
?>

<?php
  $db_connection = new mysqli('localhost', 'root', '', 'farmarcia', 3306);
  $db_connection->set_charset('utf8');

  if ($db_connection->error) {
    exit;
  }

  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product = get_product($db_connection, $_GET['id']);
    $category = get_category_name($db_connection, $product['Categoria_id']);
  } else {
    header("Location: produtos.php");
    exit;
  }
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Nome do Produto</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/pagina-produto.css">
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

      <p class="nenhum-produto">Produto não encontrado!</p>

    <?php endif; ?>
  </main>

  <?php require 'footer.php' ?>

</body>

</html>
