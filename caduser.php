<?php
	//require("sessao.php");
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

	<link href="css/styless.css" rel="stylesheet" />

	<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
	<script src="js/scripts.js"></script>
	<script>
    	function editar(RA,nome,email,codtipouser,ativo){
    		document.getElementById("RA").value = RA;
    		document.getElementById("nome").value = nome;
    		document.getElementById("email").value = email;
    		document.getElementById("codtipouser").value = codtipouser;
    		document.getElementById("ativo").value = ativo;
    	}
    </script>

	<?php 
		require("php/sessao.php");
		require("php/conexao.php");
		if($codtipouser != 3){
			echo "<script>alert('Você não tem permissão para acessar essa página!'); document.location = \"index.php\";</script>";
		};
	?>

    <title>Cadastro de Usuário</title>
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
						<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="parametrosite.php">Gerenciar Parâmetros</a></li>
						<a class="buttonLogin loginCabecalho" href="php/logout.php"><button class="buttonLogin loginCabecalho"><b>SAIR</b></button></a>
					</b></b></ul><b><b>
				</b></b></div><b><b>
			</b></b></div><b><b>
		</b></b>
	</nav>
	<div class="namepage">
		<div style="padding:30px;margin-top:40px;background-color:#1abc9c;height:85px;">
			<h1>Gerenciar Usuários</h1>
		</div>
	</div>
    
	<div class="container-center-md">
	  <form action="" method="get">
		  <br>	
		  <div class="row pb-1 justify-content-md-center">
		    <div class="col-md-1" align="right">
		      ID
		    </div>
		    <div class="col-md-2" align="center">
		      <input id="RA" name="RA" class="form-control" type="text" placeholder="RA" readonly >
		    </div>
		   	<div class="col-md-1" align="right">
		      E-mail
		    </div>
		    <div class="col-md-2" align="center">
		      <input id="email" name="email" class="form-control" type="text" placeholder="E-mail">
		    </div>
		  </div>
		  <div class="row pb-1 justify-content-md-center">
		    <div class="col-md-1" align="right">
		      Nome
		    </div>
		    <div class="col-md-2" align="center">
		      <input id="nome" name="nome" class="form-control" type="text" placeholder="Nome">
		    </div>
			<div class="col-md-1" align="right">
		      Tipo User
		    </div>
		    <div class="col-md-2" align="center">				
			    <select id="codtipouser" name="codtipouser" class="form-control" placeholder="Selecione">
			    	  <option value="" readonly selected>Selecione</option>
			    	  <option value="3">Administrador</option>
					  <option value="2">Professor</option>
			    </select>
		    </div>
		  </div>
		  <div class="row pb-1 justify-content-md-center">
		    <div class="col-md-1" align="right">
		      Senha
		    </div>
		    <div class="col-md-2" align="center">
		      <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha">
		    </div>
		    <div class="col-md-1" align="right">
		      Ativo
		    </div>
		    <div class="col-md-2" align="center">				
			    <select id="ativo" name="ativo" class="form-control" placeholder="Selecione">
			    	  <option value="" readonly selected>Selecione</option>
					  <option value="0">Bloqueado</option>
					  <option value="1">ativo</option>
			    </select>
		    </div>
		  </div>

		  <br>
		  <div class="row pb-1 justify-content-md-center">
		    <div class="col-md-8"  align="center">
		      <button name="consultar" type="submit" class="btn btn-primary">Consultar</button>
		      <button name="salvar" type="submit" class="btn btn-primary">salvar</button>
		      <button type="reset" class="btn btn-primary">Limpar</button>
		    </div>
		  </div>  
	  <br>
	  <br>
	  <div class="row justify-content-md-center">
	   	<div class="col-md-8"   align="center">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">NOME</th>
			      <th scope="col">E-MAIL</th>
			      <th scope="col">Tipo Usuário</th>
			      <th scope="col">Ativo</th>
			      <th scope="col">Ações</th>
			    </tr>
			  </thead>
			  <tbody>
				<?php
					require("php/conexao.php");
					if (isset($_GET["excluir"])){
						$RA = $_GET["excluir"];

						$sql = "delete from USUARIOS where RA=$RA";
						mysqli_query($conn,$sql);
						echo "<script>alert('Usuário de R.A. $RA DELETADO do sistema.');</script>";


					}else if (isset($_GET["salvar"])){
						$RA     = $_GET["RA"];
						$nome   = $_GET["nome"];
						$email  = $_GET["email"];
						$senha  = $_GET["senha"];
						$codtipouser = $_GET["codtipouser"];
						$ativo = $_GET["ativo"];

						if ($RA!=""){
							$sql = "update USUARIOS set nome='$nome',email='$email',senha='$senha',codtipouser='$codtipouser',ativo='$ativo' where RA=$RA";
							mysqli_query($conn,$sql);
						}else{
							$sql = "insert into USUARIOS (nome,email,senha,codtipouser,ativo) values('$nome','$email','$senha','$codtipouser','$ativo')";
							mysqli_query($conn,$sql);
						}

						echo "<script>alert('Dados salvos com sucesso!');</script>";

					}

					$comandoSQL = "select * from USUARIOS";
					$resultado = mysqli_query($conn,$comandoSQL);
					while ($linha = mysqli_fetch_assoc($resultado)){
						$RA   = $linha['RA'];
						$nome = $linha['nome'];
						$email = $linha['email'];
						$codtipouser = $linha['codtipouser'];
						$ativo = $linha['ativo'];
						$dados_editar = "'".$RA."','".$nome."','".$email."','".$codtipouser."','".$ativo."'";

						echo "<tr>
							      <td>$RA</td>
							      <td>$nome</td>
							      <td>$email</td>
							      <td>$codtipouser</td>
							      <td>$ativo</td>
							      <td>
							        <button type=\"submit\" value=\"$RA\" class='btn btn-danger' name=\"excluir\">excluir</button>
									
									<button type='button' class='btn btn-warning' onClick=\"editar($dados_editar)\">editar</button>

								   </td>
							    </tr>";

					}
					mysqli_close($conn);
				?>
			  </tbody>
			</table>
	    </div>
	  </div>
	  </form>	
	</div>
	
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

<style>

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

    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>



