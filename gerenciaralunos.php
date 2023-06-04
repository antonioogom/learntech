<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

	<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

	<link href="css/styless.css" rel="stylesheet" />

	<script>
		function alteraNota(RA){
			var novaNota = document.getElementById(RA).value;
			var novaSituacao = document.getElementById("AT" + RA).value;
			var InstrucaoSQL = "UPDATE INTO ALUNO SET NOTA = '" + novaNota + "', SITUACAO = " + novaSituacao + " WHERE RA = " + RA + ";";

			return InstrucaoSQL;
		};
    </script>

	<?php require("php/sessao.php");
	if($codtipouser != 2){
		echo "<script>alert('Você não tem permissão para acessar essa página!'); document.location = \"index.php\";</script>";
	}; ?>

    <title>Area do Professor</title>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">ESCOLA Learn TECH</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fas fa-bars"></i> Font Awesome fontawesome.com -->
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
						<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="gerenciarcursos.php">Gerenciar Cursos</a></li>
						<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#geralunos">Gerenciar Alunos</a></li>
						<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="gerenciaraulas.php">Gerenciar Aulas</a></li>
						<a class="buttonLogin loginCabecalho" href="php/logout.php"><button class="buttonLogin loginCabecalho"><b>SAIR</b></button></a>
                    </b></b></ul><b><b>
                </b></b></div><b><b>
            </b></b></div><b><b>
        </b></b></nav>
	  <br>
	  <br>
	  <header class="areaprof bg-primary text-white text-center">
	  <div class="container align-items-center flex-column">
		<div style="padding:30px;margin-top:40px;background-color:#1abc9c;height:85px;">
			<h1>Área do Professor</h1>
		</div>
		</div>
	  </header>
	  <br>
	  <br>
	  <div class="row justify-content-md-center">
	   	<div class="col-md-15"   align="center">

		<form action="" method="get" id="geralunos">
		
			<table class="table table-striped">
			<tbody>
			<tr>
			<td style="width:10px"><b>RA:</td>
			<?php
				if (isset($_GET["RA"])){
					$ra = $_GET["RA"];
					echo "<td width=\"100\" style=\"text-align:right\"><input type=\"text\" class=\"form-control\" value=\"$ra\" name=\"RA\" id=\"RA\" size=\"10\" maxlength=\"10\"></td>";
				}else{
					echo "<td width=\"100\" style=\"text-align:right\"><input type=\"text\" class=\"form-control\" name=\"RA\" id=\"RA\" size=\"10\" maxlength=\"10\"></td>";
				};
			?>
			<td style="width:115px"><b>Nome Aluno:</td>
			<?php
				if (isset($_GET["NOMEALUNO"])){
					$nomealuno = $_GET["NOMEALUNO"];
					echo "<td width=\"250\" style=\"text-align:right\"><input type=\"text\" class=\"form-control\" value=\"$nomealuno\" name=\"NOMEALUNO\" id=\"NOMEALUNO\" size=\"50\" maxlength=\"50\"></td>";
				}else{
					echo "<td width=\"250\" style=\"text-align:right\"><input type=\"text\" class=\"form-control\" name=\"NOMEALUNO\" id=\"NOMEALUNO\" size=\"50\" maxlength=\"50\"></td>";
				};
			?>
			<td style="width:100px"><b>Turma:</td>
			<td><div class="col-md-15" align="left">
			<div class="selectturma">
					</div>
					<select id="turma" name="turma" class="form-control" placeholder="Selecione">
					<?php
						require("php/conexao.php");
						$InstrucaoSQL = "SELECT CODCURSO, NOMECURSO FROM CURSO ORDER BY NOMECURSO;";
						$resultado = mysqli_query($conn,$InstrucaoSQL);

						echo "<option value=0>SELECIONE A TURMA</option>";
						echo "<option value=TD>VISUALIZAR TODOS</option>";

						while ($linha = mysqli_fetch_assoc($resultado)){
							if ($_GET["turma"] == $linha['CODCURSO']){
								echo "<option selected=\"selected\" value=\"{$linha['CODCURSO']}\">{$linha['NOMECURSO']}</option>";
							}else{
								echo "<option value=\"{$linha['CODCURSO']}\">{$linha['NOMECURSO']}</option>";
							};
						};

						mysqli_close($conn);
					?> 
					</select>
				</div></td>
				<td style="width:150px"><b>Situação do aluno:</td>
				<td><div class="filtroativo">
					</div>
					<select id="ativo" name="ativo" class="form-control" placeholder="Selecione">
					<?php
						require("php/conexao.php");
						$InstrucaoSQL = "SELECT DISTINCT ATIVO FROM ALUNOS ORDER BY ATIVO;";
						$resultado = mysqli_query($conn,$InstrucaoSQL);

						echo "<option value=NA>SELECIONE SITUAÇÃO DO ALUNO</option>";
						echo "<option value=TD>VISUALIZAR TODOS</option>";

						while ($linha = mysqli_fetch_assoc($resultado)){
							if ($_GET["ativo"] == $linha['ATIVO']){
								echo "<option selected=\"selected\" value=\"{$linha['ATIVO']}\">{$linha['ATIVO']}</option>";
							}else{
								echo "<option value=\"{$linha['ATIVO']}\">{$linha['ATIVO']}</option>";
							};
						};

						mysqli_close($conn);
					?> 
					</select>
				</div></td>
			<?php
				echo "<td><button name=\"consultar\" type=\"submit\" class=\"btnbusca\" >Procurar</button></td>";
			?> 
			</tr>
			</tbody>
			</table>
			<?php		
				
			?> 
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col" width="50">RA</th>
			      <th scope="col" width="250">ALUNO</th>
			      <th scope="col" width="300">CURSO</th>
			      <th scope="col" width="50">NOTA</th>
			      <th scope="col" width="150">EMAIL</th>
				  <th scope="col" width="100">SITUACAO</th>
				  <th scope="col" width="100">INSCRIÇÃO</th>
			      <th scope="col" width="170">AÇÕES</th>
			    </tr>
			  </thead>

			  <tbody>
				<?php
					require("php/conexao.php");

					if (isset($_GET["NOMEALUNO"])){
						$NOMEALUNO = $_GET["NOMEALUNO"];
						if ($NOMEALUNO != ""){
							$PARAMETRONOMEALUNO = "AND A.NOME LIKE '%$NOMEALUNO%'";
						}else{
							$PARAMETRONOMEALUNO = "AND 1 = 1";
						};
					}else{
						$PARAMETRONOMEALUNO = "AND 1 = 1";
					};

					if (isset($_GET["RA"])){
						$RA = $_GET["RA"];
						if ($RA != ""){
							$PARAMETRORA = "AND A.RA = $RA";
						}else{
							$PARAMETRORA = "AND 1 = 1";
						};
					}else{
						$PARAMETRORA = "AND 1 = 1";
					};

					if (isset($_GET["ativo"])){
						$ativo = $_GET["ativo"];
						if ($ativo == "0" || $ativo == "1"){
							$PARAMETROATIVO = "AND A.ATIVO = $ativo";
						}else{
							$PARAMETROATIVO = "AND 1 = 1";
						};
					}else{
						$PARAMETROATIVO = "AND 1 = 1";
					};

					if (isset($_GET["turma"])){
						$turma = $_GET["turma"];
						if ($turma == "0"){
							$PARAMETROTURMA = "AND 1 = 1";
						}else if($turma == "TD"){
							$PARAMETROTURMA = "AND 1 = 1";
						}else{
							$PARAMETROTURMA = "AND B.CODCURSO = $turma";
						};

					}else{
						$PARAMETROTURMA = "AND 1 = 1";
					};
					$comandoSQL = "SELECT
									A.RA,
									A.NOME,
									B.NOMECURSO,
									A.NOTA,
									A.ATIVO,
									A.EMAIL,
									A.DTINSCRICAO
								FROM 
									ALUNOS A, CURSO B 
								WHERE 1=1
									AND A.CODCURSO = B.CODCURSO
									$PARAMETROTURMA
									$PARAMETROATIVO
									$PARAMETRORA
									$PARAMETRONOMEALUNO
								ORDER BY A.NOME;";

					$SQLTotalAlunos = "SELECT COUNT(*) as TOTAL FROM ALUNOS A, CURSO B 
					WHERE 1=1
						AND A.CODCURSO = B.CODCURSO
						$PARAMETROTURMA
						$PARAMETROATIVO
						$PARAMETRORA
						$PARAMETRONOMEALUNO;";
					$resultado = mysqli_query($conn,$comandoSQL);
					$totalAlunos = mysqli_query($conn,$SQLTotalAlunos);
					while ($linha = mysqli_fetch_assoc($resultado)){
						$Selecionado = " ";
						if ($linha['ATIVO'] == 0){
							$Selecionado = "selected";
						};
						echo "<tr>
							      <td align=right>{$linha['RA']}</td>
							      <td>{$linha['NOME']}</td>
							      <td>{$linha['NOMECURSO']}</td>
								  <td width=\"80\" style=\"text-align:right\"><input type=\"text\" class=\"form-control\" name=\"NT{$linha['RA']}\" id=\"{$linha['RA']}\" value=\"{$linha['NOTA']}\" size=\"3\" maxlength=\"3\"></td>
								  <td>{$linha['EMAIL']}</td>
								  <td><select id=\"AT{$linha['RA']}\" name=\"AT{$linha['RA']}\" class=\"form-control\" placeholder=\"Selecione\">
								  		<option value=1>ATIVO</option>
										<option $Selecionado value=0>INATIVO</option>
									</td>
								  <td align=center>{$linha['DTINSCRICAO']}</td>
							      <td><button type=\"button\" class=\"btn btn-danger\" href=\"php/excluir.php?id={$linha['RA']}\">excluir</button>
									<button name=\"alterar\" class=\"btn btn-warning\" type=\"submit\" value=\"{$linha['RA']}\">alterar</button></td>
							    </tr>";

					};

					if (isset($_GET["alterar"])){
						$RA = $_GET["alterar"];
						$novaNota = $_GET["NT$RA"];
						$notaSituacao = $_GET["AT$RA"];

						if ($novaNota < 0 || $novaNota > 10){
							echo "$turma = \"<script>alert('Nota inserida é inválida!\\nInsira uma nota entre 0 e 10!'); document.location='gerenciaralunos.php?';</script>";
						}else{
							$sql = "UPDATE ALUNOS SET NOTA='$novaNota', ATIVO='$notaSituacao' WHERE RA = $RA";

							mysqli_query($conn,$sql);

							echo "$turma = \"<script>document.getElementById(\"turma\").value;</script>";
							echo "$ativo = \"<script>document.getElementById(\"ativo\").value;</script>";
							echo "$ra = \"<script>document.getElementById(\"ra\").value;</script>";
							echo "<script>document.location='gerenciaralunos.php?turma=$turma&ativo=$ativo&RA=$ra';</script>";

							mysqli_close($conn);
						};

					};


					mysqli_close($conn);
					while ($linha = mysqli_fetch_assoc($totalAlunos)) {
						echo "<h4 align=left>Total de alunos: {$linha['TOTAL']} </h4>";
					};
				?>       
			  </tbody>
			</table>
		</form>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<!-- Third party plugin JS-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
		<!-- Contato form JS-->
		<script src="assets/mail/jqBootstrapValidation.js"></script>
		<script src="assets/mail/Contato_me.js"></script>
		<!-- Core theme JS-->
		<script src="js/scripts.js"></script>

	    </div>
	  </div>
	</div>
	<style>
			.btnbusca{
				color: #fff;
				background-color: #1a9cbc;
				border-color: #2b889f;
				box-shadow: 0 0 0 0.2rem rgba(60, 198, 171, 0.5);
				border-radius: 0.5rem;
			}

			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #2c3e50;
			}

			.bg-secondary {
			background-color: #2c3e50!important;
			}

			li {
				float: left;
			}

			#mainNav {
			padding-top: 1rem;
			padding-bottom: 1rem;
			font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			font-weight: 700;
			}

			a {
				color: #ffffff;
				justify-content: center;
				text-decoration: none;
				background-color: transparent;
			}

			.buttonLogin.loginCabecalho {
				justify-content: center;
				background-color: #37bec8; /* Azul */
				border: none;
				color: white;
				padding: 8px 16px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 15px;
				margin: 1px 2px;
				cursor: pointer;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
				border-radius: 10px;
			}
			.bg-primary {
				background-color: #1abc9c!important;
			}

			h2 {
				position absolute;
				font-size: 1.5em;
				margin-block-start: 0.83em;
				margin-block-end: 0.83em;
				margin-inline-start: 0px;
				margin-inline-end: 0px;
				font-weight: bold;
				font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			}


		</style>

    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>



