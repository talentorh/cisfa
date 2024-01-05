<?php session_start();
    if(isset($_SESSION['usuario'])){
        require 'modelo/update-contrato-proveedor.php';
    
    }else if(isset($_SESSION['usuarioAdmin'])){
            require 'modelo/update-contrato-proveedor.php';
    }else if(isset($_SESSION['usuarioFG'])){
                require 'modelo/update-contrato-proveedor.php';
            
        }else{
        header ('location: index');
    }
        
?>