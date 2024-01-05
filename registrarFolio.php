<?php session_start();
    require 'conexion.php';
    
    if(isset($_POST['almacenarFolio'])){
        $id = $_POST['id_proveedor'];
        $folio = $_POST['numOrden'];
       // $fechaOrden = $_POST['fechaOrden'];
    }
    $sql_s = $conexion2->query("SELECT * from numeroorden where claveUnicaContrato = '$folio'");
    $rw = mysqli_fetch_assoc($sql_s);
    
    $numeroOrden = $rw['claveUnicaContrato'];
    
    if($numeroOrden == ''){
    
  $sql = $conexion2->query("INSERT into numeroorden(id_orden, claveUnicaContrato, estatus, id_contrato, totalOrden, fechaRegistro, fechaEntrego, cumplio, referenciaCorta, diasPenalizados, activarFolio, tipoFarmacia) values(null, '$folio', 0, $id, '0', '0000-00-00', '0000-00-00', 'no', 'OS', 0, 1, 'intrahospitalaria')");
  
  if($sql != false){
      echo "<script>alert('Registro exitoso')</script>";
  }else{
      echo "<script>alert('Error al registrar')</script>";
  }
echo "<script>window.history.back();</script>";

}else{
    echo "<script>alert('Este número de folio ya se encuentra registrado')</script>";
}
echo "<script>window.history.back();</script>";
?>