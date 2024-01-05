<?php

$id = $_POST['id'];
$texto = $_POST['texto'];
$columna = $_POST['columna'];

require'conexion.php';

    $sql = $conexion2->query("UPDATE facturas set $columna = '$texto' where id_factura = $id");
    //mysqli_close($conexion2);

?>