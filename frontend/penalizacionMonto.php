<?php
if(isset($_POST['monto']))
{
$monto = $_POST['total'];
$claveContrato = $_POST['claveContrato'];

require 'conexion.php';

$actualizaMonto = "UPDATE numeroorden set montoIncumplimiento = $monto where claveUnicaContrato = '$claveContrato'";
$result = mysqli_query($conexion2, $actualizaMonto);
}
if($result != false){
    echo "<script>window.history.back();</script>";
}else{
   echo "<script>alert('error inesperado, intente nuevemente');</script>";
}
echo "<script>window.history.back();</script>";

?>