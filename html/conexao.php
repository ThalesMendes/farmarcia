<?php

$hostname= "localhost";
$user = "root";
$password = "";
$database = "contato";

$conn = mysqli_connect($hostname, $user, $password, $database);

if(!$conn){
echo "<script>alert('ERRO DE CONEXAO');</script>";
}
else{
	echo "<script>alert('MENSAGEM ENVIADA COM SUCESSO');</script>";
}


?>