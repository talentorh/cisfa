<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/seguiminetoEntregaFG.php';
    }else if(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/seguiminetoEntregaFG.php';
        
    }else{
        header('location: login.php');
    }


?>