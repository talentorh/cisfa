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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	
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
$val = $_POST['ID_usuario'];

$tabla="";
$query="SELECT id_controlMedicamento, 
descripcion, 
claveHraei, 
cuadroBasico, 
cucop, 
unidadMedida, 
cantidadExistencia,
ubicacion
FROM controlmedicamentoinventario where clavehraei = '$val' and ubicacion = 'BODEGA'";


$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"  >
        
            <tr style="background-color: #7C7C7C; color: white; font-size:15px; font-style: italic">

            <th class="wide">Descripcion</th>
            <th class="wide2">Clave HRAEI</th>
            <th class="wide2">Clave cuadro basico</th>
            <th class="wide2">CUCOP</th>
            <th class="wide2">Unidad de medida</th>
            <th class="wide3">Total PZAS</th>
            <th class="wide3">Ubicacion</th>
            <th class="wide3">Entradas</th>
            <th class="wide3">Aplicar</th>
            <th class="wide3">Cancelar</th>
         
         
			
        </tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	$clave = base64_encode($filaAlumnos['id_controlMedicamento']);
		
		$tabla.=
        '  
        <tr>
            <td id="descripcion" name="" data-id_descripcion='.$filaAlumnos['id_controlMedicamento'].' contenteditable>'.$filaAlumnos['descripcion'].' </td>
            <td>'.$filaAlumnos['claveHraei'].'</td>
            <td>'.$filaAlumnos['cuadroBasico'].'</td>
            <td>'.$filaAlumnos['cucop'].'</td>
            <td>'.$filaAlumnos['unidadMedida'].'</td>
            <td>'.$filaAlumnos['cantidadExistencia'].'</td>
            <td>'.$filaAlumnos['ubicacion'].'</td>
            <td id="id_entrada" name="entrada" data-id_entrada='.$filaAlumnos['id_controlMedicamento'].' contenteditable> </td>
            <td><input type="submit" onclick="window.location.reload();" class="btn btn-warning" value="Aplicar"></td>
            <td><input type="submit" onclick="window.location.reload();" class="btn btn-danger" value="Cancelar"></td>
			
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
<script>
 $(document).on("blur", "#descripcion", function(){

let id_3= $(this).data("id_descripcion");
let nombre_3 = $(this).text();
actualizar_descripcion(id_3, nombre_3, "descripcion");

});

 $(document).on("blur", "#id_entrada", function(){

let id_entrada= $(this).data("id_entrada");
let cantidad_entrada = $(this).text();

$.ajax({
url: 'modelo/modelo_actualizar_inventario.php',
method: 'POST',
data: {id_entrada:id_entrada, cantidad_entrada:cantidad_entrada},
succes: function(data){

        }

    })
});


function actualizar_descripcion(id_3, nombre_3, columna3){

$.ajax({
url: 'modelo/modelo_actualizar_descripcion.php',
method: 'POST',
data: {id_3:id_3, nombre_3:nombre_3, columna3:columna3},
succes: function(data){

}

})

}
</script>


   </body>
   </html>
