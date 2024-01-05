<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/vistaPenalizaciones.php';
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'frontend/vistaPenalizaciones.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/vistaPenalizaciones.php';
    }else{
        header('location: login');
    }


?>