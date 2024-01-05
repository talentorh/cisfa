<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'modelo/modelo_add_order_suministro.php';
    }elseif(isset($_SESSION['usuarioAdmin'])){
        require 'modelo/modelo_add_order_suministro.php';
    }elseif(isset($_SESSION['usuarioFG'])){
        require 'modelo/modelo_add_order_suministro.php';
   } else{
        header ('location: index.php');
    }
        
?>