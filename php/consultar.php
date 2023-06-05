<?php

	require("conexao.php");

	$strInstrucaoSQL = "select * from usuario";

	$resultado = mysqli_query($conn, $strInstrucaoSQL);

	while ($linha = mysqli_fetch_assoc($resultado)){
		echo $linha["id"].'-'.$linha["nome"].'-'.$linha["email"].'-'.$linha["senha"].'-'.$linha["status"].'-'.$linha["perfil"].'<br>';
	};

	mysqli_close($conn);

?>