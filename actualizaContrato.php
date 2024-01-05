<?php

$id = $_POST['id'];
$texto = $_POST['texto'];
$columna = $_POST['columna'];

require'conexion.php';

    $sql = $conexion2->query("UPDATE listamedicamento set $columna = '$texto' where id_medicamento = '$id'");
    mysqli_close($conexion2);
    

?>