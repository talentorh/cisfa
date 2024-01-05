<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/registroUser.php';
    }else{
        header ('location: index.php');
    }
        
?>