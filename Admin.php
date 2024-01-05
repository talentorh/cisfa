<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'consulta-usuario.php';
        
    }else{
        header('location: login');
    }


?>