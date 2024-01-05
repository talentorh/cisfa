<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/penalizacionMonto.php';
        
    }else{
        header('location: login.php');
    }


?>