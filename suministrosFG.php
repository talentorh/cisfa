<?php session_start();
    if(isset($_SESSION['usuarioFG'])) {
        require 'frontend/suministrosFG.php';
    }else if(isset($_SESSION['usuarioAdmin'])) {
        require 'frontend/suministrosAdmin.php';
        
    }else{
        header('location: login');
    }


?>