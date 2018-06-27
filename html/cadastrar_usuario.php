<?php
require 'check_login.php';
include_once("db_connection.php");
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao_cadastro.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = md5($dados['senha']);

	$result_usuario = "INSERT INTO usuario (login, senha) VALUES ('" .$dados['email']. "','" .$dados['senha']. "')";
	$resultado_usuario = mysqli_query($db_connection, $result_usuario);

	if($resultado_usuario){
		$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
		header("Location: login.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
<meta charset="utf-8" />
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title> Cadastro de Usuário </title>

	</head>
	<body>
		<h2>Cadastro</h2>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<form method="POST" action="">

			<label>E-mail</label>
			<input type="text" name="email" placeholder="Digite o seu e-mail"><br><br>

			<label>Senha</label>
			<input type="password" name="senha" placeholder="Digite a senha"><br><br>

			<input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-danger btn-md"><br><br>

		</form>
	</body>
</html>
