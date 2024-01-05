<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script src="scripts/mandacurp.js"></script>

</head>

<body>


	<?php
	error_reporting(0);
	$ID_usuario = $_POST['ID_usuario'];

	require '../conexion.php';

	$sql_u = $conexion2->query("SELECT * FROM datosproveedor WHERE id_datoProveedor ='$ID_usuario'");

	$row_u = mysqli_fetch_assoc($sql_u);


	?>
	<input type="hidden" id="id" value="<?php echo $row_u['id_datoProveedor']; ?>">

	<form method="POST" action="redirect-update-contrato">
		<strong>Numero de proveedor</strong>
		<div class="input-group">

			<input name="id_proveedor" id="numeroContrato" type="text" class="form-control" value="<?php echo $row_u['id_datoProveedor']; ?>" readonly>
		</div>

		<strong>Datos del proveedor</strong>
		<div class="input-group">

			<textarea rows="2" name="datopersonalproveedor" id="numeroContrato" type="text" class="form-control" readonly><?php echo $row_u['datoPersonalProveedor']; ?></textarea>
		</div>
		<strong>Domicilio</strong>
		<div class="input-group">

			<textarea rows="4" name="domiciliopersonal" id="numeroContrato" type="text" class="form-control" readonly><?php echo $row_u['domicilioPersonal']; ?></textarea>
		</div>
		<strong>Telefono</strong>
		<div class="input-group">

			<input name="telefono" id="numeroContrato" type="text" class="form-control" value="<?php echo $row_u['telefono']; ?>" readonly>
		</div>
		<strong>Correo electronico</strong>
		<div class="input-group">

			<input name="correo" id="numeroContrato" type="text" class="form-control" value="<?php echo $row_u['correoElectronico']; ?>" readonly>
		</div>

		<strong>Tipo de contrato</strong>
		<div class="input-group">

			<select name="tipocontrato" class="form-control" required>
				<option disabled selected>Selecciona el año</option>
				<option value="intrahospitalaria 2023">Intrahospitalaria 2023</option>
				<option value="intrahospitalaria 2024">Intrahospitalaria 2024</option>
			</select>
		</div>
		<strong>Número de pedido</strong>
		<div class="input-group">

			<input name="numeroContrato" id="numeroContrato" type="text" class="form-control" required>
		</div>
		<strong>RFC</strong>
		<div class="input-group">

			<input name="rfc" type="text" class="form-control" readonly="readonly" value="<?php echo $row_u['rfc']; ?>">
		</div>
		<strong>N° de procedimiento</strong>
		<div class="input-group">

			<input name="procedimiento" type="text" class="form-control">
		</div>

		<strong>Dirección de internet</strong>
		<div class="input-group">

			<input name="direccion_internet" type="text" class="form-control" readonly="readonly" value="<?php echo $row_u['direccionInternet']; ?>">
		</div>

		<strong>Suficiencia presupuestaria</strong>
		<div class="input-group">

			<input name="suficiencia_presupuestaria" type="text" class="form-control" value="-" readonly>
		</div>

		<strong>Requisición</strong>
		<div class="input-group">

			<input name="requisicion" type="text" class="form-control" value="-" readonly>
		</div>

		<strong>Partida presupuestaria</strong>
		<div class="input-group">

			<input name="partida_presupuestaria" type="text" class="form-control" value="25301" readonly>
		</div>

		<strong>Fecha de firma</strong>
		<div class="input-group">

			<input name="fecha_firma" type="date" class="form-control" value="">
		</div>

		<strong>Vigencia del pedido, fecha de inicio</strong>
		<div class="input-group">

			<input name="vigencia_pedido_inicio" type="date" class="form-control" value="">
		</div>

		<strong>Vigencia del pedido, fecha de termino</strong>
		<div class="input-group">

			<input name="vigencia_pedido_termino" type="date" class="form-control" value="">
		</div><br>
		
		<input type="submit" name="editar" class="btn btn-info" style="float: left;" value="Continuar">


		</div>

		</div>
		</center>


	</form>
	<input type="submit" class="btn btn-danger" style="float: left; margin-left: 10px;" value="Cancelar" onClick="location.reload(false);">
</body>

</html>