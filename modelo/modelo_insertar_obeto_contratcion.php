<!DOCTYPE html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
 
 
$id_datoProveedor = $_GET['valor'];
$id_contrato = $_GET['valor2'];

require '../conexion.php';
//$sql_u = mysql_query ("SELECT MAX(id_proveedor) AS id FROM proveedores");
//$rows = mysql_fetch_array($sql_u);
//$id_proveedores = $rows['id'];
$sql_u = $conexion2->query("SELECT * FROM listamedicamento WHERE id_medicamento =$id_datoProveedor");

$row_u = mysqli_fetch_array($sql_u);
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
$cantidad= $row_u['cantidad'];
$numContrato = $row_u['numeroContrato'];

$statement = $conexion->prepare('INSERT INTO objetocontratacion(id_objetoContratacion, 
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
clave_objeto_contratacion,
cantidadConsumida,
claveUnicaOrden)
values(null,
    :OFICIODEINFORMEDENOTIFICACION, 
:FECHADEOFICIO, 
:GRUPO, 
:FUENTE, 
:DEASIGNACION, 
:PROVEEDOR, 
:CLAVEHRAEI, 
:DESCRIPCION, 
:CLAVEDECUADROBASICO, 
:CUCOP, 
:UNIDADDEMEDIDA, 
:PRECIOUNITARIO, 
:MINIMOCONSUMO, 
:MAXIMOCONSUMO, 
:MINIMOPRECIO, 
:MAXIMOPRECIO, 
:otroLaboratorio, 
:clave_objeto_contratacion,
:cantidadConsumida,
:claveUnicaOrden
)');
$statement->execute(array(
            
    ':OFICIODEINFORMEDENOTIFICACION' =>$nombre, 
':FECHADEOFICIO' =>$datos, 
':GRUPO' =>$domicilio, 
':FUENTE' =>$telefono, 
':DEASIGNACION' =>$email, 
':PROVEEDOR' =>$pedido, 
':CLAVEHRAEI' =>$procedimiento, 
':DESCRIPCION' =>$DESCRIPCION, 
':CLAVEDECUADROBASICO' =>$CLAVECUADROBASICO, 
':CUCOP' =>$CUCOP, 
':UNIDADDEMEDIDA' =>$UNIDADDEMEDIDA, 
':PRECIOUNITARIO' =>$PRECIOUNITARIO, 
':MINIMOCONSUMO' =>$MINIMOCONSUMO, 
':MAXIMOCONSUMO' =>$MAXIMOCONSUMO, 
':MINIMOPRECIO' =>$MINIMOPRECIO, 
':MAXIMOPRECIO' =>$MAXIMOPRECIO, 
':otroLaboratorio' =>$OTROPROVEEDOR, 
':clave_objeto_contratacion' =>$id_contrato,
':cantidadConsumida' =>$cantidad,
':claveUnicaOrden' =>$numContrato

  
));

if($statement != false) {
    echo "<script>
    swal({
       title: '¡GOOD!',
       text: '',
       type: 'succes',
     });
   </script>";
}else{
   echo "<script>alert('Error inesperado, intente nuevamente');</script>";
}

echo "<script languaje='javascript' type='text/javascript'>window.history.back();</script>";
?>
</body>
</html>