<?php
   $deletar = $_POST["checkbox"];
   include_once("db_connection.php");

    foreach(  $deletar as $checkbox ){
        $db_connection->query(" DELETE * FROM Produto WHERE id = '$deletar' " );
    }

    header("Location: administrador.php");
?>