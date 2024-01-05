<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
</head>
<body>
<?php

$ID_usuario = $_POST['ID_usuario'];
 
require '../conexion.php';
$sql_u = mysql_query ("SELECT MAX(id_proveedor) AS id FROM proveedores");
$rows = mysql_fetch_array($sql_u);
$id_proveedores = $rows['id'];
$sql_u = mysql_query("SELECT * FROM listamedicamento WHERE id_medicamento = '$ID_usuario'");

$row_u = mysql_fetch_array($sql_u);
$id_medicamento = $row_u['id_medicamento'];
$nombre = $row_u['OFICIODEINFORMEDENOTIFICACION'];
$datos = $row_u['FECHADEOFICIO'];
$domicilio = $row_u['GRUPO'];
$telefono = $row_u['FUENTE'];
$email = $row_u['DEASIGNACION'];
$pedido = $row_u['PROVEEDOR'];
$procedimiento = $row_u['CLAVEHRAEI'];
$DESCRIPCION= $row_u['DESCRIPCION'];
$CLAVECUADROBASICO= $row_u['CLAVEDECUADROBASICO'];
$CUCOP= $row_u['CUCOP'];
$UNIDADDEMEDIDA= $row_u['UNIDADDEMEDIDA'];
$PRECIOUNITARIO= $row_u['PRECIOUNITARIO'];
$MINIMOCONSUMO= $row_u['MINIMOCONSUMO'];
$MAXIMOCONSUMO= $row_u['MAXIMOCONSUMO'];
$MINIMOPRECIO= $row_u['MINIMOPRECIO'];
$MAXIMOPRECIO= $row_u['MAXIMOPRECIO'];
$OTROPROVEEDOR= $row_u['otroLaboratorio'];
$id_datoProveedor= $row_u['id_datoProveedor'];

?>
<strong><h3> Datos del insumo </h3></strong>
<table class="table table-condensed">
<tr>
		<td> Clave de contrato : </td>
		<td> <?php echo $id_proveedores; ?> </td>
	</tr>
	<tr>
		<td> Oficio de informe de notificación : </td>
		<td> <?php echo $nombre; ?> </td>
	</tr>

	<tr>
		<td> Fecha de oficio : </td>
		<td> <?php echo $datos; ?></td>
	</tr>

	<tr>
		<td> Grupo : </td>
		<td> <?php echo $domicilio; ?></td>
	</tr>
	<tr>
		<td> Fuente : </td>
		<td> <?php echo $telefono; ?></td>
	</tr><tr>
		<td> Designación : </td>
		<td> <?php echo $email; ?></td>
	</tr><tr>
		<td> Proveedor  : </td>
		<td> <?php echo $pedido; ?></td>
	</tr><tr>
		<td> Clave HRAEI : </td>
		<td> <?php echo $procedimiento; ?></td>
	</tr><tr>
		<td> Descripción : </td>
		<td><?php echo $DESCRIPCION; ?></td>
	</tr><tr>
		<td> Clave cuadro basico : </td>
		<td> <?php echo $CLAVECUADROBASICO; ?></td>
	</tr><tr>
		<td> CUCOP : </td>
		<td> <?php echo $CUCOP; ?></td>
	</tr><tr>
		<td> Unidad de medida : </td>
		<td> <?php echo $UNIDADDEMEDIDA; ?></td>
	</tr><tr>
		<td> Precio unitario sin I.V.A : </td>
		<td> <?php echo $PRECIOUNITARIO; ?></td>
	</tr><tr>
		<td> Minimo consumo : </td>
		<td> <?php echo $MINIMOCONSUMO; ?></td>
	</tr><tr>
		<td> Maximo consumo : </td>
		<td> <?php echo $MAXIMOCONSUMO; ?></td>
	</tr><tr>
		<td> Precio minimo: </td>
		<td> <?php echo $MINIMOPRECIO; ?></td>
	</tr><tr>
		<td> Precio maximo : </td>
		<td> <?php echo $MAXIMOPRECIO; ?></td>
    </tr><tr>
		<td> Otro proveedor : </td>
		<td> <?php echo $OTROPROVEEDOR; ?></td>
	</tr><tr>
		<td> ID unico : </td>
		<td> <?php echo $id_datoProveedor; ?></td>
	</tr>
</table>
<a href="redirect-insert-objeto-contratacion?var=<?php echo $DESCRIPCION; ?>" class="btn btn-danger">Agregar</a>

<?php   

?>

</body>
</html>