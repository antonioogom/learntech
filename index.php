<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Escola Learn Tech</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styless.css" rel="stylesheet" />

        <?php
            require("php/parametros.php");
        ?>
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
            <?php
                echo BARRA_NAVEGACAO_INDEX();
            ?>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Escola Learn Tech</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Conheça nossos cursos profissionalizantes da área de T.I. agora mesmo!</p>
                <a href="cadastro.php"><button class="buttonCad queroCadastrar">Quero ser aluno!</button></a>
            </div>
        </header>
        <!-- Cursos Section-->
        <section class="page-section Cursos" id="Cursos">
            <div class="container">
                <!-- Cursos Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Cursos</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Cursos Grid Items-->
                <div class="row justify-content-center">
                    <?php
                    require("php/cursos.php");
                    ?>
                </div>
            </div>
        </section>
        <!-- sobre Section-->
            
            <?php
                /*Mostra o SOBRE A ESCOLA Learn Tech*/
                echo EXIBE_INFO_SOBRE_ESCOLA();
                /*Mostra o ENVIAR UMA MENSAGEM PARA NÓS*/
                echo EXIBE_MENSAGEM_PARA_NOS();
            ?>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Onde Estamos?</h4>
                        <p class="lead mb-0">
                            <?php
                                /*Mostra o Endereço onde estamos*/
                                echo ENDERECO_ONDE_ESTAMOS();
                            ?>
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes Sociais</h4>
                        <?php

                            require("php/conexao.php");

                            $SQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 8 LIMIT 1";
                            $resultado = mysqli_query($conn,$SQL);

                            if (mysqli_fetch_assoc($resultado)['ATIVO'] == 1){
                                echo "<a class=\"btn btn-outline-light btn-social mx-1\" href=\"<?php LINK_REDES_SOCIAIS_FACEBOOK()?>\"><i class=\"fab fa-fw fa-facebook-f\"></i></a>";
                            }

                            $SQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 9 LIMIT 1";
                            $resultado = mysqli_query($conn,$SQL);

                            if (mysqli_fetch_assoc($resultado)['ATIVO'] == 1){
                                echo "<a class=\"btn btn-outline-light btn-social mx-1\" href=\"<?php LINK_REDES_SOCIAIS_TWITTER()?>\"><i class=\"fab fa-fw fa-twitter\"></i></a>";
                            }

                            $SQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 10 LIMIT 1";
                            $resultado = mysqli_query($conn,$SQL);

                            if (mysqli_fetch_assoc($resultado)['ATIVO'] == 1){
                                echo "<a class=\"btn btn-outline-light btn-social mx-1\" href=\"<?php LINK_REDES_SOCIAIS_LINKEDIN()?>\"><i class=\"fab fa-fw fa-linkedin-in\"></i></a>";
                            }
                            
                        ?>
                    </div>
                    <!-- Footer sobre Text-->
                    <?php
                        /*Mostra no rodapé "projeto criado por"*/
                        echo PROJETO_CRIADO_POR();
                    ?>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Copyright &copy; Escola Learn Tech
                    <!-- This script automatically adds the current year to your website footer-->
                    <!-- (credit: https://updateyourfooter.com/)-->
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </small>
            </div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Cursos Modals-->
        <!-- Cursos Modal 1-->
        <?php
            require("php/popupcurso.php");
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
        <script src="js/sc.js"></script>
    </body>
</html>
