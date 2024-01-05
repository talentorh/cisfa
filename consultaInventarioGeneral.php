<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
	<link rel="stylesheet" href="iconos/css/all.css?n=1">
	<link rel="stylesheet" href="css/style.css?n=1">
	<script src="iconos/js/all.min.js"></script>	
	
	
</head>

<body>
<style>
table {
  table-layout: fixed;
  border-collapse: collapse;
  width: 100%;
}
td {
  border: 0px solid #000;
}
.wide {
  width: 450px;
}
.wide2 {
  width: 150px;
}
.wide3 {
  width: 100px;
}
</style>
<?php
require "conexion.php";
error_reporting(0);

$tabla="";
$query="SELECT id_controlMedicamento, 
descripcion, 
claveHraei, 
cuadroBasico, 
cucop, 
unidadMedida, 
cantidadExistencia,
ubicacion
FROM controlmedicamentoinventario where ubicacion = 'BODEGA'";


$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0"  >
        
            <tr style="background-color: #7C7C7C; color: white; font-size:15px; font-style: italic">
            <th class="wide">Descripcion</th>
            <th class="wide2">Clave HRAEI</th>
            <th class="wide2">Clave cuadro basico</th>
            <th class="wide2">CUCOP</th>
            <th class="wide3">Total PZAS</th>
            <th class="wide3">Ubicacion</th>
        
        </tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	
		
		$tabla.=
        '  
    <tr style="background-color: ; color: black; font-size:15px; font-style: italic">
             
            <td class="wide">'.$filaAlumnos['descripcion'].' </td>
            <td>'.$filaAlumnos['claveHraei'].'</td>
            <td>'.$filaAlumnos['cuadroBasico'].'</td>
            <td>'.$filaAlumnos['cucop'].'</td>
            <td>'.$filaAlumnos['cantidadExistencia'].'</td>
            <td>'.$filaAlumnos['ubicacion'].'</td>
            
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