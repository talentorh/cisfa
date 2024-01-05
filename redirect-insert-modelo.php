<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'modelo/modelo_registrar_datos.php';
        
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'modelo/modelo_registrar_datos.php';
        
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'modelo/modelo_registrar_datos.php';
    
    }else{
        header ('location: index.php');
    }
        
?>