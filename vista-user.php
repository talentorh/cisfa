<?php session_start();
    if(isset($_SESSION['externo'])) {
        require 'frontend/vista-user.php';
        
    }else{
        header('location: index2');
    }


?>