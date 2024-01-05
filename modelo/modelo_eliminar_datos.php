<?php
$ID_usuario = $_POST['ID_usuario'];

require '../conector/conexion.php';

 $sql = $conexion2->query("DELETE FROM `usuario` WHERE `usuario`.`ID_usuario` = $ID_usuario");
 
 if($sql == TRUE){
 	echo "Eliminacion Correcta XD";
 }
?>