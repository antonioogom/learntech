<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

    <link href="css/styless.css" rel="stylesheet" />

	<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

	<?php require("php/sessao.php"); 
	if($codtipouser != 3){
			echo "<script>alert('Você não tem permissão para acessar essa página!'); document.location = \"index.php\";</script>";
		};
	?>

    <title>Gerenciar Parâmetros</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
				<div class="container">
					<a class="navbar-brand js-scroll-trigger" href="index.php">ESCOLA Learn Tech</a>
					<button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						Menu
						<svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fas fa-bars"></i> Font Awesome fontawesome.com -->
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="caduser.php">Cadastro de Usuários</a></li>
							<a class="buttonLogin loginCabecalho" href="php/logout.php"><button class="buttonLogin loginCabecalho"><b>SAIR</b></button></a>
						</b></b></ul><b><b>
					</b></b></div><b><b>
				</b></b></div><b><b>
			</b></b>
		</nav>

	<div class="namepage">
		<div style="padding:30px;margin-top:40px;background-color:#1abc9c;height:85px;">
			<h1>Gerenciar Parâmetros do Site</h1>
		</div>
	</div>
	<form action="" method="POST" id="gerhome">
		<h4>Gerenciar Home Page</h4>
		<table class="table table-striped">
			<tr>
				<th scope="col" width="50">ID</th>
				<th scope="col" width="80">PARÂMETRO</th>
				<th scope="col" width="100">DETALHES</th>
				<th scope="col" width="150">VALOR</th>
				<th scope="col" width="100">ATIVO</th>
				<th scope="col" width="120">AÇÕES</th>
			</tr>
		
			<tbody>
				<?php
					require("php/conexao.php");

					$comandoSQL = "SELECT * FROM PARAMETROS;";

					$resultado = mysqli_query($conn,$comandoSQL);

					if (isset($_POST['salvaparametro'])){
						$id = $_POST['salvaparametro'];
						$valorparametro = $_POST["ID$id"];
						$situação = $_POST["AT$id"];

						$updateSQL = "UPDATE PARAMETROS SET VALOR = '$valorparametro', ATIVO = '$situação' WHERE ID = $id;";

						mysqli_query($conn,$updateSQL);

						echo "$<script>alert('Parâmetro $id editado com sucesso!');</script>";

						echo "<script>document.location='parametrosite.php?';</script>";

						//echo "<script>document.location='parametrosite.php?';</script>";
						
					};

					if (isset($_POST['valorpadrao'])){
						$id = $_POST['valorpadrao'];

						$updateSQL = "UPDATE PARAMETROS SET VALOR = (SELECT VALORPADRAO FROM PARAMETROS WHERE ID = $id) WHERE ID = $id;";
						$updateSQLAtivo = "UPDATE PARAMETROS SET ATIVO = (SELECT ATIVOPADRAO FROM PARAMETROS WHERE ID = $id) WHERE ID = $id;";

						mysqli_query($conn,$updateSQL);

						mysqli_query($conn,$updateSQLAtivo);

						echo "$<script>alert('Parâmetro $id voltou ao valor padrão com sucesso!');</script>";

						echo "<script>document.location='parametrosite.php?';</script>";

					};

						while ($linha = mysqli_fetch_assoc($resultado)){

							if ($linha['ativo'] == 0){
								$Selecionado = "selected";
							}else{
								$Selecionado = " ";
							};

							if ($linha['editavel'] == 0){
								$editarcampo = "readonly";
							}else{
								$editarcampo = "";
							};

							echo "
							<tr>
								<td align=center>{$linha['id']}</td>
								<td>{$linha['nomeparametro']}</td>
								<td>{$linha['obs']}</td>
								<td><input type=\"text\" class=\"form-control\" name=\"ID{$linha['id']}\" id=\"ID{$linha['id']}\" value=\"{$linha['valor']}\" $editarcampo maxlength=\"1000\"></td>
								<td><select id=\"AT{$linha['ativo']}\" name=\"AT{$linha['id']}\" class=\"form-control\" placeholder=\"Selecione\">
								<option value=1>ATIVO</option>
								<option $Selecionado value=0>INATIVO</option>
								</td>
								<td><button name=\"salvaparametro\" class=\"btn btn-salvar\" type=\"submit\" value=\"{$linha['id']}\">Salvar</button>
									<button name=\"valorpadrao\" class=\"btn btn-danger\" type=\"submit\" value=\"{$linha['id']}\">Valor Padrão</button></td>
							</tr>";
						};

				?>
			</tbody>
		</table>

	</form>

	<?php
		require("php/parametros.php");
		$COR_SITE_HEXADECIMAL = COR_SITE_HEXADECIMAL();
		$COR_CABECALHO_HEXADECIMAL = COR_CABECALHO_HEXADECIMAL();

		echo "
		<style>
		.bg-primary {
		background-color: #$COR_SITE_HEXADECIMAL !important;
		}

		.bg-secondary {
			background-color: #$COR_CABECALHO_HEXADECIMAL !important;
		}

		.copyright {
			background-color: $COR_SITE_HEXADECIMAL;
		}
		</style>
		";
	?>
	<!-- Bootstrap core JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Third party plugin JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
	<!-- Contato form JS-->
	<script src="assets/mail/jqBootstrapValidation.js"></script>
	<script src="assets/mail/Contato_me.js"></script>
	<!-- Core theme JS-->
	<script src="js/scripts.js"></script>

    <style>

		.btn-salvar{
			background-color: #4ef50c;
		}

		#mainNav {
		padding-top: 1rem;
		padding-bottom: 1rem;
		font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
		font-weight: 700;
		}

		.namepage {
			margin-top:80px;
			height:100px;
			width:1550px;

			color: white;
			text-align: center;
		};
		
	</style>

    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>	