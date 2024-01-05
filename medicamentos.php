<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/medicamentos.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/medicamentosGeneral.php';
    
    }elseif(isset($_SESSION['usuarioFG'])) {
        require 'frontend/medicamentosFG.php';
    }else{
        header('location: login');
    }


?>