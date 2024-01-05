<?php
require 'conexion.php';
 
$ID_usuario = $_GET['var'];
$sql_u = $conexion2->query("SELECT * FROM datosproveedor WHERE id_datoProveedor ='$ID_usuario'");
$rand=rand(100000, 150000);
$rand2= base64_encode($rand);
 $row_u = mysqli_fetch_array($sql_u);
 $id_datoProveedor = $row_u['id_datoProveedor'];
 $nombre = $row_u['numeroProveedor'];
 $datos = $row_u['datoPersonalProveedor'];
 $domicilio = $row_u['domicilioPersonal'];
 $telefono = $row_u['telefono'];
 $email = $row_u['correoElectronico'];
 $procedimiento = $row_u['numeroDeProcedimiento'];
 $rfc = $row_u['rfc'];
 $direccionInternet = $row_u['direccionInternet'];
 
 $sql = $conexion2->query("SELECT id_proveedorDato from proveedores where id_proveedorDato = '$rand'");
    $row = mysqli_fetch_assoc($sql);
    
    $validaRand = $row['id_proveedorDato'];
 if($validaRand != $rand){
 $sql = $conexion2->query("INSERT INTO proveedores(id_proveedor, id_proveedorDato, numero_proveedor, nombre_proveedor, domicilio_proveedor, rfc_proveedor, telefono_proveedor, direccion_internet, email_proveedor, numero_procedimiento, year) VALUES (NULL, '$rand', '$id_datoProveedor', '$datos', '$domicilio', '$rfc', '$telefono', '$direccionInternet', '$email','$procedimiento', '2022')");
}else{
    $rand=rand(160000, 190000);
    $sql = $conexion2->query("INSERT INTO proveedores(id_proveedor, id_proveedorDato, numero_proveedor, nombre_proveedor, domicilio_proveedor, rfc_proveedor, telefono_proveedor, direccion_internet, email_proveedor, numero_procedimiento, year) VALUES (NULL, '$rand', '$id_datoProveedor', '$datos', '$domicilio', '$rfc', '$telefono', '$direccionInternet', '$email','$procedimiento', '2022')");
}
 if($sql == TRUE){
	echo "<script>window.location.href='redirect-model-update-data?var=$rand2';</script>";

 }else{
	echo "<script>alert('registro erroneo');</script>"; 
 }

?>