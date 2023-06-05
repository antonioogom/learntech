<?php
    session_start();

    //$codtipouser = "ok";

    if(!isset($_SESSION["codtipouser"])){
        echo "<script>alert('Faça o login!'); document.location = \"index.php\";</script>";
    }else{
        $codtipouser = $_SESSION["codtipouser"];
    };
?>