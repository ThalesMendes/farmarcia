<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      session_start();
      $user = $_POST['email'];
      $password = $_POST['senha'];

      $hash = md5($password);
      include_once 'db_connection.php';

      $result = $db_connection->query("SELECT * FROM usuario WHERE login='$user' AND senha='$hash'");

      if ($result !== false) {
          while ($row = $result->fetch_assoc()) {
              if ($row['login'] == $user && $row['senha'] == $hash) {
                  break;
              }
              $row = null;
          }
      }

      // redireciona
      if (empty($row)) {
          header('Location: login.php?erro=1');
      } else {
          $_SESSION['login'] = $user;
          $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

          header('Location: administrador.php ');
      }
  }
