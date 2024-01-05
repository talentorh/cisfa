<html>
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<style>
  td {
    font-size: 12px;
  }

  th {
    font-size: 12px;
  }

  .ver-info {
    color: red;
  }
</style>
<?php
function formatMoney($number, $cents = 1)
{ // cents: 0=never, 1=if needed, 2=always
  if (is_numeric($number)) { // a number
    if (!$number) { // zero
      $money = ($cents == 2 ? '0.00' : '0'); // output zero
    } else { // value
      if (floor($number) == $number) { // whole number
        $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
      } else { // cents
        $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
      } // integer or decimal
    } // value
    return '$' . $money;
  } // numeric
} // formatMoney
require "conexion.php";
error_reporting(0);
$ID_usuario = $_POST['ID_usuario'];
$fecha = $_POST['year'];
if ($ID_usuario == '') {
} else {
  $tabla = "";
  $buscarAlumnos = $conexion2->query("SELECT id_ordenSuministro, 
claveHraei, 
cuadroBasico, 
cucop, 
descripcionDelBien, 
unidadMedida, 
minimo, 
maximo, 
cantidad, 
precioUnitario, 
importe, 
claveContrato, 
claveUnicaOrden FROM ordensuministro where claveHraei like '%$ID_usuario%' and fechacontrato = '$fecha' and farmacia = 'gratuita' or cuadroBasico like '%$ID_usuario%' and fechacontrato = '$fecha' and farmacia = 'gratuita' or descripcionDelBien like '%$ID_usuario%' and fechacontrato = '$fecha' and farmacia = 'gratuita'");

  if (!empty($buscarAlumnos) and mysqli_num_rows($buscarAlumnos) > 0) {
    $tabla .=

      '
      <table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
        
      <tr style="background-color: #7C7C7C; color: white; font-size:15px;">
			<th scope="col">Nombre proveedor</th>
			<th scope="col">Numero de contrato</th>
      <th scope="col">Numero de orden</th>
      <th scope="col">Fecha de orden</th>
			<th scope="col">Clave HRAEI</th>
			<th scope="col">Cuadro Basico</th>
			<th scope="col">CUCOP</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Unidad</th>
      <th scope="col">Minimo</th>
      <th scope="col">Maximo</th>
      <th scope="col">Solicitado en OS</th>
      <th scope="col">Faltante por entregar</th>
      <th scope="col">Costo</th>
      <th scope="col">Importe</th>
            
        </tr>';
    //include("funciones/funcionEliminaRegistr.php");
    //	include("funciones/guardaCandidato.php");

    while ($filaAlumnos = $buscarAlumnos->fetch_assoc()) {
      $orden = $filaAlumnos['claveUnicaOrden'];
      $orden2 = base64_encode($filaAlumnos['claveUnicaOrden']);
      $nombre = $filaAlumnos['claveContrato'];

      $clavehraei = $filaAlumnos['claveHraei'];
      $clavehraei2 = base64_encode($filaAlumnos['claveHraei']);
      $id_orden = $filaAlumnos['id_ordenSuministro'];
      $sql_i = "SELECT  numero_pedido, numero_proveedor from proveedores where id_proveedor = '$nombre'";
      $sq = mysqli_query($conexion2, $sql_i);
      $row = mysqli_fetch_assoc($sq);

      $id = $row['numero_proveedor'];

      $sql_m = "SELECT datoPersonalProveedor from datosproveedor where id_datoProveedor = $id";
      $sq_m = mysqli_query($conexion2, $sql_m);
      $row_m = mysqli_fetch_assoc($sq_m);

      $sql = "SELECT cantidad, pzasEntrego, pzasEntrego2, pzasEntrego3, pzasEntrego4, pzasEntrego5 from ordensuministro where claveHraei = '$clavehraei' and id_ordenSuministro = '$id_orden' ";
      $sq_i = mysqli_query($conexion2, $sql);
      $rows = mysqli_fetch_assoc($sq_i);

      $pzas1 = $rows['pzasEntrego'];
      $pzas2 = $rows['pzasEntrego2'];
      $pzas3 = $rows['pzasEntrego3'];
      $pzas4 = $rows['pzasEntrego4'];
      $pzas5 = $rows['pzasEntrego5'];
      $monto = $rows['cantidad'];

      $total1 = $pzas1 + $pzas2 + $pzas3 + $pzas4 + $pzas5;

      $totalGral = $monto - $total1;
      $respuesta;
      $consult = $conexion2->query("SELECT fechaRegistro FROM numeroorden where claveUnicaContrato = '$orden'");
      $row_r = mysqli_fetch_assoc($consult);
      $fechaOrden = $row_r['fechaRegistro'];

      if ($total1 >= $monto) {
        $respuesta = 0;
      } elseif ($total1 < $monto) {
        $respuesta = $totalGral;
      }
      $tabla .=
        '  
    
<tr>
		<td>' . $row_m['datoPersonalProveedor'] . '</td>
		<td>' . $row['numero_pedido'] . '</td>
    <td>' . $filaAlumnos['claveUnicaOrden'] . '</td>
    <td>' . $fechaOrden . '</td>
		<td id=' . $orden2 . ' class="ver-info" title="Click para ver información">' . $filaAlumnos['claveHraei'] . '</td>
		<td>' . $filaAlumnos['cuadroBasico'] . '</td>
		<td>' . $filaAlumnos['cucop'] . '</td>
    <td>' . $filaAlumnos['descripcionDelBien'] . '</td>
    <td>' . $filaAlumnos['unidadMedida'] . '</td>
    <td>' . $filaAlumnos['minimo'] . '</td>
    <td>' . $filaAlumnos['maximo'] . '</td>
    <td>' . $filaAlumnos['cantidad'] . '</td>
    <td id=' . $orden2 . ' class="ver-info" title="Click para ver información" style="color: red;">' . $respuesta . '</td>
    <td>' . formatMoney($filaAlumnos['precioUnitario']) . '</td>
    <td>' . formatMoney($filaAlumnos['importe']) . '</td>
</tr>
        ';
    }

    $tabla .= '</table>';

    $conexion2->close();
  } else {
  }


  echo $tabla;
}

?>
<script>
  $(function() {

    $('table').on('click', '.ver-info', function() {

      var clave = $(this).prop('id');

      window.open('seguimientoEntregaFG?claveEntrega=' + clave);
    });
  });
</script>

</html>