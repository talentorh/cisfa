<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
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
$query="SELECT id_trabajador, nombre_trabajador, primer_apellido, segundo_apellido, correo_electronico
 FROM login ";

if(isset($_POST['alumnos']))
{
	$q=$conexion2->real_escape_string($_POST['alumnos']);
	$query="SELECT id_trabajador, nombre_trabajador, primer_apellido, segundo_apellido, correo_electronico FROM login where
		login.nombre_trabajador LIKE '%".$q."%' OR
		login.primer_apellido LIKE '%".$q."%' OR
		login.segundo_apellido LIKE '%".$q."%' OR
		login.correo_electronico LIKE '%".$q."%'";
}
//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
'<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Cuentas de usuarios</h3>
    <div class="card-body">
      <div id="table" class="table-editable" style="width:60%; float:left; margin-left:5%; margin-top: 30px">
        <table class="table table-striped table-darkgray">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido paterno</th>
              <th scope="col">Apellido materno</th>
              <th scope="col">Correo electronico</th>
              <th scope="col">Cambiar rol de usuario</th>
              <th scope="col">Aplicar cambios</th>
              <th scope="col">Eliminar cuenta</th>
            </tr>
          </thead>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	

        $tabla.=
        
    '
    <form method="POST" action="editarUsuario.php?id_trabajador='.$filaAlumnos['id_trabajador'].'">
    <tbody>
        <tr>
            <td>'.$filaAlumnos['id_trabajador'].'</td>
			<td><input type="text" name="nombre_trabajador" value='.$filaAlumnos['nombre_trabajador'].'></td>
			<td><input type="text" name="primer_apellido" value='.$filaAlumnos['primer_apellido'].'></td>
			<td><input type="text" name="segundo_apellido" value='.$filaAlumnos['segundo_apellido'].'></td>
            <td><input type="text" name="correo_electronico" value='.$filaAlumnos['correo_electronico'].'></td>
            <td><div align="center"> 
            <select name="id_rol" id="rol" class="form-control" style="width:240px; height: 37px;" >
            <option value="">-Seleccione-</option>
                    <option  value="1">Todos los privilegios</option>
                    <option  value="2">Cargar, Editar y Consultar</option>
                    <option  value="3">Consultar y Editar</option>
                </select>
            </div></td>
            
            <td><input type="submit" name="editar" value="Guardar" ></td>
            </form>
			<td><button id="elimina" value='.$filaAlumnos['id_trabajador'].'  style="background: none; border: 0; color:inherit"> <i id ="eliminar" class="fas fa-trash"></i></button></td>
			
			
		 </tr>
  
      </tbody>
     
  </div>
</div>
</div>';
		
	}

	$tabla.='</table>';
	$conexion2->close();
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;

?>
<script type="text/javascript">
$("button").click(function() {
   var fired_button = $(this).val();
   var mensaje = confirm("¡El usuario sera borrado del sistema! ¿Desea continuar?");

if(mensaje == true){
	window.location.href="frontend/eliminarCuentaUsuario.php?id_trabajador="+fired_button;
}else{
	
	location.reload();
}
});

</script>

</body>
</html>