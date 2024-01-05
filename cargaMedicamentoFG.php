<?php session_start();
if(isset($_SESSION['usuarioFG'])){
    require 'frontend/ordenSuministroFG.php';
}else{
    header ('location: index');
}
    
?>