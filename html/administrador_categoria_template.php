<tr>
  <td><input class="checkbox-categoria" type="checkbox" name="categoria[]" value="<?= $category_id; ?>"></td>
  <td><?= $category_id; ?></td>
  <td><?= $category_name; ?></td>
  <td class="categoria-num-produtos"><?= $product_count; ?></td>
  <td>
    <a class="btn btn-danger btn-sm btn-enviar" href="cadastro-categoria.php?id=<?= $category_id; ?>">
      <i class="fas fa-edit"></i>
    </a>
  </td>
</tr>
