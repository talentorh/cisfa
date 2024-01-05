<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    
<?php
date_default_timezone_set('America/Monterrey');
require 'conexion.php';
$valor = $_GET['valor'];
$valor2 = $_GET['valor2'];
$valor3 = $_GET['valor3'];
$dia = date("Y-m-d"); 
$sql = "SELECT * from listamedicamento where id_medicamento = $valor";
$result=mysqli_query($conexion2, $sql);
$row=mysqli_fetch_assoc($result);
$claveHRAEI= $row['CLAVEHRAEI'];
$cuadroBasico= $row['CLAVEDECUADROBASICO'];
$cucop= $row['CUCOP'];
$Descripcion= $row['DESCRIPCION'];
$unidadMedida= $row['UNIDADDEMEDIDA'];
$minimo= $row['MINIMOCONSUMO'];
$maximo= $row['MAXIMOCONSUMO'];
$precioUnitario= $row['PRECIOUNITARIO'];
$partida = '25301';
$intrahospitalaria = 'intrahospitalaria';
$fecha = '0000-00-00';
$diasVencidos = 0;
$porcentaje = 0;
$penalizacion = '0';
$cumplioEntrega= 'no';

$statement = $conexion->prepare("INSERT INTO ordensuministro(id_ordenSuministro, partidaPresupuestal, claveHraei, cuadroBasico, cucop, descripcionDelBien, unidadMedida, minimo, maximo, precioUnitario, claveContrato, claveUnicaOrden, fechaEntregaInsumo, diasVencidos, procentaje, totalPenalizacion, cumplioEntrega, fechacontrato, fechaorden, farmacia) 
VALUES(null, '$partida', :claveHraei, :cuadroBasico, :cucop, :descripcionDelBien, :unidadMedida, :minimo, :maximo, :precioUnitario, :claveContrato, :claveUnicaOrden,  :fechaEntregaInsumo, :diasVencidos, :procentaje, :totalPenalizacion, :cumplioEntrega, :fechacontrato, :fechaorden, :farmacia)");
    $statement->execute(array(
        ':claveHraei' => $claveHRAEI,
        ':cuadroBasico' => $cuadroBasico,
        ':cucop' => $cucop,
        ':descripcionDelBien' => $Descripcion,
        ':unidadMedida' => $unidadMedida,
        ':minimo' => $minimo,
        ':maximo' => $maximo,
        ':precioUnitario' => $precioUnitario,
        ':claveContrato'=>$valor3,
        ':claveUnicaOrden'=>$valor2,
        ':fechaEntregaInsumo'=>$fecha, 
        ':diasVencidos'=>$diasVencidos, 
        ':procentaje'=>$porcentaje, 
        ':totalPenalizacion'=>$penalizacion, 
        ':cumplioEntrega'=>$cumplioEntrega, 
        ':fechacontrato'=>2024, 
        ':fechaorden'=>$dia,
        ':farmacia'=>$intrahospitalaria

    ));

$statement = $conexion->prepare("SELECT claveMedicamento, claveContrato FROM consumorealmedicamento WHERE claveMedicamento = :claveMedicamento and claveUnica = $valor3");
$statement->execute(array(':claveMedicamento' => $claveHRAEI));

$resultado2 = $statement->fetch();

if($resultado2 == false){
  
$statement = $conexion->prepare("INSERT INTO consumorealmedicamento(id_consunmo, claveMedicamento, claveConsumoContrato, claveContrato, fecha)
VALUES(null, :claveMedicamento, '$valor2', $valor3 ,'$dia')");
$statement->execute(array(
    ':claveMedicamento' =>$claveHRAEI

));
}else{

}
 
$querY = "UPDATE numeroorden set estatus= 1
 where claveUnicaContrato = '$valor2' limit 1";
$edita= mysqli_query($conexion2, $querY);  
if($statement || $edita != false){

echo "<script>
    window.history.back();</script>";

}else{
    echo "<script>alert('error');</script>";
}


?>

</body>
</html>