<?php
 require "../conexion.php";
 date_default_timezone_set("America/Mexico_City");
 $id_entrada = $_POST["id_entrada"];
 $cantidad_entrada = $_POST["cantidad_entrada"];
 $actual_dia = date("Y-m-d H:i:s");
 $sql = $conexion2->query("SELECT cantidadExistencia from controlmedicamentoinventario where id_controlMedicamento = '$id_entrada'");
 $result=mysqli_fetch_assoc($sql);

 $total = $result['cantidadExistencia'];

 $sum = $total + $cantidad_entrada;

 $consulta = $conexion2->query("UPDATE controlmedicamentoinventario set cantidadExistencia = '$sum' where id_controlMedicamento = '$id_entrada'");
    
    
$query = $conexion2->query("SELECT claveHraei, ubicacion from controlmedicamentoinventario where id_controlMedicamento = '$id_entrada'");
$result = mysqli_fetch_assoc($query);

$clavehraei = $result['claveHraei'];
$ubicacion = $result['ubicacion'];

 $query = $conexion->query("INSERT INTO seguimiento (id_seguimiento, cantidad, movimiento, fecha, clavehraei, ubicacion) values (null, '$cantidad_entrada', 'entrada', '$actual_dia', '$clavehraei', '$ubicacion')");

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