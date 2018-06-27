<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/administrador.css">

<table class="table">
  <tbody>
    <tr>
      <td>
        <input type="checkbox" name="checkbox[]" id="<?=$categoria_id?>">
      </td>
      <td><?=$categoria_name?></td>  
      <td class="editar">
        <a href="cadastro-categoria.php?id=<?=$categoria_id?>">
          <button class="btn btn-danger btn-sm btn-enviar" type="submit">
            <i class="fas fa-edit"></i>
          </button>
        </a>
      </td>
    </tr>
  </tbody>
</table>