<?php session_start();

if(isset($_SESSION['usuario'])) {

  if (isset ($_POST['editaProveedor'])){
    error_reporting(0);
  require 'conexion.php';
  $id_proveedor = $_POST['id_datoProveedor'];
  $numeroProveedor = $_POST['numeroProveedor'];
  $proveedor = $_POST['datoPersonalProveedor'];
  $domicilio_proveedor = $_POST['domicilioPersonal'];
  $telefono= $_POST['telefono'];
  $correoElectronico = $_POST['correoElectronico'];
  $rfc = $_POST['rfc'];
  $numeroProcedimiento= $_POST['numeroDeProcedimiento'];
  $direccionInternet = $_POST['direccionInternet'];
 
  $querY = "UPDATE datosproveedor set numeroProveedor= '$numeroProveedor', datoPersonalProveedor= '$proveedor', 
  domicilioPersonal= '$domicilio_proveedor', 
  telefono= '$telefono', 
  correoElectronico= '$correoElectronico', 
  rfc= '$rfc', 
  numeroDeProcedimiento= '$numeroProcedimiento',
  direccionInternet = '$direccionInternet'
  where id_datoProveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
}else{
  header('location: login');
}
}elseif(isset($_SESSION['usuarioAdmin'])) {

  if (isset ($_POST['editaProveedor'])){
    error_reporting(0);
  require 'conexion.php';
  $id_proveedor = $_POST['id_datoProveedor'];
  $numeroProveedor = $_POST['numeroProveedor'];
  $proveedor = $_POST['datoPersonalProveedor'];
  $domicilio_proveedor = $_POST['domicilioPersonal'];
  $telefono= $_POST['telefono'];
  $correoElectronico = $_POST['correoElectronico'];
  $rfc = $_POST['rfc'];
  $numeroProcedimiento= $_POST['numeroDeProcedimiento'];
  $direccionInternet = $_POST['direccionInternet'];
 
  $querY = "UPDATE datosproveedor set numeroProveedor= '$numeroProveedor', datoPersonalProveedor= '$proveedor', 
  domicilioPersonal= '$domicilio_proveedor', 
  telefono= '$telefono', 
  correoElectronico= '$correoElectronico', 
  rfc= '$rfc', 
  numeroDeProcedimiento= '$numeroProcedimiento',
  direccionInternet = '$direccionInternet'
  where id_datoProveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
  
}else{
  header('location: login');
}
}elseif(isset($_SESSION['usuarioFG'])) {

  if (isset ($_POST['editaProveedor'])){
    error_reporting(0);
  require 'conexion.php';
  $id_proveedor = $_POST['id_datoProveedor'];
  $numeroProveedor = $_POST['numeroProveedor'];
  $proveedor = $_POST['datoPersonalProveedor'];
  $domicilio_proveedor = $_POST['domicilioPersonal'];
  $telefono= $_POST['telefono'];
  $correoElectronico = $_POST['correoElectronico'];
  $rfc = $_POST['rfc'];
  $numeroProcedimiento= $_POST['numeroDeProcedimiento'];
  $direccionInternet = $_POST['direccionInternet'];
 
  $querY = "UPDATE datosproveedor set numeroProveedor= '$numeroProveedor', datoPersonalProveedor= '$proveedor', 
  domicilioPersonal= '$domicilio_proveedor', 
  telefono= '$telefono', 
  correoElectronico= '$correoElectronico', 
  rfc= '$rfc', 
  numeroDeProcedimiento= '$numeroProcedimiento',
  direccionInternet = '$direccionInternet'
  where id_datoProveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
  
}else{
  header('location: login');
}
}
$conexion2->close();
?>