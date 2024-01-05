<?php
$val = base64_decode($_GET['val']);
require 'conexion.php';
$sql = $conexion2->query("UPDATE numeroorden set activarFolio = 1 where claveUnicaContrato = '$val'");

if($sql != false){
echo "<script>alert('good');
window.history.back();</script>";
}else{
    echo "<script>alert('error Inesperado');
    window.history.back();</script>"; 
}
?>