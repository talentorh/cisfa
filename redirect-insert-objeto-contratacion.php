<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'modelo/modelo_insertar_obeto_contratcion.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'modelo/modelo_insertar_obeto_contratcion.php';
    
    }else{
        header ('location: index.php');
    }
        
?>