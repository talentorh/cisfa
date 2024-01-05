<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/editarOrdenFG.php';
        
    }else{
        header('location: login.php');
    }


?>