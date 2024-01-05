<?php

$ID_usuario = $_POST['ID_usuario'];

require '../conector/conexion.php';

$sql_u = mysql_query("SELECT * FROM datosproveedor WHERE id_datoProveedor ='$ID_usuario'");

$row_u = mysql_fetch_array($sql_u);

$nombre = $row_u['datoPersonalProveedor'];
$apellido = $row_u['domicilioPersonal'];
$edad = $row_u['telefono'];
?>
<h4> Datos del usuario para examinar </h4>
<table class="table table-condensed">
	<tr>
		<td> Nombre : </td>
		<td> <?php echo $nombre; ?></td>
	</tr>

	<tr>
		<td> Apellidos : </td>
		<td> <?php echo $apellido; ?></td>
	</tr>

	<tr>
		<td> Edad : </td>
		<td> <?php echo $edad; ?></td>
	</tr>
</table>
<?php

?>