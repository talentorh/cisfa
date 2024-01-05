<?php session_start();
    require 'conexion.php';
    
    if(isset($_POST['almacenarFolioPenalizacion'])){
        $folio = $_POST['numOrdenOficio'];
       // $fechaOrden = $_POST['fechaOrden'];
    }
    $sql_s = $conexion2->query("SELECT * from oficiospenalizcion where numOficioPenalizacion = '$folio'");
    $rw = mysqli_fetch_assoc($sql_s);
    
    $numeroOrden = $rw['numOficioPenalizacion'];
    
    if($numeroOrden == ''){
    
  $sql = $conexion2->query("INSERT into oficiospenalizcion(id_oficioPenalizacion, numOficioPenalizacion, estatus, claveContrato, fechaRegistroPenalizacion, montoIncumplimiento, claveContratoPrincipal) values(null, '$folio', 0, '0', '0000-00-00', '0', 0)");
  
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