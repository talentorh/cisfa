<?php
require '../conexion.php';
  
  if ($_REQUEST['eliminar']) {
    
   $id = $_REQUEST['eliminar'];
   $query = "DELETE FROM proveedores WHERE id_proveedor=:id";
   $query2 = "DELETE FROM objetocontratacion WHERE clave_objeto_contratacion=:id";
   $stmt = $conexion->prepare( $query );
   $stmt->execute(array(':id'=>$id));
   $stmt2 = $conexion->prepare( $query2 );
   $stmt->execute(array(':id'=>$id));
    
   if ($stmt || $stmt2 == true) {
    echo "¡El registro ha sido eliminado!";
    
  }else{
      echo "Ha ocurrido un error";
  }
}
  ?>