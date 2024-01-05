<?php

$claveHraei = $_GET['Cjh'];
$claveUnicaContrato = $_GET['Rmg'];

if($claveHraei != '' || $claveUnicaContrato != ''){

    require '../conexion.php';

    $sql = $conexion2->query("DELETE FROM listamedicamento where CLAVEHRAEI = '$claveHraei' and numeroContrato = '$claveUnicaContrato'");

    if($sql != false){
        echo "<script>alert('Datos eliminados');</script>";
    }else{
        echo "<script>alert('Error');</script>";
    }
    echo "<script>window.history.back();</script>";
}