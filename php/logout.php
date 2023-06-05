<?php
    session_start();
    session_destroy();

    unset($_SESSION["nome"]);
    unset($_SESSION["email"]);
    unset($_SESSION["perfil"]);

    header("location: http://escolalaerntech.freevar.com/");
?>