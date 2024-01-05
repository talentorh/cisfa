<?php
$dateFrom = base64_decode($_GET['dateFrom']);
$dateTo = base64_decode($_GET['dateTo']);
	require 'conexion.php';
	
	//Consulta
	 
    $sql=$conexion2->query("SELECT proveedores.*, ordensuministro.*, datosproveedor.datoPersonalProveedor FROM proveedores INNER JOIN datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor INNER join ordensuministro on ordensuministro.numerodecontrato = proveedores.numero_pedido WHERE ordensuministro.fechaorden BETWEEN '$dateFrom' AND '$dateTo' AND proveedores.year = '2022' AND ordensuministro.cantidad is not null AND proveedores.tipoFarmacia = 'intrahospitalaria 2022'");

$salida = "";
$salida .= "<table style='color: black; font-size: 12px;' border=1>";

   if(!empty($sql) AND mysqli_num_rows($sql)>0)
    {
      
       
        $salida.= 
        
        '<th>PROVEEDOR</th>
                <th>NUMERO DE CONTRATO</th>
                <th>NUMERO DE O.S</th>
                <th>CLAVE HAREI</th>
                <th>CNIS</th>
                <th>CUCOP</th>
                <th>DESCRIPCION</th>
                <th>CANTIDAD</th>
                <th>P.U</th>
                <th>IMPORTE</th>
                <th>FECHA DE O.S</th>';
while($r = $sql->fetch_assoc()){
   
       
    $salida .= '<tr>
            <td>'.$r['datoPersonalProveedor'].'</td>
            <td>'.$r['numero_pedido'].'</td>
            <td>'.$r['claveUnicaOrden'].'</td>
            <td>'.$r['claveHraei'].'</td>
            <td>'.$r['cuadroBasico'].'</td>
            <td>'.$r['cucop'].'</td>
            <td>'.$r['descripcionDelBien'].'</td>
            <td>'.$r['cantidad'].'</td>
            <td>'.$r['precioUnitario'].'</td>
            <td>'.$r['importe'].'</td>
            <td>'.$r['fechaorden'].'</td>
    </tr>';
        
    }
    
}else{
    
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=solicitadoenOS_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>