<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/usuarios.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/usuarios.php';
    
    }else{
        header ('location: index');
    }
        
?>