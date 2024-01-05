<?php session_start();

  if (isset ($_POST['editar'])){
    error_reporting(0);
  require 'conexion.php';
  $id_trabajador = $_GET['id_trabajador'];
  $nombre_trabajador = $_POST['nombre_trabajador'];
  $primer_apellido = $_POST['primer_apellido'];
  $segundo_apellido = $_POST['segundo_apellido'];
  $correo_electronico= $_POST['correo_electronico'];
  $id_rol = $_POST['id_rol'];
 

  
  $querY = "UPDATE login set nombre_trabajador= '$nombre_trabajador', primer_apellido= '$primer_apellido', 
  segundo_apellido= '$segundo_apellido', 
  correo_electronico= '$correo_electronico',
  rol_acceso= '$id_rol' where id_trabajador = $id_trabajador limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Actualizacion exitosa.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              history.back()</script>";
  }
}


?>