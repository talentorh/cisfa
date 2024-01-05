<?php session_start();
    if(isset($_SESSION['usuario'])) {
        require 'frontend/cargarProveedor.html';
        
    }elseif(isset($_SESSION['modifica_externo'])) {
        require 'frontend/cargarProveedor.html';
        
    }else{
        header('location: login');

    }

?>