<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/generarOrdenv1.php';
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/generarOrdenv1.php';
    }else{
        header('location: login.php');
    }


?>