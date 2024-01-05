<?php

$id = $_POST['id'];
$texto = $_POST['texto'];
$columna = $_POST['columna'];

require'conexion.php';

    $sql = $conexion2->query("UPDATE donaciones set $columna = '$texto' where id_donacion = '$id'");
    mysqli_close($conexion2);

?>