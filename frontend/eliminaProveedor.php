<?php 
 //error_reporting(0);

    require 'conexion.php';
    include 'funciones/funcionEliminaRegistr.php';

$id = base64_decode($_POST['id']);
delete('proveedores', 'id_proveedor', $id);  
delete('listamedicamento', 'id_contrato', $id);
delete('ordensuministro', 'claveContrato', $id);
delete('objetocontratacion', 'clave_objeto_contratacion', $id);

echo "<script>
swal({
   title: '¡Eliminado!',
   text: '',
   type: 'error',
   timer: 1000,
   showConfirmButton: false
      });
      </script>";	
?>