<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'modelo/cancelar_registro.php';
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'modelo/cancelar_registroFG.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'modelo/cancelar_registro.php';
    
    }else{
        header ('location: index.php');
    }
        
?>