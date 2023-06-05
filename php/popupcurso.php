<?php
    require("php/conexao.php");
    $comandoSQL = "SELECT CODCURSO, NOMECURSO, DESCRICAO FROM CURSO;";
    $resultado = mysqli_query($conn,$comandoSQL);


    while ($linha = mysqli_fetch_assoc($resultado)){

        echo "<div class=\"Cursos-modal modal fade\" id=\"CursosModal{$linha['CODCURSO']}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"CursosModal{$linha['CODCURSO']}Label\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-xl\" role=\"document\">
                        <div class=\"modal-content\">
                            <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\"><i class=\"fas fa-times\"></i></span>
                            </button>
                            <div class=\"modal-body text-center\">
                                <div class=\"container\">
                                    <div class=\"row justify-content-center\">
                                        <div class=\"col-lg-8\">
                                            <!-- Cursos Modal - Title-->
                                            <h2 class=\"Cursos-modal-title text-secondary text-uppercase mb-0\" id=\"CursosModal{$linha['CODCURSO']}Label\">{$linha['NOMECURSO']}</h2>
                                            <!-- Icon Divider-->
                                            <div class=\"divider-custom\">
                                                <div class=\"divider-custom-line\"></div>
                                                <div class=\"divider-custom-icon\"><i class=\"fas fa-star\"></i></div>
                                                <div class=\"divider-custom-line\"></div>
                                            </div>
                                            <!-- Cursos Modal - Image-->
                                            <img class=\"img-fluidDentro rounded mb-5\" src=\"assets/img/cursos/carinha.png\" alt=\"...\" />
                                            <!-- Cursos Modal - Text-->
                                            <p class=\"mb-5\">{$linha['DESCRICAO']}</p>
                                            <button class=\"btn btn-primary\" data-dismiss=\"modal\">
                                                <i class=\"fas fa-times fa-fw\"></i>
                                                Fechar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

    }
    mysqli_close($conn);
?>