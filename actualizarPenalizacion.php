<?php

require 'conexion.php';
$id_orden = $_POST['id_orden'];
$sql = $conexion2->query("SELECT penalizar from ordensuministro where id_ordenSuministro = $id_orden");
$row = mysqli_fetch_assoc($sql);

$valida = $row['penalizar'];

if($valida == 0){
$sql = $conexion2->query("UPDATE ordensuministro set penalizar = 1 where id_ordenSuministro = $id_orden limit 1");
}else{
 $sql = $conexion2->query("UPDATE ordensuministro set penalizar = 0 where id_ordenSuministro = $id_orden limit 1");   
}
?>