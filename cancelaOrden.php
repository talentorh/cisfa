<?php session_start();
if(isset($_SESSION['usuario'])){
    require 'frontend/cancelaOrden.php';
}elseif(isset($_SESSION['usuarioAdmin'])){
    require 'frontend/cancelaOrden.php';

}else{
    header ('location: index');
}
    
?>
