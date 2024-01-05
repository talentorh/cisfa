<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'crearFolio.php';
        
    }else{
        header('location: login');
    }


?>