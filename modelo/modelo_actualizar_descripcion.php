<?php
 require "../conexion.php";
 $id_3 = $_POST["id_3"];
 $nombre_3 = $_POST["nombre_3"];
 $columna3 = $_POST["columna3"];

 $consulta = $conexion2->query("UPDATE controlmedicamentoinventario set $columna3 = '$nombre_3' where id_controlMedicamento = '$id_3'");
    

 
 if(!$consulta  ){
     echo "<script>alert('error');</script>";
 }else{
    echo "<script>alert('good');</script>";
 }


?>