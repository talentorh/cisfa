<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/medicamentosFG.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/medicamentosFG.php';
    
    }else{
        header('location: login.php');
    }


?>