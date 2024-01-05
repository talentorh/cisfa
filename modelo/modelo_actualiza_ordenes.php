<?php
 require "../conexion.php";
    $id = $_POST['id'];
    $texto = $_POST['texto'];
    $columna = $_POST['columna'];

$query = $conexion2->query("SELECT fechaRegistro from numeroorden where claveUnicaContrato = '$id'");
    $row = mysqli_fetch_assoc($query);
$valida = $row['fechaRegistro'];

if($valida != $texto){
 $consulta = $conexion2->query("UPDATE numeroorden set $columna = '$texto' where claveUnicaContrato = '$id'");


 if($consulta != false ){
    echo "<script>swal({
  title: 'Good job!',
  text: 'Fecha Actualizada!',
  icon: 'success',
});</script>";
}else{
   echo "<script>swal({
  title: 'Good job!',
  text: 'Error al actualizar fecha!',
  icon: 'error',
});</script>"; 
}
}else{
    
}
?>