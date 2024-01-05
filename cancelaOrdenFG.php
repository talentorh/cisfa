<?php session_start();
if(isset($_SESSION['usuarioFG'])){
    require 'frontend/cancelaOrdenFG.php';
}else{
    header ('location: index');
}
    
?>