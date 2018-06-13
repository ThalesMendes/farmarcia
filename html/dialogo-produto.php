<?php
  require 'functions.php';
  require 'db_connection.php';
  require 'product_crud.php';

  define('DESCRIPTION_CHAR_LIMIT', 450);
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

        <p><?= limit_text($product['descricao'], DESCRIPTION_CHAR_LIMIT); ?></p>
      </div>

      <a class="produto-button" href="pagina-produto.php?id=<?= $product['id']; ?>">
        <button class="btn btn-danger btn-lg">Página do produto</button>
      </a>
    </figcaption>
    <!-- Descrição do produto -->
  </figure>
</div>
