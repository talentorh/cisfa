<?php error_reporting(0);
require 'conexion.php';

$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);
$sqloperador = $conexion2->query("SELECT claveUnicaOrden from direccionoperadorlogistico where claveUnicaOrden = '$num'");
  $rowoperador = mysqli_fetch_assoc($sqloperador);
$validaclaveoperador = $rowoperador['claveUnicaOrden'];
$sql2 = "SELECT *, numeroorden.totalOrden from proveedores inner join numeroorden on numeroorden.claveUnicaContrato='$num' where id_proveedor= $var ";
$resultado = mysqli_query($conexion2, $sql2);
$row_s = mysqli_fetch_assoc($resultado);
$fechainicio = $row_s['fechaRegistro'];
  $fechaformateada = date("d-m-Y", strtotime($fechainicio));
  $fecha = date("d-m-Y",strtotime($row_s['fechaRegistro']."+ 15 days"));
  $numeroproveedor = $row_s['numero_proveedor'];
$sql = "SELECT ordensuministro.partidaPresupuestal, ordensuministro.claveHraei, ordensuministro.cuadroBasico, ordensuministro.cucop, ordensuministro.descripcionDelBien, 
ordensuministro.unidadMedida, ordensuministro.minimo, ordensuministro.maximo, ordensuministro.id_ordenSuministro, ordensuministro.cantidad, ordensuministro.precioUnitario,
ordensuministro.importe, ordensuministro.claveUnicaOrden, ordensuministro.claveContrato, proveedores.numero_pedido, proveedores.numero_procedimiento, numeroorden.totalOrden, numeroorden.fechaRegistro from ordensuministro left join proveedores on proveedores.id_proveedor =$var inner join numeroorden on claveUnicaContrato = '$num' and ordensuministro.claveUnicaOrden ='$num' and ordensuministro.claveContrato =$var";
$result = mysqli_query($conexion2, $sql);


$sql2s = "SELECT * from datosproveedor where id_datoProveedor= $numeroproveedor ";
$resultados = mysqli_query($conexion2, $sql2s);
  $row_a = mysqli_fetch_assoc($resultados);
  function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
    if (is_numeric($number)) { // a number
      if (!$number) { // zero
        $money = ($cents == 2 ? '0.00' : '0'); // output zero
      } else { // value
        if (floor($number) == $number) { // whole number
          $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
        } else { // cents
          $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
        } // integer or decimal
      } // value
      return '$'.$money;
    } // numeric
  }
