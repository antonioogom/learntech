<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Cadastrar na Learn TECH</title>

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/styles_cadastro.css" rel="stylesheet" media="all">

    <?php
        require("php/conexao.php");
    ?>
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Faça parte dos alunos da Escola Learn TECH</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Nome</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nome" id="nome">
                                            <label class="label--desc">Nome</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="sobrenome" id="sobrenome">
                                            <label class="label--desc">Sobrenome</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">E-mail</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Senha</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="senha" id="senha">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Telefone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="ddd" id="ddd" maxlength="2">
                                            <label class="label--desc">DDD</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="numcell" id="numcell" maxlength="10">
                                            <label class="label--desc">Número</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Curso</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="curso" name="curso" class="form-control" placeholder="Selecione">
                                            <?php
                                            $InstrucaoSQL = "SELECT CODCURSO, NOMECURSO FROM CURSO WHERE ATIVO = 1 ORDER BY NOMECURSO;";
                                            $resultado = mysqli_query($conn,$InstrucaoSQL);
                    
                                            echo "<option value=0>SELECIONE UMA TURMA</option>";
                    
                                            while ($linha = mysqli_fetch_assoc($resultado)){
                                                if ($_POST["curso"] == $linha['CODCURSO']){
                                                    echo "<option selected=\"selected\" value=\"{$linha['CODCURSO']}\">{$linha['NOMECURSO']}</option>";
                                                }else{
                                                    echo "<option value=\"{$linha['CODCURSO']}\">{$linha['NOMECURSO']}</option>";
                                                };
                                            };
                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" name="cadastro" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    $CamposCompletos = false;

        

        if (isset($_POST['cadastro'])){

            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $ddd = $_POST['ddd'];
            $numcell = $_POST['numcell'];
            $curso = $_POST['curso'];
            $JaExiste = false;
            

            $ConsultaAluno = "select * from USUARIOS where EMAIL = '$email';";

            $resultado = mysqli_query($conn, $ConsultaAluno);

            while($linha = mysqli_fetch_assoc($resultado)){
                $ra = $linha["RA"];
                echo "<script>alert('Voce já está cadastrado na Escola Learn TECH!!\\nSeu R.A. É: $ra.'); document.location = \"login.php\";</script>";
                $JaExiste = true;
            };

            if($nome == ""){
                echo "<script>alert('O campo NOME é obrigatório!!');</script>";
            }else if($sobrenome == ""){
                echo "<script>alert('O campo SOBRENOME é obrigatório!!');</script>";
            }else if($email == ""){
                echo "<script>alert('O campo EMAIL é obrigatório!!');</script>";
            }else if($senha == ""){
                echo "<script>alert('O campo SENHA é obrigatório!!');</script>";
            }else if($ddd == ""){
                echo "<script>alert('O campo DDD é obrigatório!!');</script>";
            }else if($numcell == ""){
                echo "<script>alert('O campo NUMERO é obrigatório!!');</script>";
            }else if($curso == "0" or $curso == "TD"){
                echo "<script>alert('O campo CURSO é obrigatório!!');</script>";
            }else{
                $CamposCompletos = true;
            };

            echo "<script>document.getElementById(\"nome\").value = \"$nome\";</script>";
            echo "<script>document.getElementById(\"sobrenome\").value = \"$sobrenome\";</script>";
            echo "<script>document.getElementById(\"email\").value = \"$email\";</script>";
            echo "<script>document.getElementById(\"senha\").value = \"$senha\";</script>";
            echo "<script>document.getElementById(\"ddd\").value = \"$ddd\";</script>";
            echo "<script>document.getElementById(\"numcell\").value = \"$numcell\";</script>";
            echo "<script>document.getElementById(\"curso\").value = \"$curso\";</script>";
            
        };

        if ($CamposCompletos == true and $JaExiste == false){
            $SQLTabelaUsuario = "INSERT INTO USUARIOS (NOME, EMAIL, CODTIPOUSER, SENHA) VALUES (\"$nome\", \"$email\", 1, \"$senha\");";
            $SQLTabelaAluno = "INSERT INTO ALUNOS (RA, NOME, EMAIL, NUMERO, CODCURSO) VALUES ((SELECT RA FROM USUARIOS WHERE EMAIL = \"$email\") ,\"$nome\", \"$email\", \"$numcell\", $curso);";

            $resultado1 = mysqli_query($conn,$SQLTabelaUsuario);
            $resultado = mysqli_query($conn,$SQLTabelaAluno);

            $SQLRACadastrado = "SELECT RA FROM ALUNOS WHERE EMAIL = \"$email\";";

            $resultado2 = mysqli_query($conn,$SQLRACadastrado);

            while ($linha = mysqli_fetch_assoc($resultado2)){
                $ra = $linha["RA"];
                echo "<script>alert('Bem vindo a Escola Learn TECH!!\\nSeu R.A. é: $ra. Use esse R.A. para logar'); document.location = \"login.php\";</script>";
                break;
            };


            //echo "<script>alert('Bem vindo a Escola Learn TECH!!\\nSeu R.A. é: ');</script>";
            //echo "<script>alert('$SQLTabelaUsuario');</script>";

        };

        require("php/parametros.php");
			$IMAGEM_FUNDO_LOGIN = IMAGEM_FUNDO_LOGIN();

			echo "
			<style>
			html,body{
			background-image: url('$IMAGEM_FUNDO_LOGIN');
			background-size: cover;
			background-repeat: no-repeat;
			height: 100%;
			font-family: 'Numans', sans-serif;
			}
			</style>
			";

        mysqli_close($conn);
    ?>

    

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->