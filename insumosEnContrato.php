<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'frontend/insumosEnContrato.php';
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'frontend/insumosEnContratoFG.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'frontend/insumosEnContrato.php';
    }else{
        header ('location: index.php');
    }
        
?>