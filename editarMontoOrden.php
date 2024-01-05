<?php
error_reporting(0);
require 'conexion.php';
date_default_timezone_set("America/Mexico_City");
$hoy=date("Y-m-d");
$costos= base64_decode($_GET['total']);
//$id_unico=base64_decode($_GET['id_unico']);
$valor2= base64_decode($_GET['claveContrato']);

$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);



$querY = "UPDATE numeroorden set totalOrden= $costos, fechaRegistro= '$hoy'
where claveUnicaContrato = '$valor2' limit 1";
$edita= mysqli_query($conexion2, $querY);

if($edita != false){
    echo "<script>alert('Edición completada');
    window.history.back();</script>";
}else{
    echo "<script>alert('Error al aplicar edición');
    window.history.back();</script>";
}

?>