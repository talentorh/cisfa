<?php
$dateFrom = base64_decode($_GET['dateFrom']);
$dateTo = base64_decode($_GET['dateTo']);
	require 'conexion.php';
	
	//Consulta
    $sql = "SELECT ordensuministro.precioUnitario, ordensuministro.cantidad, ordensuministro.importe, ordensuministro.nombreproveedor, ordensuministro.numerodecontrato, ordensuministro.claveHraei, ordensuministro.cuadroBasico, ordensuministro.descripcionDelBien, ordensuministro.pzasEntrego, ordensuministro.pzasEntrego2, ordensuministro.pzasEntrego3, ordensuministro.pzasEntrego4, ordensuministro.pzasEntrego5, ordensuministro.fechaorden, ordensuministro.monto, ordensuministro.monto2, ordensuministro.monto3, ordensuministro.monto4, ordensuministro.monto5, ordensuministro.claveUnicaOrden, proveedores.tipoFarmacia from ordensuministro inner join proveedores on proveedores.id_proveedor = ordensuministro.claveContrato and ordensuministro.fechaorden between '$dateFrom' and '$dateTo' and ordensuministro.vigente = 0 and ordensuministro.fechacontrato = '2022'" ;

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$buscarAlumnos=mysqli_query($conexion2,$sql);
   if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
      
       
        $salida.= 
        
        '<th>Nombre del proveedor</th><th>Numero de contrato</th><th>Numero de orden de suministro</th><th>Clave HRAEI</th><th>C.N.I.S</th><th>Descripcion</th><th>Cantidad solicitada</th><th>Costo Unitario</th><th>Importe</th><th>Pzas Entregadas</th><th>Monto entregado</th><th>Fecha de orden</th><th>Farmacia</th>';
     /*   $clave = $r['clavehraei'];
       
       $consulta = "SELECT CLAVEDECUADROBASICO from listamedicamento where CLAVEHRAEI = '$clave'";
       $consult = mysqli_query($conexion2, $consulta);
       $rs = mysqli_fetch_assoc($consult);*/
while($r = $buscarAlumnos->fetch_assoc()){
      $total1 = $r['monto'];
      $total2 = $r['monto2'];
      $total3 = $r['monto3'];
      $total4 = $r['monto4'];
      $total5 = $r['monto5'];
      
      $totalpzas1= $r['pzasEntrego'];
      $totalpzas2= $r['pzasEntrego2'];
      $totalpzas3= $r['pzasEntrego3'];
      $totalpzas4= $r['pzasEntrego4'];
      $totalpzas5= $r['pzasEntrego5'];
      
      $totalpzas = $totalpzas1 + $totalpzas2 + $totalpzas3 + $totalpzas4 + $totalpzas5;
      $total = $total1 + $total2 + $total3 + $total4 + $total5;
    
       
    $salida .= "<tr>
    <td>".utf8_decode($r['nombreproveedor'])."</td>
    <td>".$r['numerodecontrato']."</td>
    <td>".$r['claveUnicaOrden']."</td>
    <td>".$r['claveHraei']."</td>
    <td>".$r['cuadroBasico']."</td>
    <td>".utf8_decode($r['descripcionDelBien'])."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['precioUnitario']."</td>
    <td>".$r['importe']."</td>
    <td>".$totalpzas."</td>
    <td>".$total."</td>
    <td>".$r['fechaorden']."</td>
    <td>".$r['tipoFarmacia']."</td>
    </tr>";
        
    }
    
}
else{
    
}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=entradascisfa_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>