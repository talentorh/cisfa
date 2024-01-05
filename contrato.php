<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/contrato.php';
        
    }else{
        header('location: login');

    }

?>