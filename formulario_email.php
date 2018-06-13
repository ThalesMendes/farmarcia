<?php
	include_once ('conexao.php');
	
	//Variaveis de POST, Alterar somente se necessário 
	//====================================================
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone']; 
	$mensagem = $_POST['mensagem'];
	//====================================================
	
	$result_msg_contato="INSERT INTO mensagens (nome, email, telefone, mensagem) VALUES ('$nome','$email','$telefone','$mensagem',NOW())";
	$resultado_msg_contato= mysqli_query($conn,$result_msg_contato)
	
	
 
?>