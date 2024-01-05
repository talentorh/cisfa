<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/registrarEntregaFG.php';
        
    }else{
        header('location: login');
    }


?>