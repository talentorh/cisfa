<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/seguiminetoEntrega.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/seguiminetoEntrega.php';
    
    }else{
        header('location: index');
    }


?>