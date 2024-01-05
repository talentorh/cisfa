<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
     
        require 'frontend/generarOrdenFG.php';
        
    }else{
        header('location: login.php');
    }


?>