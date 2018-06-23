<?php
  require 'check_login.php';
  require 'db_connection.php';

  $nome = $_POST['nome'];

  $inserir = "INSERT INTO Categoria (nome) VALUES ('$nome')";
  $resultado = mysqli_query($db_connection, $inserir);
?>
