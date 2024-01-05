<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'consultaInsumos.php';
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'consultaInsumos.php';
    
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'consultaInsumos.php';
    
    }else{
        header ('location: index');

    }
?>