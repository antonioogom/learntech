<?php

$hostname = "localhost";
$database = "523564";
$username = "523564";
$password = "ucDW5phQcTpu4MO6";	

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn){
	echo "Não foi possível estabelecer uma conexão com o Banco de Dados.";
	exit;
};

?>