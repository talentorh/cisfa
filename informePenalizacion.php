<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/informePenalizacion.php';
        
    }else if(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/informePenalizacion.php';
        
    }else{
        header('location: login');
    }


?>