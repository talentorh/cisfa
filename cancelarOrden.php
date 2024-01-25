<?php 
error_reporting(0);
require 'conexion.php';

$claveUnica = base64_decode($_GET['valor2']);
$id = base64_decode($_GET['var']);
$querY = "UPDATE numeroorden set totalOrden= 0, estatus = 0, fechaRegistro = '0000-00-00'
where claveUnicaContrato = '$claveUnica' limit 1";
$query = "DELETE FROM ordensuministro where claveUnicaOrden = '$claveUnica'";
$operador = "DELETE FROM direccionoperadorlogistico where claveUnicaOrden = '$claveUnica'";
//$query2 = "UPDATE proveedores set cuentaOrdenSuminstro = 0 where id_proveedor = $id";
//$resul = mysqli_query($conexion2, $query2);
$edita= mysqli_query($conexion2, $querY);
$elimina= mysqli_query($conexion2, $query);
$eliminaoperador= mysqli_query($conexion2, $operador);

if($edita || $elimina != false){
    echo "<script>
    window.location.href='principal';
    </script>";
}else{
    echo "<script>
    window.history.back();
    </script>";
}
?>