<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/verPDFFG.php';
    }else if(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/verPDFFG.php';
        
    }else{
        header('location: login');
    }


?>