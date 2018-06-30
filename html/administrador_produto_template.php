<tr>
  <td class="checkbox">
    <input type="checkbox" name="checkbox[]" value="<?=$product_id?>" class="checkbox-produto">
    <!-- Imagem -->
    <a class="produto-img-container" href="pagina-produto.php?id=<?= $product_id; ?>">
      <img src="<?= get_image_path($product_image);?>" width="30px" heigth="75px" alt="Foto do produto">
    </a>
    <!-- Imagem -->
  </td>
  <td class="nome"><?=$product_name?></td>
  <td class="categoria"><?= $product_category ?></td>
  <td class="descricao"><p><?=$product_descricao?></p></td>
  <td class="preco">R$ <?= number_format($product_price, 2, ',', '.'); ?></td>
  <td class="editar">
    <a class="btn btn-danger btn-sm btn-enviar" href="cadastro-produto.php?id=<?=$product_id?>">
        <i class="fas fa-edit"></i>
    </a>
  </td>
</tr>
