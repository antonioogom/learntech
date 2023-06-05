<?php

require("conexao.php");

$intID   = $_GET["id"];
$strNome   = $_GET["nome"];
$strSenha  = $_GET["senha"];
$strEmail  = $_GET["email"];
$strPerfil = $_GET["perfil"];
$strStatus = $_GET["status"];

$strInstrucaoSQL = "update usuario set nome = '{$strNome}',  senha = '{$strSenha}', email = '{$strEmail}', perfil = '{$strPerfil}', status = '{$strStatus}' WHERE id = '{$intID}'";

$resultado = mysqli_query($conn, $strInstrucaoSQL);

if ($resultado){
	echo "Dados alterados com sucesso!";
}else{
	echo "Falha ao alterar dados na base de dados!";
};

mysqli_close($conn);

?>