<?php

require("conexao.php");

$id   = $_GET["id"];

$comandoSQL = "delete from usuario where id={$id}";

$resultado = mysqli_query($conn,$comandoSQL);
if ($resultado){
	echo "Dados excluidos com sucesso!";	
}else{
	echo "Não foi possível excluir";
};

mysqli_close($conn);

?>