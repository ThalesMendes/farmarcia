<?php
  if(isset($_POST['checkbox'])){

    $checkbox = $_POST['checkbox'];

    include("db_connection.php");

    for( $i = 0; $i<sizeof($checkbox);$i++){
      echo $db_connection->query("DELETE FROM `produto` WHERE `id` = '" . $checkbox[$i] . "'");
    }
  }
  header("Location: administrador.php");
?>