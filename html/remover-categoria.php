<?php
  if (!empty($_POST['categoria'])) {
    require 'db_connection.php';

    $stmt = $db_connection->prepare("DELETE FROM `categoria` WHERE `id` = ?");

    foreach ($_POST['categoria'] as $category_id) {
      $stmt->bind_param('i', $category_id);
      $stmt->execute();
    }
    $stmt->close();

    session_start();
    $_SESSION['remocao_categorias'] = true;
  }
  header("Location: administrador.php");
?>
