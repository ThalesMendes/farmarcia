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
      $_SESSION['erro'] = "Usuário ou senha inválido!";
      header("Location: login.php");
    }
    else{
      //header("Location: "); passar como parametro para o header o nome da pagina
    }
  }
?>
