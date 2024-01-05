<?php session_start();
    if(isset($_SESSION['usuarioFG'])){
        require 'frontend/principalFG.php';
    }else{
        header ('location: indexFG');
    }
        
?>