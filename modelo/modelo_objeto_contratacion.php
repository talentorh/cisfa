<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <title>Document</title>
</head>
<body>
<table class="table table-bordered">
	<tr>
		<th> # </th>
		<th> Oficio de notificación</th>
		<th> Fecha de oficio</th>
		<th> Grupo</th>
        <th> Fuente</th>
        <th> Designación</th>
        <th> Proveedor</th>
        <th> Otro laboratorio</th>
        <th> Clave HRAEI</th>
        <th> Descripción</th>
        <th> Clave de cuadro basico</th>
        <th> CUCOP</th>
        <th> Unidad de medida</th>
        <th> Precio Unitario</th>
        <th> Minimo consumo</th>
        <th> Maximo consumo</th>
        <th> Minimo precio</th>
		<th> Maximo precio</th>
        <th> Eliminar</th>
	</tr>
<?php
$nombre = $_POST['cucop'];
require '../conexion.php';

$sql = $conexion2->query("SELECT * FROM objetocontratacion where clave_objeto_contratacion = $nombre");
$i =0;
$var = 0;
$var2 = 0;
while ($row = mysqli_fetch_array($sql)) {
    $i++;
    // FUENTE, DEASIGNACION, PROVEEDOR, CLAVEHRAEI, DESCRIPCION, CLAVEDECUADROBASICO, CUCOP, UNIDADDEMEDIDA, PRECIOUNITARIO, MINIMOCONSUMO, MAXIMOCONSUMO, MINIMOPRECIO, MAXIMOPRECIO, otroLaboratorio, clave_objeto_contratacion
	$ID_usuario = $row['id_objetoContratacion'];
	$nombre = $row['OFICIODEINFORMEDENOTIFICACION'];
	$fecha = $row['FECHADEOFICIO'];
    $grupo = $row['GRUPO'];
    $fuente = $row['FUENTE'];
    $designacion = $row['DEASIGNACION'];
    $proveedor = $row['PROVEEDOR'];
    $otroLaboratorio = $row['otroLaboratorio'];
    $clavehraei = $row['CLAVEHRAEI'];
    $descripcion = $row['DESCRIPCION'];
    $cuadrobasico = $row['CLAVEDECUADROBASICO'];
    $cucop = $row['CUCOP'];
    $unidadmedida = $row['UNIDADDEMEDIDA'];
    $precio = $row['PRECIOUNITARIO'];
    $minimoconsumo = $row['MINIMOCONSUMO'];
    $maximoconsumo = $row['MAXIMOCONSUMO'];
    $var += $minimoprecio = $row['MINIMOPRECIO'];
    $var2 += $maximoprecio = $row['MAXIMOPRECIO'];
	?>
     <tr>
     	<td> <?php echo $i; ?></td>
     	<td> <?php echo $nombre; ?></td>
     	<td> <?php echo $fecha; ?></td>
     	<td> <?php echo $grupo; ?></td>
         <td> <?php echo $fuente; ?></td>
         <td> <?php echo $designacion; ?></td>
         <td> <?php echo $proveedor; ?></td>
         <td> <?php echo $otroLaboratorio ?> </td>
         <td> <?php echo $clavehraei; ?></td>
         <td> <?php echo $descripcion; ?></td>
         <td> <?php echo $cuadrobasico; ?></td>
         <td> <?php echo $cucop; ?></td>
         <td> <?php echo $unidadmedida; ?></td>
         <td> <?php echo '$',$precio; ?></td>
         <td> <?php echo $minimoconsumo; ?></td>
         <td> <?php echo $maximoconsumo; ?></td>
         <td> <?php echo '$',$minimoprecio; ?></td>
         <td> <?php echo '$',$maximoprecio; ?></td>

     	<td class="col-lg-1"> 
     		 <!--
     		 <button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $ID_usuario; ?>');"> Editar </button>
     		 -->
     		 <button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar_dato('<?php echo $cucop; ?>');"> Eliminar </button>
     	</td>
     </tr>
	<?php
}

?>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td><label >Total</label></td>
<td><input type="text" value="<?php echo '$',$var; ?>" readonly="readonly"></td>
<td><input type="text" value="<?php echo '$',$var2; ?>" readonly="readonly"></td>
</table>
</body>
</html>