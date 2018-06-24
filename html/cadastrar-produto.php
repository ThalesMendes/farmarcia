<?php
  require 'db_connection.php';

  $nome = $_POST['nome'];
  $preco = $_POST['preco'];
  $imagem = $_POST['imagem'];
  $descricao = $_POST['descricao'];
  $categoria = $_POST['categoria'];

  $inserir = "INSERT INTO Produto (nome, preco, descricao, imagem, Categoria_id)
              VALUES ('$nome', '$preco', '$descricao', '$imagem', '$categoria')";

  $resultado = mysqli_query($db_connection, $inserir);
?>
