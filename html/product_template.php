<!-- Produto -->
<figure class="produto card p-2">
  <!-- Imagem -->
  <a class="produto-img-container" href="pagina-produto.php?id=<?= $product_id; ?>" dialogo-src="dialogo-produto.php?id=<?= $product_id; ?>" data-toggle="modal" data-target="#modal-produto">
    <img src="<?= get_image_path($product_image); ?>" alt="Foto do produto">
  </a>
  <!-- Imagem -->

  <!-- Descrição -->
  <figcaption class="card-body">
    <a href="pagina-produto.php?id=<?= $product_id; ?>" dialogo-src="dialogo-produto.php?id=<?= $product_id; ?>" data-toggle="modal" data-target="#modal-produto">
      <h4><?= $product_name; ?></h4>
    </a>
    <p class="categoria-item"><?= $product_category; ?></p>
    <p class="preco">R$ <?= number_format($product_price, 2, ',', '.'); ?></p>
  </figcaption>
  <!-- Descrição -->

  <!-- Botão -->
  <div class="btn-container">
    <a class="btn-destaque" href="pagina-produto.php?id=<?= $product_id; ?>" dialogo-src="dialogo-produto.php?id=<?= $product_id; ?>" data-toggle="modal" data-target="#modal-produto">
      <button class="btn btn-danger">Ver mais</button>
    </a>
  </div>
  <!-- Botão -->
</figure>
<!-- Produto -->
