<?php

  if($_SERVER['REQUEST_METHOD'] === "POST"){
    session_start();
    $user = $_POST['email'];
    $password = $_POST['senha'];
    $hash = md5($password);
    include_once("db_connection.php");

    $result = $db_connection->query("SELECT * FROM Usuario WHERE login='$user' AND senha='$hash'");

    while ($row = $result->fetch_assoc()) {
      if($row['login'] == $user && $row['senha'] == $hash){
          break;
      }
      $row =null;
    }

    // redireciona
    if(empty($row)){
      //$erro = urlencode("Usuário ou senha inválido!");
      header("Location: login.php?erro=Usu%C3%A1rio+ou+senha+inv%C3%A1lido%21");
    }
    else{
      header("Location: administrador.php ");
    }
  }
?>
