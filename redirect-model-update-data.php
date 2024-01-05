<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'modelo/model_update_data.php';
        
    }else if(isset($_SESSION['usuarioFG'])){
        require 'modelo/model_update_dataFG.php';
        
    }else if(isset($_SESSION['usuarioAdmin'])){
        require 'modelo/model_update_dataAdmin.php';
    
    }else{
        header ('location: index');
    }
        
?>