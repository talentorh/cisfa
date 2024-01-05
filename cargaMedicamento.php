<?php session_start();
if(isset($_SESSION['usuario'])){
    require 'frontend/ordenSuministro.php';
}elseif(isset($_SESSION['usuarioAdmin'])){
    require 'frontend/ordenSuministro.php';

}else{
    header ('location: index');
}
    
?>
