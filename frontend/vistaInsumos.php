<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php 

error_reporting(0);

$clave = $_GET['clave'];
echo $clave;
require 'conexion.php';
$sql = "SELECT id_objetoContratacion, 
OFICIODEINFORMEDENOTIFICACION, 
FECHADEOFICIO, 
GRUPO, 
FUENTE, 
DEASIGNACION, 
PROVEEDOR, 
CLAVEHRAEI, 
DESCRIPCION, 
CLAVEDECUADROBASICO, 
CUCOP, 
UNIDADDEMEDIDA, 
PRECIOUNITARIO, 
MINIMOCONSUMO, 
MAXIMOCONSUMO, 
MINIMOPRECIO, 
MAXIMOPRECIO, 
otroLaboratorio, 
clave_objeto_contratacion from objetocontratacion where clave_objeto_contratacion = $clave";
$row2=mysqli_query($conexion2, $sql);

if(!empty($row2) AND mysqli_num_rows($row2)>0)
{
    $tabla.=   
'

<div class="contrato-nuevo">
        <div class="cabecera-contrato">
            <div class="imagen1"></div>
        <!--
            <div class="hospital-text">
                <h5>2020 "AÑO DE LEONA VICARIO, BENEMÉRITA MADRE DE LA PATRIA"</h5><br>
                <h6>CONCENTRADO PROVEEDORES</h5>
                
            </div>
        -->
            <div class="descripcion">
            <h5>Hospital Regional de Alta Especialidad de Ixtapaluca </h5><br>
            <h6>Dirección de Administración y Finanzas</h6><br>
            <h6>Subdirección de Recursos Materiales</h6></div>
        </div>

    <div class="content-table">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"> # </th>
		<th scope="col"> Oficio de notificación</th>
		<th scope="col"> Fecha de oficio</th>
		<th scope="col"> Grupo</th>
        <th scope="col"> Fuente</th>
        <th scope="col"> Designación</th>
        <th scope="col"> Proveedor</th>
        <th scope="col"> Clave HRAEI</th>
        <th scope="col"> Descripción</th>
        <th scope="col"> Clave de cuadro basico</th>
        <th scope="col"> CUCOP</th>
        <th scope="col"> Unidad de medida</th>
        <th scope="col"> Precio Unitario</th>
        <th scope="col"> Minimo consumo</th>
        <th scope="col"> Maximo consumo</th>
        <th scope="col"> Minimo precio</th>
		<th scope="col"> Maximo precio</th>
        <th scope="col"> Otro laboratorio</th>
        <th scope="col"> Eliminar</th>
    </tr>
  </thead>';
  while($row2->fetch_assoc())
	{
        $tabla.=  
        '
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>'.$row2['id_objetoContratacion'].'</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
';
    }
}
echo $tabla;
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>