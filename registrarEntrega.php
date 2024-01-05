<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/registrarEntrega.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/registrarEntrega.php';
    
    
    }else{
        header('location: login');
    }


?>