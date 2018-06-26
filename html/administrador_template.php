<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

<table class="table">
  <tbody>
    <tr>
      <th scope="row"> </th>
      <td>
        <!-- Imagem -->
        <a class="produto-img-container" href="pagina-produto.php?id=<?= $product_id; ?>" dialogo-src="dialogo-produto.php?id=<?= $product_id; ?>" data-toggle="modal" data-target="#modal-produto">
          <img src="<?= get_image_path($product_image);?>" width="50px" heigth="100px" alt="Foto do produto">
        </a>
        <!-- Imagem -->
      </td>
      <td><?=$product_name?></td>
      <td><?=$product_descricao?></td>
      <td><?=$product_price?></td>
      <td>
        <a href="cadastro-categoria.php">
          <button class="btn btn-danger btn-lg btn-enviar" type="submit">
            <i class="fas fa-edit"></i>
          </button>
        </a>
      </td>
    </tr>
  </tbody>
</table>