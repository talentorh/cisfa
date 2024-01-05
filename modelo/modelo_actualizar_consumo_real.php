<?php
 require "../conexion.php";
 $id = $_POST["id"];
 $texto = $_POST["texto"];
 $fired = $_POST["fired"];
 $fired2 = $_POST["fired2"];
 $fired3 = $_POST["fired3"];
 $columna = $_POST["columna"];
 
 //$sql = "SELECT claveMedicamento, sum(consumoMedicamento) as TotalConsumo from consumoRealMedicamento where claveMedicamento = '$id' group by claveMedicamento";
 //$result=mysqli_query($conexion2, $sql);

 $consulta = "UPDATE consumorealmedicamento set $columna ='$texto' where claveMedicamento = '$id' and claveConsumoContrato = '$fired' and claveContrato ='$fired2'";
    $row = mysqli_query($conexion2, $consulta);
 
    $sql_i = $conexion2->query("SELECT claveMedicamento, sum(consumoMedicamento) as TotalConsumo from consumorealmedicamento  where claveMedicamento = '$id' and claveContrato = '$fired2' group by claveMedicamento");
    $row = mysqli_fetch_assoc($sql_i); 
    $sum = $row['TotalConsumo'];
    $name = $row['claveMedicamento'];

    $sql ="UPDATE ordensuministro set consumoReal = $sum where claveHraei = '$name' and claveContrato ='$fired2'";
    $row= mysqli_query($conexion2, $sql);
    
    $sql ="UPDATE objetocontratacion set cantidadConsumida = $sum where CLAVEHRAEI = '$name' and claveUnicaOrden = '$fired3'";
    $row= mysqli_query($conexion2, $sql);
    
    $sql ="UPDATE listamedicamento set cantidad = $sum where CLAVEHRAEI = '$name' and numeroContrato ='$fired3'";
    $row= mysqli_query($conexion2, $sql);



 if(!$row  ){
     echo "<script>alert('error');</script>";
 }else{
    echo "<script>alert('good');</script>";
 }


?>