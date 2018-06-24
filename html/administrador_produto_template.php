<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/administrador.css">

<table class="table">
  <tbody>
    <tr>
      <td class="checkbox">
        <input type="checkbox" name="checkbox[]" id="<?=$product_id?>">
        <!-- Imagem -->
        <a class="produto-img-container" href="pagina-produto.php?id=<?= $product_id; ?>" dialogo-src="dialogo-produto.php?id=<?= $product_id; ?>" data-toggle="modal" data-target="#modal-produto">
          <img src="<?= get_image_path($product_image);?>" width="30px" heigth="75px" alt="Foto do produto">
        </a>
        <!-- Imagem -->
      </td>
      <td class="nome"><?=$product_name?></td>
      <td class="descricao"><?=$product_descricao?></td>
      <td class="preco">R$ <?= number_format($product_price, 2, ',', '.'); ?></td>
      <td class="editar">
        <a href="cadastro-produto.php?id=<?=$product_id?>">
          <button class="btn btn-danger btn-sm btn-enviar" type="submit">
            <i class="fas fa-edit"></i>
          </button>
        </a>
      </td>
    </tr>
  </tbody>
</table>