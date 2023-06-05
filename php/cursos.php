<?php
    require("php/conexao.php");
    $comandoSQL = "SELECT CODCURSO, NOMECURSO FROM CURSO WHERE ATIVO = 1 ORDER BY NOMECURSO;";
    $resultado = mysqli_query($conn,$comandoSQL);
    while ($linha = mysqli_fetch_assoc($resultado)){

        echo "<div class=\"col-md-6 col-lg-4 mb-5\">
        <div class=\"Cursos-item mx-auto\" data-toggle=\"modal\" data-target=\"#CursosModal{$linha['CODCURSO']}\">
            <div class=\"Cursos-item-caption d-flex align-items-center justify-content-center h-100 w-100\">
                <div class=\"Cursos-item-caption-content text-center text-white\"><i class=\"fas fa-plus fa-3x\"></i></div>
            </div>
            <img class=\"img-fluid\" src=\"assets/img/cursos/carinha.png\" alt=\"...\" />
            <h1>{$linha['NOMECURSO']}</h1>
        </div>
    </div>";

    }
    mysqli_close($conn);
?>