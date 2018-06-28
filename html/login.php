<?php
  session_start();

  if (isset($_SESSION['login']) && isset($_SESSION['ip'])) {
    if ($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
      header("Location: administrador.php");
      exit;
    } else {
      require 'logout.php';
    }
  }
?>

<!doctype html>
<html lang="pt-br">

<head>
  <title>Farmárcia - Login</title>
  <?php require 'head.php'; ?>
  <?php require 'db_connection.php';?>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <main class="container">
    <form method = "post" action= "valida_login.php" class="form-centro form-signin">

      <h1>Login Administrador</h1>

      <!-- email -->
      <div class="form-group">
        <label for="input-nome">E-mail:</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-at"></i>
            </div>
          </div>
           <input id="input-email"  type="email" name="email" class="form-control" required autofocus>
        </div>
      </div>
      <!-- email -->

      <!-- senha -->
      <div class="form-group">
        <label for="input-password">Senha:</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-key"></i>
            </div>
          </div>
          <input id="input-password" type="password" name=senha class="form-control" required>
        </div>
      </div>
      <!-- senha -->

      <!-- mesangem de erro -->
      <p class="text-center text-danger">
          <?php
            if(isset($_GET['erro'])){
              echo "Usuário ou senha inválido!";
            }
          ?>
      </p>
      <!-- mesangem de erro -->

      <!-- botão logar -->
      <button class="btn btn-danger btn-lg btn-logar" type="submit">
        Logar
      </button>
      <!-- botão logar -->
    </form>
  </main>

  <?php require 'footer.php' ?>

</body>

</html>
