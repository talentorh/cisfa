<?php session_start();
    if(isset($_SESSION['usuarioFG'])){
        require 'modelo/modelo_add_order_suministroFG.php';
    }else{
        header ('location: index.php');
    }
        
?>