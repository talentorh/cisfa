<?php session_start();
    if(isset($_SESSION['usuario'])) {
        header('location: principal'); 
        
    }elseif(isset($_SESSION['usuarioAdmin'])){
        header('location: principalAdmin');
    }else{
    header('location: login');
    }

?>