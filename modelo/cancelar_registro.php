<?php
require 'conexion.php';
$ID_usuario = base64_decode($_GET['var']);
 $sql = $conexion2->query("DELETE FROM proveedores WHERE id_proveedor = $ID_usuario");
 $sql = $conexion2->query("DELETE FROM objetocontratacion WHERE clave_objeto_contratacion = $ID_usuario");
 
 if($sql == TRUE){
     echo "<script>alert('Registro eliminado')
     window.location='principal.php';</script>";
 }else{
    echo "<script>alert('Error insesperado');</script>"; 
 }
?>