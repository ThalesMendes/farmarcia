
<?php
	include_once('conexao.php');
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone']; 
	$mensagem = $_POST['mensagem'];
	$assunto="Contato pelo site";
	
	$result_msg_contato = "INSERT INTO mensagens_contato(nome, email, telefone, mensagem) VALUES('$nome', '$email', '$telefone', '$mensagem')";
	$resultado_msg_contatomsg_contato= mysqli_query($conn, $result_msg_contato);
	
$to = "camilacorreavieira@gmail.com";
$subject = "$assunto";
$message = "<strong>Nome:</strong> $nome <br /><strong>Email:</strong> $email <br /><strong>Telefone:</strong> $telefone <br /><strong>Mensagem:</strong> $mensagem <br />";
$header = "Content-type: text/html; charset=utf-8\n";
$header .= "From: $email Reply-to: $email\n";

mail($to, $subject, $message, $header);

header("location:contato.php?msg=enviado");
echo "Mensagem enviada com sucesso";
?>

