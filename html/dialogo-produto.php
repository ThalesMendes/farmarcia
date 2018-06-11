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

  // Função repetida em 'index.php'
  function limit_description_text($text) {
    $count = 450;

    if (strlen($text) > $count)
      return explode("\n", wordwrap($text, $count))[0] . '...';
    else
      return $text;
  }

  // Função repetida em 'index.php'
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

<div class="modal-header">
  <!-- Categoria e título do produto -->
  <h2 class="modal-title titulo-modal">
    <span class="categoria"><?= $category ?></span>
    <a href="pagina-produto.php?id=<?= $product['id']; ?>"><?= $product['nome']; ?></a>
  </h2>
  <!-- Categoria e título do produto -->

  <!-- Botão fechar -->
  <button type="button" class="close" data-dismiss="modal">
    <span aria-hidden="true">&times;</span>
  </button>
  <!-- Botão fechar -->
</div>

<div class="modal-body">
  <figure class="row produto-container">
    <!-- Imagem do produto -->
    <div class="thumb-container col-lg-5 img-thumbnail">
      <img class="thumb-img img-fluid" src="<?= get_image_path($product['imagem']); ?>">
    </div>
    <!-- Imagem do produto -->

    <!-- Descrição do produto -->
    <figcaption class="col-lg-6 info-produto">
      <div class="texto-produto">
        <h3 class="titulo-produto"><?= $product['nome']; ?></h3>
        <p class="preco">R$ <?= number_format($product['preco'], 2, ',', '.'); ?></p>

        <p><?= limit_description_text($product['descricao']); ?></p>
      </div>

      <a class="produto-button" href="pagina-produto.php?id=<?= $product['id']; ?>">
        <button class="btn btn-danger btn-lg">Página do produto</button>
      </a>
    </figcaption>
    <!-- Descrição do produto -->
  </figure>
</div>
