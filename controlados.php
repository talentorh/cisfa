<?php session_start();
    if(isset($_SESSION['controlados'])){
        require 'frontend/controlados.php';
    }else{
        header ('location: indexControlados.php');
    }
        
?>