$output = '';
$output .= '<head><img src="imagenes/gobmx.png" style="height: 75px;"><img src="imagenes/ImagenIMSS.jpg" style="height: 75px;"></head>';
$output .= '<header style="margin-top: -60px; text-align: center;"><b>ORDEN DE PEDIDO</b></header>';
$output .= '<div style="height: 15px; background-color: #C8C8C8; margin-top: -15px;"></div>';
$output .= '<table width="100%" border="0" cellpadding="5" cellspacing="0">
	
	<tr>
    
    <td width="100%"  style="background-color: white; text-align: center; font-size: 12px;">
	<b>Fecha de pedido:&nbsp;</b>'.$fechaformateada.'<br />

	</td>
    </table>';
    $output .= '<table width="100%" border="0" cellpadding="5" cellspacing="0" style="font-size: 12px;">
	<td width="55%" style="background-color: white;">
	<b>Número de procedimiento:</b>&nbsp;'.$row_s['numero_procedimiento'].'<br />
	<b>Contrato:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row_s['numero_pedido'].'<br /> 
	<b>Número de suministro:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$num.'<br />
	<br/>
	<br/>
	<br/>
	<br/>
	</td>
	
	<td width="45%" style="background-color: white;">         
	<h4 style="margin-top:  0px; margin-left: 80px;">Proveedor:<p style="margin-top: -39px; margin-left: 167px;">'.$row_a['datoPersonalProveedor'].'</p></h4>
	<h4 style="margin-top: -13px; margin-left: 80px;">Telefono:<p style="margin-top: -39px; margin-left: 167px; ">'.$row_a['telefono'].'</p></h4>
	<h4 style="margin-top: -13px; margin-left: 80px;">Correo:<p style="margin-top: -39px; margin-left: 167px; ">'.$row_a['correoElectronico'].'</p></h4>
	<h4 style="margin-top: -13px; margin-left: 80px;">CLUES destino:&nbsp;<p style="margin-top: -39px; margin-left: 167px;">MC55A018786</p></h4>
	</td>
	</tr>
	</table>';
	$output .= '<div style="height: 15px; background-color: #C8C8C8; margin-top: -10px;"></div>';
	$output .= '<table width="100%" border="0" cellpadding="5" cellspacing="0" style="font-size: 12px;">
	
	<tr>
	<td width="75%" style="background-color: white;">
	<b>Almacén de Entrega:</b>&nbsp;<p style="margin-top: -18px; margin-left: 135px; text-align: left; font-size: 12px;">ALMACÉN GENERAL DEL HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA</p>
	';if($validaclaveoperador == ''){
    $output .='<b>Dirección de entrega:</b>&nbsp;<p style="margin-top: -18px; margin-left: 135px; text-align: left; font-size: 12px;">ALMACÉN GENERAL DEL HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA</p>
    ';}else{
    $output .='<b>Dirección de entrega:</b>&nbsp;<p style="margin-top: -18px; margin-left: 135px; text-align: left; font-size: 12px;">LA QUE INDIQUE EL OPERADO LOGISTICO, citas@birmex.mx</p>  
	';}
    $output .='<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección Final:</b>&nbsp;<p style="margin-top: -18px; margin-left: 135px; text-align: left; font-size: 12px;">CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, PUEBLO DE ZOQUIAPAN, C.P. 56530, MUNICIPIO DE IXTAPALUCA, ESTADO DE MÉXICO</p>

	
	<td width="45%" style="background-color: white;"><br>       
	<b>Fecha Limite de Entrega:</b><p style="margin-top: -15px; margin-left: 135px; text-align: left; font-size: 14px;">'.$fecha.'</p>
	<br/>
	<br/>
	<br/>
	<b>Tipo de Entrega:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIRECTA<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	</td>
	</tr>
	</table>';
	$output .= '<div style="height: 15px; background-color: #C8C8C8; margin-top: -20px;"></div>';
	$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0" style="margin-top: 5px; ">
	<tr>
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">CLAVE INTERNA DE ALMACEN</th>
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">CLAVE DEL INSUMO</th>
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">CUCOP</th>
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">DESCRIPCION</th>
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">UNIDAD MEDIDA</th>
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">CANTIDAD SOLICITADA</th> 
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">PRECIO UNITARIO</th> 
	<th align="center" style="font-size: 9px; color: white; background-color: grey;">IMPORTE</th> 
	</tr>';


while($invoiceItem = $result->fetch_assoc()){
	
	$output .= '
	<tr>
	<td align="center" style="font-size: 9px;">'.$invoiceItem["claveHraei"].'</td>
	<td align="center" style="font-size: 9px;">'.$invoiceItem["cuadroBasico"].'</td>
	<td align="center" style="font-size: 9px;">'.$invoiceItem["cucop"].'</td>
	<td align="center" style="font-size: 9px;">'.$invoiceItem["descripcionDelBien"].'</td>
	<td align="center" style="font-size: 9px;">'.$invoiceItem["unidadMedida"].'</td>
    <td align="center" style="font-size: 9px;">'.$invoiceItem["cantidad"].'</td>
	<td align="center" style="font-size: 9px;">'.formatMoney($invoiceItem["precioUnitario"]).'</td>
	<td align="center" style="font-size: 9px;">'.formatMoney($invoiceItem["importe"]).'</td>   
	</tr>';
}
$output .= '
	
	<tr >
	<td align="right" colspan="7" style="background-color: #B8B8B8;"><b>SUB TOTAL</b></td>
	<td align="left" style="background-color: #B8B8B8;">'.formatMoney($row_s['totalOrden']).'</td>
	</tr>
	<tr>
	<td align="right" colspan="7" style="background-color: #B8B8B8;"><b>I.V.A:</b></td>
	<td align="left" style="background-color: #B8B8B8;"></td>
	</tr>
	<tr>
	<td align="right" colspan="7" style="background-color: #B8B8B8;"><b>Total:</b></td>
	<td align="left" style="background-color: #B8B8B8;">'.formatMoney($row_s['totalOrden']).'</td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
$invoiceFileName = 'Invoice-'.$num.'.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?> 