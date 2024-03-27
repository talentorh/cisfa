<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/verPDFv1.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/verPDFv1.php';
    
    }else{
        header('location: login');
    }


?>