<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Login</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
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
            include_once "valida_login.php";

            echo isset($_SESSION['erro']);

            if(isset($_SESSION['erro'])){
              echo $_SESSION['erro'];
              unset ($_SESSION['erro']);
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
