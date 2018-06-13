<?php
	include_once ('conexao.php');
	

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone']; 
	$mensagem = $_POST['mensagem'];

	
	$result_msg_contato="INSERT INTO mensagens_contato (nome, email, telefone, mensagem) VALUES ('$nome','$email','$telefone','$mensagem')";
	$resultado_msg_contato= mysqli_query($conn, $result_msg_contato)
	
	
 
?>