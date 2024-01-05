<?php session_start();
    if(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/principalAdmin.php';
    }else{
        header ('location: index');
    }
        
?>