<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<style>
	td {
		font-size: 12px;
		cursor: pointer;
	}

	td:hover {
		background-color: #BAC0C4;
	}
</style>

<body>
	<?php

	require "conexion.php";
	$sql = "SELECT COUNT(*) total FROM datosproveedor";
	$result = mysqli_query($conexion2, $sql);
	$fila = mysqli_fetch_assoc($result);
	$tabla = "";
	$query = "SELECT id_datoProveedor, datoPersonalProveedor, domicilioPersonal, telefono, correoElectronico,
numeroDeProcedimiento FROM datosproveedor group by datosproveedor.datoPersonalProveedor asc ";

	if (isset($_POST['alumnos'])) {
		$q = $conexion2->real_escape_string($_POST['alumnos']);
		$query = "SELECT id_datoProveedor,
    datoPersonalProveedor,
    domicilioPersonal,
    telefono,
    correoElectronico,
    numeroDeProcedimiento FROM datosproveedor where
		datosproveedor.id_datoProveedor LIKE '%" . $q . "%' OR
		datosproveedor.numeroProveedor LIKE '%" . $q . "%' OR
		datosproveedor.datoPersonalProveedor LIKE '%" . $q . "%' OR
		datosproveedor.domicilioPersonal LIKE '%" . $q . "%' OR
		datosproveedor.telefono LIKE '%" . $q . "%' OR
		datosproveedor.correoElectronico LIKE '%" . $q . "%' OR
		datosproveedor.numeroDeProcedimiento  LIKE '%" . $q . "%' group by id_datoProveedor";
	}

	$buscarAlumnos = mysqli_query($conexion2, $query);
	if (!empty($buscarAlumnos) and mysqli_num_rows($buscarAlumnos) > 0) {

	?>
		<strong style="float: left; margin-left: 0%; font-size: 20px; font-style: italic; margin-top: 0px;"><label>Total <input type="text" value="<?php echo $fila['total'] ?>"></label></strong>

		<table id="ghatable" class="table table-striped table-darkgray table-hover" cellspacing="0" width="100%">

			<tr style="background-color: #7C7C7C; color: white; font-size:12px; font-style: italic">
				<th>ID</th>
				<th>Nombre de proveedor</th>
				<th>Domicilio proveedor</th>
				<th>Telefono proveedor</th>
				<th>Correo electronico</th>
				<th>Editar</th>


			</tr>';
			<?php
			//include("funciones/funcionEliminaRegistr.php");
			//include("funciones/guardaCandidato.php");
			?>
			<?PHP
			while ($filaAlumnos = $buscarAlumnos->fetch_assoc()) {


				$clave = base64_encode($filaAlumnos['id_datoProveedor']);
			?>

				<tr>
					<td><?php echo $filaAlumnos['id_datoProveedor'] ?></td>
					<td><?php echo $filaAlumnos['datoPersonalProveedor'] ?></td>
					<td><?php echo $filaAlumnos['domicilioPersonal'] ?></td>
					<td><?php echo $filaAlumnos['telefono'] ?></td>
					<td><?php echo $filaAlumnos['correoElectronico'] ?></td>
					<td><a href="editarProveedor?clave='<?php echo $clave ?>'"><i id="guardar" class="lnr lnr-enter"></i></a></td>
					<!--<td><a  href="verProveedor?clave='.$clave.'" ><i id="ver" class="fas fa-binoculars"></i></a></td>
					<td><button type="button" id="elimina" value='.$filaAlumnos['id_datoProveedor'].'  style="background: none; border: 0; color:inherit"> <i id ="eliminar" class="fas fa-trash"></i></button></td>-->



				</tr>
		<?php

			}
		} else {
			echo "No se encontraron coincidencias con sus criterios de búsqueda.";
		}

		?>
		<script type="text/javascript">
			$("button").click(function() {
				var fired_button = $(this).val();
				var mensaje = confirm("¡El proveedor se eliminara de la base de datos! ¿Desea continuar?");

				if (mensaje == true) {
					window.location.href = "frontend/eliminaProveedor.php?id_datoProveedor=" + fired_button;
				} else {

					location.reload();
				}
			});
		</script>

</body>

</html>