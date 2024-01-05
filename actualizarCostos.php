<?php 
require 'conexion.php';
$costos=$_GET['total'];
$id_unico=$_GET['id_unico'];
$valor2=$_GET['claveContrato'];
$querY = "UPDATE numeroorden set id_contrato = $id_unico, totalOrden= $costos 
where claveUnicaContrato = '$valor2' limit 1";
$edita= mysqli_query($conexion2, $querY);
 if($edita != false){
     echo "<script>alert('Good');</script>";
 }else{
     echo "<script>alert('Error al calcular costos');</script>";
 }

 echo "<script>window.history.back();</script>";

?>