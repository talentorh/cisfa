<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/generarOrden.php';
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/generarOrden.php';
    }else{
        header('location: login.php');
    }


?>