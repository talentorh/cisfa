<?php
 $ID_usuario = $_POST['ID_usuario'];
 $nombre = $_POST['numeroProveedor']; 
 $datos = $_POST['datoPersonalProveedor']; 
 $domicilio = $_POST['domicilioPersonal'];

 require '../conexion.php';

 $sql = $conexion2->query("UPDATE datosproveedor SET numeroProveedor = 5, datoPersonalProveedor = '$datos', domicilioPersonal = '$domicilio' WHERE datosProveedor.id_datoProveedor = $ID_usuario");
 
if($sql == TRUE){
	echo "<script>alert('registro exitoso');</script>";
}else{
   echo "<script>alert('registro erroneo');</script>"; 
}

?>