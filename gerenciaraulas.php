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
	<?php 
		require("php/sessao.php");
        require("php/conexao.php");
		if($codtipouser != 2){
			echo "<script>alert('Você não tem permissão para acessar essa página!'); document.location = \"index.php\";</script>";
		};
	?>

    <script>
    	function editar(id,nome,email,perfil,status){
    		document.POSTElementByid("id").value = id;
    		document.POSTElementByid("nome").value = nome;
    		document.POSTElementByid("email").value = email;
    		document.POSTElementByid("perfil").value = perfil;
    		document.POSTElementByid("status").value = status;
    	}
    </script>

    <title>Gerenciamento do Professor</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
				<div class="container">
					<a class="navbar-brand js-scroll-trigger" href="index.php">ESCOLA Learn TECH</a>
					<button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-tarPOST="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						Menu
						<svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fas fa-bars"></i> Font Awesome fontawesome.com -->
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="gerenciarcursos.php">Gerenciar Cursos</a></li>
							<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="gerenciaralunos.php">Gerenciar Alunos</a></li>
							<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#geraulas">Gerenciar Aulas</a></li>
							<a class="buttonLogin loginCabecalho" href="php/logout.php"><button class="buttonLogin loginCabecalho"><b>SAIR</b></button></a>
						</b></b></ul><b><b>
					</b></b></div><b><b>
				</b></b></div><b><b>
			</b></b>
		</nav>

	<div class="namepage">
		<div style="padding:30px;margin-top:40px;background-color:#1abc9c;height:85px;">
			<h1>Área do Professor</h1>
		</div>
	</div>

	<form action="" method="POST" id="geraulas">
		<h4>Gerenciar Aulas</h4>
		<table class="table table-striped">
		<tr>
            <th scope="col" width="40">CODAULA</th>
			<th scope="col" width="500">NOME CURSO</th>
            <th scope="col" width="500">NOME AULA</th>
            <th scope="col" width="300">LINK</th>
			<th scope="col" width="150">SITUAÇÃO</th>
			<th scope="col" width="200">AÇÕES</th>
		</tr>
		<tbody>
			<?php
				if (isset($_POST['bcodaula'])){
					$bcodaula = $_POST['bcodaula'];
					echo "<td><input type=\"text\" class=\"form-control\" name=\"bcodaula\" value=\"$bcodaula\" id=\"bcodaula\" maxlength=\"10\"></td>";
				}else{
					echo "<td><input type=\"text\" class=\"form-control\" name=\"bcodaula\" id=\"bcodaula\" maxlength=\"10\"></td>";
				};

                $InstrucaoSQL = "SELECT CODCURSO, NOMECURSO FROM CURSO ORDER BY NOMECURSO;";
                $resultado = mysqli_query($conn,$InstrucaoSQL);

                echo "<td><select id=\"bnomecurso\" name=\"bnomecurso\" class=\"form-control\" placeholder=\"Selecione\">";
                echo "<option value=0>SELECIONE O CURSO</option>";
                echo "<option value=TD>VISUALIZAR TODOS</option>";

                while ($linha = mysqli_fetch_assoc($resultado)){
                    if ($_POST["bnomecurso"] == $linha['CODCURSO']){
                        echo "<option selected=\"selected\" value=\"{$linha['CODCURSO']}\">{$linha['NOMECURSO']}</option>";
                    }else{
                        echo "<option value=\"{$linha['CODCURSO']}\">{$linha['NOMECURSO']}</option>";
                    };
                };

                echo "</select></td>";

                if (isset($_POST['bnomeaula'])){
					$bnomeaula = $_POST['bnomeaula'];
					echo "<td><input type=\"text\" class=\"form-control\" name=\"bnomeaula\" value=\"$bnomeaula\" id=\"bnomeaula\" maxlength=\"255\"></td>";
				}else{
					echo "<td><input type=\"text\" class=\"form-control\" name=\"bnomeaula\" id=\"bnomeaula\" maxlength=\"255\"></td>";
				};

                if (isset($_POST['blink'])){
					$blink = $_POST['blink'];
					echo "<td><textarea class=\"form-control\" name=\"blink\" id=\"blink\">$blink</textarea></td>";
				}else{
					echo "<td><textarea class=\"form-control\" name=\"blink\" id=\"blink\"></textarea></td>";
				};
			?>
			<td><div class="filtrosituacao">
					</div>
					<select id="bsituaula" name="bsituaula" class="form-control" placeholder="Selecione">
					<?php
						$InstrucaoSQL = "SELECT DISTINCT ATIVO FROM AULA ORDER BY ATIVO;";
						$resultado = mysqli_query($conn,$InstrucaoSQL);

						echo "<option value=\"NA\">SELECIONE</option>";
						echo "<option value=\"TD\">TODOS</option>";

						while ($linha = mysqli_fetch_assoc($resultado)){
							if ($_POST["bsituaula"] == $linha['ATIVO']){
								echo "<option selected=\"selected\" value=\"{$linha['ATIVO']}\">{$linha['ATIVO']}</option>";
							}else{
								echo "<option value=\"{$linha['ATIVO']}\">{$linha['ATIVO']}</option>";
							};
						};

					?> 
					</select>
				</div></td>
			<td><button name="procurar" type="submit" class="btnbusca" >Procurar</button>
			<button name="cadastrar" type="submit" class="btnbusca" >Cadastrar</button></td>
		</tbody>
		</table>
		<table class="table table-striped">
			<tr>
				<th scope="col" width="40">CODAULA</th>
				<th scope="col" width="300">NOME AULA</th>
                <th scope="col" width="300">LINK AULA</th>
                <th scope="col" width="300">NOME CURSO</th>
                <th scope="col" width="300">ANOTAÇÕES</th>
                <th scope="col" width="100">DTCADASTRO</th>
				<th scope="col" width="100">SITUAÇÃO</th>
				<th scope="col" width="50">AÇÕES</th>
			</tr>
			
			<tbody>
				<?php

					if (isset($_POST['procurar'])){
						$bnomecurso = $_POST['bnomecurso'];
						$bsituaula = $_POST['bsituaula'];
                        $bcodaula = $_POST['bcodaula'];
                        $bnomeaula = $_POST['bnomeaula'];
                        $blink = $_POST['blink'];

						if($bnomecurso == "0" or $bnomecurso == "TD"){
                            $PNOMECURSO = "AND 1 = 1";
                        }else{
                            $PNOMECURSO = "AND A.CODCURSO = $bnomecurso";
                        };

						if($bsituaula != "NA" and $bsituaula != "TD"){
							$PATIVO = "AND A.ATIVO = $bsituaula";
						}else{
							$PATIVO = "AND 1 = 1";
						};
                        
                        if($bcodaula != ""){
							$PCODAULA = "AND CODAULA = '$bcodaula'";
						}else{
							$PCODAULA = "AND 1 = 1";
						};

                        if($bnomeaula != ""){
							$PNOMEAULA = "AND NOMEAULA LIKE '%$bnomeaula%'";
						}else{
							$PNOMEAULA = "AND 1 = 1";
						};

                        if($blink != ""){
							$PLINK = "AND LINKAULA LIKE '%$blink%'";
						}else{
							$PLINK = "AND 1 = 1";
						};
		
						$comandoSQL = "SELECT A.CODAULA, A.NOMEAULA, A.LINKAULA, B.NOMECURSO, A.ANOTACOES, A.ATIVO, A.DTCADASTRO
                        FROM AULA A, CURSO B 
                        WHERE A.CODCURSO = B.CODCURSO 
                        $PNOMECURSO $PATIVO $PCODAULA $PNOMEAULA $PLINK;";

					}else if(isset($_POST['cadastrar'])){
						$bcodcurso = $_POST['bnomecurso']; // é o codigo do curso
                        $bnomeaula = $_POST['bnomeaula'];
                        $blink = $_POST['blink'];
						$bsituaula = $_POST['bsituaula'];

						if($bnomeaula == ""){
							echo "$<script>alert('Você não pode cadastrar uma aula sem nome!');</script>";
							echo "<script>document.location='gerenciaraula.php?';</script>";
						}else{

							$InsertSQL = "INSERT INTO AULA (NOMEAULA, LINKAULA, CODCURSO) VALUES ('$bnomeaula', '$blink', $bcodcurso);";
							mysqli_query($conn,$InsertSQL);
							$comandoSQL = "SELECT A.CODAULA, A.NOMEAULA, A.LINKAULA, B.NOMECURSO, A.ANOTACOES, A.DTCADASTRO, A.ATIVO 
                                            FROM AULA A, CURSO B 
                                            WHERE A.CODCURSO = B.CODCURSO AND A.NOMEAULA = '$bnomeaula';";
						};

					}else{
						$comandoSQL = "SELECT A.CODAULA, A.NOMEAULA, A.LINKAULA, B.NOMECURSO, A.ANOTACOES, A.DTCADASTRO, A.ATIVO FROM AULA A, CURSO B WHERE A.CODCURSO = B.CODCURSO;";
					};

					$resultado = mysqli_query($conn,$comandoSQL);

					while ($linha = mysqli_fetch_assoc($resultado)){
						$Selecionado = "";
						if ($linha['ATIVO'] == 0){
							$Selecionado = "selected";
						};
						echo "
						<tr>
							<td align=center>{$linha['CODAULA']}</td>
							<td>{$linha['NOMEAULA']}</td>
                            <td><textarea type=\"text\" class=\"form-control\" name=\"LINK{$linha['CODAULA']}\" id=\"LINK{$linha['CODAULA']}\">{$linha['LINKAULA']}</textarea></td>
                            <td>{$linha['NOMECURSO']}</td>
                            <td><textarea class=\"form-control\" name=\"ANOT{$linha['CODAULA']}\" id=\"ANOT{$linha['CODAULA']}\">{$linha['ANOTACOES']}</textarea></td>
                            <td align=center>{$linha['DTCADASTRO']}</td>
							<td><select id=\"{$linha['ATIVO']}\" name=\"AT{$linha['CODAULA']}\" class=\"form-control\" placeholder=\"Selecione\">
								<option value=1>ATIVO</option>
								<option $Selecionado value=0>INATIVO</option>
							</td>
							<td><button name=\"salvar\" class=\"btn btn-salvar\" type=\"submit\" value=\"{$linha['CODAULA']}\">salvar</button></td>
						</tr>";
					};

					if (isset($_POST['salvar'])){
						$CODAULA = $_POST['salvar'];
						$LINKAULA = $_POST["LINK$CODAULA"];
						$ANOTACOESAULA = $_POST["ANOT$CODAULA"];
						$SITUACAO = $_POST["AT$CODAULA"];

						$updateSQL = "UPDATE AULA SET ANOTACOES = '$ANOTACOESAULA', ATIVO = '$SITUACAO', LINKAULA = '$LINKAULA' WHERE CODAULA = $CODAULA;";

						mysqli_query($conn,$updateSQL);

						echo "$<script>alert('Aula editado com sucesso!'); document.location='gerenciaraulas.php?';</script>";

						/*try{
							echo "$CODAULA = \"<script>document.GetElementById(\"bcodcurso\").value;</script>";
							echo "$nomecurso = \"<script>document.GetElementById(\"bnomecurso\").value;</script>";
							echo "$situacao = \"<script>document.GetElementById(\"bsituaula\").value;</script>";

							echo "<script>document.location='gerenciaraulas.php?;</script>";
						}catch(Exception $e){
							echo "<script>document.location='gerenciaraulas.php?';</script>";
						};*/
						
					};

				?>
			</tbody>
		</table>
				
		<?php
		?>

	</form>

	</form>
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
			.gerenciarhome{
				display: flex;
  				justify-content: center;
			}
	
			.btnbusca{
				color: #fff;
				height: 35px;
				background-color: #1a9cbc;
				border-color: #2b889f;
				box-shadow: 0 0 0 0.2rem rgba(60, 198, 171, 0.5);
				border-radius: 0.5rem;
			}

			.descricaocurso{
				display: block;
				width: 500px;
				height: 60px;
				overflow-wrap: break-word;
				padding: 0.375rem 0.75rem;
				font-size: 1rem;
				font-weight: 400;
				line-height: 1.5;
				color: #495057;
				background-color: #fff;
				background-clip: padding-box;
				border: 0.125rem solid #ced4da;
				border-radius: 0.5rem;
				transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
			}

			.btn-salvar{
				background-color: #4ef50c;
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

			.namepage {
				margin-top:80px;
				height:100px;
				width:1550px;

				color: white;
				text-align: center;
			};


		</style>
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

            mysqli_close($conn);
		?>

    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>