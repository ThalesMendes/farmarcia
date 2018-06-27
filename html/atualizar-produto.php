<?php
  require 'db_connection.php';

  $nome = $_POST['nome'];
  $preco = $_POST['preco'];
  $imagem = $_POST['imagem'];
  $descricao = $_POST['descricao'];
  $categoria = $_POST['categoria'];
  $id = $_POST['id'];
  
  $atualizar = "UPDATE Produto
                SET nome = '$nome', preco = '$preco', descricao = '$descricao',
                imagem = '$imagem', Categoria_id = '$categoria' WHERE id = '$id'";

  $resultado = mysqli_query($db_connection, $atualizar);

  header("Location: administrador.php ");
?>
