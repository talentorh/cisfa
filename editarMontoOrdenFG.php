<?php
error_reporting(0);
require 'conexion.php';
date_default_timezone_set("America/Mexico_City");
$hoy=date("Y-m-d");
$costos= base64_decode($_GET['total']);
//$id_unico=base64_decode($_GET['id_unico']);
$valor2= base64_decode($_GET['claveContrato']);
$id_orden = base64_decode($_GET['id_orden']);

$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);

$birmex = $_GET['birmex'];

if($birmex != ''){
    $sqlGuardaClave = $conexion2->query("INSERT into direccionoperadorlogistico(claveUnicaOrden) values('$birmex')");
  }
  if($birmex == ''){
    $sqlDelete = $conexion2->query("DELETE from direccionoperadorlogistico where claveUnicaOrden = '$valor2'");
  }

$querY = "UPDATE numeroorden set totalOrden= $costos, fechaRegistro= '$hoy'
where id_orden = $id_orden limit 1";
$edita= mysqli_query($conexion2, $querY);

if($edita != false){
    echo "<script>alert('Edición completada');
    window.history.back();</script>";
}else{
    echo "<script>alert('Error al aplicar edición');
    window.history.back();</script>";
}

?>