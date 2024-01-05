<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/editarOrden.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/editarOrden.php';
    
    }else{
        header('location: login.php');
    }


?>