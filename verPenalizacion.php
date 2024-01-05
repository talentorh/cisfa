<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/verPenalizacion.php';
        
    }else{
        header('location: login');
    }


?>