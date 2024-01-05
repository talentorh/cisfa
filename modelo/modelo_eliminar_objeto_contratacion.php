<?php
$cucop = $_POST['cucop'];

require '../conexion.php';

 $sql = $conexion2->query("DELETE FROM objetocontratacion WHERE CUCOP = '$cucop'");
 
 if($sql == TRUE){
 	echo "Eliminacion Exitosa";
 }
?>