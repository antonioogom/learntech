<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles_login.css">
    <title>Login</title>
</head>
<body class="body">
    <!-- <div class="menu-topo radius-all">
    </div> -->
    <div class="box-invisible"></div>

    <div class="boxmodel radius-all">
    <div class="login-page">
        <form action="" method="POST">
            <p class="rotulo-header">Fazer login</p>

            <span class="rotulo">Usuário</span>
            <input type="text" name="matricula" class="campo-form campo-larg">

            <span class="rotulo">Senha</span>
            <input type="password" name="senha" class="campo-form campo-larg">

            <button type="submit" name="login" class="botoes botoes-somb campo-larg">Entrar</button>
            <button class="botoes botoes-somb campo-larg"><a href="cadastro.php" class="link">Cadastrar agora</a></button>

        </form>
    </div>

    <?php

        // conecta no banco de dados

        require("php/conexao.php");

        //atribui variaveis de login e senha

        if($conn == false){
            echo "Não foi possível estabelecer uma conexão com o banco de dados.";
        }

        if(isset($_POST["login"])){
            $matricula = $_POST["matricula"];
            $senha = $_POST['senha'];

            $InstrucaoSQL = "SELECT * FROM USUARIOS WHERE RA = '$matricula' AND SENHA = '$senha'";
            $resultado = mysqli_query($conn, $InstrucaoSQL);

            if ($linha = mysqli_fetch_assoc($resultado)){

                session_start();

                //cria as variáveis de sessão de acordo com o resultado da query
                $_SESSION["nome"] = $linha["nome"];
                $_SESSION['matricula'] = $matricula; //adicionado em 03/04/2023
                //$_SESSION["matricula"] = $linha["RA"]; //alterado em 03/04/2023 Antonio G Quadro
                $_SESSION["codtipouser"] = $linha["codtipouser"];
                //$raALUNO = $linha["RA"]; //alterado em 03/04/2023 Antonio G Quadro
                $codtipouser = $linha["codtipouser"];

                if ($linha['codtipouser'] == 1){

                    //$QueryCodCurso = "SELECT CODCURSO FROM ALUNOS WHERE RA = $raALUNO"; //alterado em 03/04/2023 Antonio G Quadro
                    $QueryCodCurso = "SELECT CODCURSO FROM ALUNOS WHERE RA = $matricula";
                    $ResultadoQueryCodCurso = mysqli_query($conn, $QueryCodCurso);

                    if ($ArrayCodCurso = mysqli_fetch_assoc($ResultadoQueryCodCurso)){
                        $_SESSION["codcurso"] = $ArrayCodCurso["CODCURSO"];
                    };

                    //echo "<script>alert('$QueryCodCurso');</script>";
                    header("location: centraldoaluno.php");

                }elseif($linha['codtipouser'] == 2){
                    $_SESSION["codtipouser"] = 2;

                    header("location: gerenciaralunos.php");

                }elseif($linha['codtipouser'] == 3){
                    $_SESSION["codtipouser"] = 3;

                    header("location: parametrosite.php");

                }
            }else{
                echo "<script>alert('Senha incorreta!');</script>";
            };

        }

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
    ?>

	</div>
</body>
</html>