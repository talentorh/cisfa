<?php session_start();
if(isset($_SESSION['usuario'])){
    require 'frontend/eliminaObjetoContratacion.php';
}else{
    header ('location: index.php');
}
    
?>