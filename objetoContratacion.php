<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/objetoDeContratacion.php';
        
    }else{
        header('location: login.php');
    }


?>