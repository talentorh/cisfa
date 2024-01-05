<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/informePenalizacionFG.php';
        
    }
    
    else{
        header('location: login.php');
    }


?>