<?php
    session_start();

    if(!isset($_SESSION["codtipouser"])){
        echo "<script>alert('Faça o login!'); document.location = \"index.php\";</script>";
        //header("location: index.php");
    }else{
        return $_SESSION["codtipouser"];
    };
?>