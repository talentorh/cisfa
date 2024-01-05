<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/eliminaProveedor.php';
        
    
    }elseif(isset($_SESSION['usuarioFG'])) {
        require 'frontend/eliminaProveedor.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/eliminaProveedor.php';
        
    
    }else{
        header('location: login.php');
    }


?>