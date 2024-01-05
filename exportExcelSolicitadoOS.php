<?php
$dateFrom = base64_decode($_GET['dateFrom']);
$dateTo = base64_decode($_GET['dateTo']);
require 'conexion.php';
function formatMoney($number, $cents = 1)
{ // cents: 0=never, 1=if needed, 2=always
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
        return '$' . $money;
    } // numeric
} // formatMoney
$sql = $conexion2->query("SELECT proveedores.*, ordensuministro.*, datosproveedor.datoPersonalProveedor FROM proveedores INNER JOIN datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor INNER join ordensuministro on ordensuministro.numerodecontrato = proveedores.numero_pedido WHERE ordensuministro.fechaorden BETWEEN '$dateFrom' AND '$dateTo' AND proveedores.year = '2023' AND ordensuministro.cantidad is not null AND proveedores.tipoFarmacia = 'intrahospitalaria 2023'");

$salida = "";
$salida .= "<table style='color: black; font-size: 12px;' border=1>";

if (!empty($sql) and mysqli_num_rows($sql) > 0) {


    $salida .=

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
    while ($r = $sql->fetch_assoc()) {


        $salida .= '<tr>
            <td>' . mb_convert_encoding($r['datoPersonalProveedor'], 'ISO-8859-1', 'UTF-8') . '</td>
            <td>' . $r['numero_pedido'] . '</td>
            <td>' . $r['claveUnicaOrden'] . '</td>
            <td>' . $r['claveHraei'] . '</td>
            <td>' . $r['cuadroBasico'] . '</td>
            <td>' . $r['cucop'] . '</td>
            <td>' . mb_convert_encoding($r['descripcionDelBien'], 'ISO-8859-1', 'UTF-8') . '</td>  
            <td>' . $r['cantidad'] . '</td>
            <td>' . formatMoney($r['precioUnitario']) . '</td>
            <td>' . formatMoney($r['importe']) . '</td>
            <td>' . $r['fechaorden'] . '</td>
    </tr>';
    }
} else {
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=solicitadoenOS_" . time() . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
