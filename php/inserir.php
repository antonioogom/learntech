<?php

require("conexao.php");

$strNome   = $_GET["nome"];
$strSenha  = $_GET["senha"];
$strEmail  = $_GET["email"];
$strPerfil = $_GET["perfil"];
$strStatus = $_GET["status"];

$strInstrucaoSQL = "insert into usuario (nome, senha, email, perfil, status) values ('{$strNome}', '{$strSenha}', '{$strEmail}', '{$strPerfil}', '{$strStatus}')";

$resultado = mysqli_query($conn, $strInstrucaoSQL);

if ($resultado){
	echo "Dados inseridos com sucesso!";
}else{
	echo "Falha ao inserir dados na base de dados!";
};

mysqli_close($conn);

?>