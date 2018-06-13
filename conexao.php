<?php

$hostname= "localhost";
$user = "root";
$password = "";
$database = "contato";

$conn = mysqli_connect($hostname, $user, $password, $database);

if(!$conexao){
	echo "Falha na conexao com o banco de dados";
}

?>