<?php
  require 'db_connection.php';
  require 'check_login.php';

  $nome = $_POST['nome'];
  $id = $_POST['id'];

  $atualizar = "UPDATE Categoria
                SET nome = '$nome' WHERE id = '$id'";

  $resultado = mysqli_query($db_connection, $atualizar);
?>
