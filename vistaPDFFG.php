<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        
        require 'frontend/vistaPDFFG.php';
    }else if(isset($_SESSION['usuarioAdmin'])) {
        
        require 'frontend/vistaPDFFG.php';
        
    }else{
        header('location: login');
    }


?>