<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="iconos/js/all.min.js"></script>
	<link rel="stylesheet" href="iconos/css/all.min.css">
	<link rel="stylesheet" href="iconos/css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Document</title>

</head>
<body>
<?php

require "conexion.php";

$tabla="";
$query="SELECT id_proveedor, nombre_proveedor, domicilio_proveedor, rfc_proveedor, telefono_proveedor, direccion_internet, email_proveedor, numero_pedido, 
suficiencia_presupuestaria,
requisicion, 
partida_presupuestaria,
fecha_firma,
vigencia_pedido_inicio, 
vigencia_pedido_final FROM proveedores group by proveedores.id_proveedor asc ";

if(isset($_POST['alumnos']))
{
	$q=$conexion2->real_escape_string($_POST['alumnos']);
	$query="SELECT id_proveedor, nombre_proveedor, domicilio_proveedor, rfc_proveedor, telefono_proveedor, direccion_internet, email_proveedor, numero_pedido, suficiencia_presupuestaria, requisicion, partida_presupuestaria, fecha_firma, vigencia_pedido_inicio, vigencia_pedido_final FROM proveedores where
		proveedores.id_proveedor LIKE '%".$q."%' OR
		proveedores.nombre_proveedor LIKE '%".$q."%' OR
		proveedores.domicilio_proveedor LIKE '%".$q."%' OR
		proveedores.rfc_proveedor LIKE '%".$q."%' OR
		proveedores.telefono_proveedor LIKE '%".$q."%' OR
		proveedores.direccion_internet LIKE '%".$q."%' OR
		proveedores.email_proveedor LIKE '%".$q."%' OR
		proveedores.numero_pedido LIKE '%".$q."%' OR
		proveedores.suficiencia_presupuestaria LIKE '%".$q."%' OR
		proveedores.requisicion LIKE '%".$q."%' OR
		proveedores.partida_presupuestaria LIKE '%".$q."%' OR
		proveedores.fecha_firma LIKE '%".$q."%' OR
		proveedores.vigencia_pedido_inicio LIKE '%".$q."%' OR
		proveedores.vigencia_pedido_final LIKE '%".$q."%' group by id_proveedor asc";
}
//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	'<table class="table" style="background-color: #F5F5F5; border-radius: 10px;">
		<tr class="#" style="background-color:#7C7C7C; color: white;">
			<td>ID PROVEEDOR</td>
			<td>Nombre proveedor</td>
			<td>Domicilio proveedor</td>
			<td>RFC proveedor</td>
			<td>Telefono proveedor</td>
			<td>Direccion internet</td>
			<td>Email</td>
			<td>Numero pedido</td>
			<td>Suficiencia presupuestaria</td>
			<td>Requisicion</td>
			<td>Partida presupuestaria</td>
			<td>Fecha de firma</td>
			<td>Vigencia inicial del pedido</td>
			<td>Vigencia final del pedido</td>
			<td>Editar datos</td>
			<td>Ver contrato</td>
			
		</tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	

		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['id_proveedor'].'</td>
			<td>'.$filaAlumnos['nombre_proveedor'].'</td>
			<td>'.$filaAlumnos['domicilio_proveedor'].'</td>
			<td>'.$filaAlumnos['rfc_proveedor'].'</td>
			<td>'.$filaAlumnos['telefono_proveedor'].'</td>
			<td>'.$filaAlumnos['direccion_internet'].'</td>
			<td>'.$filaAlumnos['email_proveedor'].'</td>
			<td>'.$filaAlumnos['numero_pedido'].'</td>
			<td>'.$filaAlumnos['suficiencia_presupuestaria'].'</td>
			<td>'.$filaAlumnos['requisicion'].'</td>
			<td>'.$filaAlumnos['partida_presupuestaria'].'</td>
			<td>'.$filaAlumnos['fecha_firma'].'</td>
			<td>'.$filaAlumnos['vigencia_pedido_inicio'].'</td>
			<td>'.$filaAlumnos['vigencia_pedido_final'].'</td>
			<td><a  href="editarContrato.php?clave='.$filaAlumnos['id_proveedor'].'"><i id="guardar" class="fas fa-edit"></i></a></td>
			<td><a  href="verContrato.php?clave='.$filaAlumnos['id_proveedor'].'"><i id="ver" class="fas fa-file-pdf"></i></a></td>
			
			
			
		 </tr>';
		
	}

	$tabla.='</table>';
	$conexion2->close();
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;


?>


</body>
</html>