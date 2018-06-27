<?php
  require 'product_model.php';

  $product_model = new product_model($db_connection);

  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product = $product_model->get_product($_GET['id']);
    $category = $product_model->get_category_name($product['Categoria_id']);
  } else {
    header("Location: produtos.php");
    exit;
  }

  if (!empty($product))
    $product_text = $product['nome'];
  else
    $product_text = "Produto não encontrado!";
?>
