<?php
if (isset($_POST['editar'])) {
  error_reporting(0);
  require 'conexion.php';
  $numeroContrato = $_POST['numeroContrato'];
  $suficiencia_presupuestaria = $_POST['suficiencia_presupuestaria'];
  $requisicion = $_POST['requisicion'];
  $partida_presupuestaria = $_POST['partida_presupuestaria'];
  $fecha_firma = $_POST['fecha_firma'];
  $vigencia_pedido_inicio = $_POST['vigencia_pedido_inicio'];
  $vigencia_pedido_termino = $_POST['vigencia_pedido_termino'];
  $id_proveedor = $_POST['id_proveedor'];
  $procedimiento = $_POST['procedimiento'];
  //$procedimiento = 'n';
  $anio = substr($_POST['tipocontrato'], -4);
  $tipocontrato = $_POST['tipocontrato'];
}
$sql = $conexion->prepare("INSERT into proveedores(numero_pedido, suficiencia_presupuestaria, requisicion, partida_presupuestaria, fecha_firma, vigencia_pedido_inicio, vigencia_pedido_final, numero_proveedor, numero_procedimiento,
      year, tipoFarmacia) values(:numero_pedido, :suficiencia_presupuestaria, :requisicion, :partida_presupuestaria, :fecha_firma, :vigencia_pedido_inicio, :vigencia_pedido_final, :numero_proveedor, :numero_procedimiento,
      :year, :tipoFarmacia)");

$sql->bindParam(':numero_pedido', $numeroContrato, PDO::PARAM_STR);
$sql->bindParam(':suficiencia_presupuestaria', $suficiencia_presupuestaria, PDO::PARAM_STR);
$sql->bindParam(':requisicion', $requisicion, PDO::PARAM_STR);
$sql->bindParam(':partida_presupuestaria', $partida_presupuestaria, PDO::PARAM_STR);
$sql->bindParam(':fecha_firma', $fecha_firma, PDO::PARAM_STR);
$sql->bindParam(':vigencia_pedido_inicio', $vigencia_pedido_inicio, PDO::PARAM_STR);
$sql->bindParam(':vigencia_pedido_final', $vigencia_pedido_termino, PDO::PARAM_STR);
$sql->bindParam(':numero_proveedor', $id_proveedor, PDO::PARAM_INT);
$sql->bindParam(':numero_procedimiento', $procedimiento, PDO::PARAM_STR);
$sql->bindParam(':year', $anio, PDO::PARAM_STR);
$sql->bindParam(':tipoFarmacia', $tipocontrato, PDO::PARAM_STR);
$sql->execute();


if ($sql != false) {

  echo "<script>alert('Contrato cargado');
          window.history.back();</script>";
  //header("location: redirect-objetoContratacion?var=$nombre_proveedor&&var2=$id_proveedor&&contPed=$numeroContrato");

} else {
  echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              window.history.back();</script>";
}
