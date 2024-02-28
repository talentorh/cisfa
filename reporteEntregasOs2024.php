<?php
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
require 'conexion.php';

//Consulta
$sql = "SELECT * from ordensuministro where fechacontrato = '2024' and vigente = 0 and farmacia = 'intrahospitalaria'";

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$buscarAlumnos = mysqli_query($conexion2, $sql);




$salida .=

    '<th>Numero de orden</th><th>Clave HRAEI</th><th>CNIS</th><th>CUCOP</th><th>Descripcion</th><th>Minimo consumo</th><th>Maximo consumo</th><th>Cantidad</th><th>Precio Unitario</th><th>Importe</th><th>Entrega 1</th><th>fecha de entrega 1</th><th>monto</th><th>Entrega 2</th><th>fecha de entrega 2</th><th>monto 2</th><th>Entrega 3</th><th>fecha de entrega 3</th><th>monto3</th><th>Entrega 4</th><th>fecha de entrega 4</th><th>monto 4</th><th>Entrega 5</th><th>fecha de entrega 5</th><th>monto 5</th><th>Faltante de entrega</th><th>Fecha de orden</th>';
while ($rs = $buscarAlumnos->fetch_assoc()) {

    $entrega1 = (int)$rs['pzasEntrego'];
    $entrega2 = (int)$rs['pzasEntrego2'];
    $entrega3 = (int)$rs['pzasEntrego3'];
    $entrega4 = (int)$rs['pzasEntrego4'];
    $entrega5 = (int)$rs['pzasEntrego5'];
    $cantidad = (int)$rs['cantidad'];

    $totalpiezas = $entrega1 + $entrega2 + $entrega3 + $entrega4 + $entrega5;

    if ($totalpiezas <= $cantidad or $totalpiezas >= $cantidad) {
        $sql_r = $conexion2->query("SELECT * from ordensuministro where cantidad <= $totalpiezas");
        $result = mysqli_fetch_assoc($sql_r);

        $totalfinal = $cantidad - $totalpiezas;

        $salida .= "<tr>
    <td>" . mb_convert_encoding($rs['claveUnicaOrden'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['claveHraei'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['cuadroBasico'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['cucop'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['descripcionDelBien'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['minimo'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['maximo'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['cantidad'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding(formatMoney($rs['precioUnitario']), 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding(formatMoney($rs['importe']), 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaParcial'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding(formatMoney($rs['monto']), 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego2'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaParcial2'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding(formatMoney($rs['monto2']), 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego3'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego3'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding(formatMoney($rs['monto3']), 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego4'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego4'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding(formatMoney($rs['monto4']), 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego5'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego5'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding(formatMoney($rs['monto5']), 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . ($totalfinal) . "</td>
    <td>" . mb_convert_encoding($rs['fechaorden'], 'ISO-8859-1', 'UTF-8') . "</td>
    </tr>";
    } else {
    }
}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporteOs2024_" . time() . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;