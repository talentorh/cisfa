<?php
//$var = $_GET['id'];
require 'conexion.php';

//Consulta
$sql = "SELECT * from ordensuministro where fechacontrato = '2023' and pzasEntrego != 0 and vigente = 0 and farmacia = 'gratuita'";

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$buscarAlumnos = mysqli_query($conexion2, $sql);




$salida .=

  '<th>Numero de orden</th>
  <th>Clave HRAEI</th>
  <th>CNIS</th>
  <th>CUCOP</th>
  <th>Descripcion</th>
  <th>Cantidad</th>
  <th>Precio Unitario</th>
  <th>Importe</th>
  <th>Fecha 1</th>
  <th>Pzas 1</th>
  <th>Fecha 2</th>
  <th>Pzas 2</th>
  <th>Fecha 3</th>
  <th>Pzas 3</th>
  <th>Fecha 4</th>
  <th>Pzas 4</th>
  <th>Fecha 5</th>
  <th>Pzas 5</th>
  <th>Fecha de orden</th>
  <th>Numero de contrato</th>';




while ($rs = $buscarAlumnos->fetch_assoc()) { 

  $salida .= "<tr>
    <td>" . mb_convert_encoding($rs['claveUnicaOrden'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['claveHraei'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['cuadroBasico'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['cucop'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['descripcionDelBien'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['cantidad'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['precioUnitario'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['importe'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaParcial'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaParcial2'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego2'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego3'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego3'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego4'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego4'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego5'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego5'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaorden'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['numerodecontrato'], 'ISO-8859-1', 'UTF-8') . "</td>
    </tr>";
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporteEntregadoOs_" . time() . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
