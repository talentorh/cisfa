<?php
 require "../conexion.php";
 date_default_timezone_set("America/Mexico_City");
 $id_salida = $_POST["id_salida"];
 $cantidad_salida = $_POST["cantidad_salida"];
 $actual_dia = date("Y-m-d H:i:s");
 $sql = $conexion2->query("SELECT cantidadExistencia, id_controlMedicamento from controlmedicamentoinventario where id_controlMedicamento = '$id_salida'");
 $result=mysqli_fetch_assoc($sql);

 $total = $result['cantidadExistencia'];
 $id = $result['id_controlMedicamento'];

 $sum = $total - $cantidad_salida;

 $consulta = $conexion2->query("UPDATE controlmedicamentoinventario set cantidadExistencia = '$sum' where id_controlMedicamento = '$id_salida'");
    
    
    
 $query = $conexion2->query("SELECT claveHraei, ubicacion, cantidadExistencia from controlmedicamentoinventario where id_controlMedicamento = '$id_salida'");
    $result_s = mysqli_fetch_assoc($query);
    
    $clavehraei = $result_s['claveHraei'];
    $ubicacion = $result_s['ubicacion'];
   
    
     $query = $conexion->query("INSERT INTO seguimiento (id_seguimiento, cantidad, movimiento, fecha, clavehraei, ubicacion) values (null, '$cantidad_salida', 'salida', '$actual_dia', '$clavehraei', '$ubicacion')");

 /*
    $sql_i = $conexion2->query("SELECT claveMedicamento, sum(consumoMedicamento) as TotalConsumo from consumoRealMedicamento  where claveMedicamento = '$id' and claveContrato = '$fired2' group by claveMedicamento");
    $row = mysqli_fetch_assoc($sql_i); 
    $sum = $row['TotalConsumo'];
    $name = $row['claveMedicamento'];

    $sql ="UPDATE ordenSuministro set consumoReal = $sum where claveHraei = '$name' and claveContrato ='$fired2'";
    $row= mysqli_query($conexion2, $sql);
    $sql ="UPDATE objetocontratacion set cantidadConsumida = $sum where CLAVEHRAEI = '$name' and claveUnicaOrden = '$fired3'";
    $row= mysqli_query($conexion2, $sql);
    $sql ="UPDATE listamedicamento set cantidad = $sum where CLAVEHRAEI = '$name' and numeroContrato ='$fired3'";
    $row= mysqli_query($conexion2, $sql);

*/

 if(!$row  ){
     echo "<script>alert('error');</script>";
 }else{
    echo "<script>alert('good');</script>";
 }


?>