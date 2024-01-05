<?php
 require "../conexion.php";
 $id = $_POST["id"];
 $texto = $_POST["texto"];
 $columna = $_POST["columna"];
 


 $consulta = "UPDATE numeroorden set $columna ='$texto' where claveUnicaContrato = '$id'";
    $row = mysqli_query($conexion2, $consulta);

 if(!$row ){
     echo "<script>alert('error');</script>";
 }else{
    echo "<script>alert('good');</script>";
 }


?>