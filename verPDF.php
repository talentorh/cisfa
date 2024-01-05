<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/verPDF.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/verPDF.php';
    
    }else{
        header('location: login');
    }


?>