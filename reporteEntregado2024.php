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

$sql = "SELECT * from ordensuministro where fechacontrato = '2024' and ordensuministro.pzasEntrego is not null and ordensuministro.pzasEntrego != 0 and ordensuministro.vigente = 0 and ordensuministro.farmacia = 'intrahospitalaria'";

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$buscarAlumnos = mysqli_query($conexion2, $sql);



$salida .=

    '<th>Numero de orden</th><th>Clave HRAEI</th><th>CNIS</th><th>CUCOP</th><th>Descripcion</th><th>Minimo consumo</th><th>Maximo consumo</th><th>Cantidad</th><th>Precio Unitario</th><th>Importe</th><th>Fecha 1</th><th>Pzas 1</th><th>Fecha 2</th><th>Pzas 2</th><th>Fecha 3</th><th>Pzas 3</th><th>Fecha 4</th><th>Pzas 4</th><th>Fecha 5</th><th>Pzas 5</th><th>Fecha de orden</th><th>Numero de contrato</th>';



while ($rs = $buscarAlumnos->fetch_assoc()) {

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
    <td>" . mb_convert_encoding($rs['fechaParcial'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaParcial2'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego2'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego3'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego3'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego4'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego4'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaEntrego5'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['pzasEntrego5'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['fechaorden'], 'ISO-8859-1', 'UTF-8') . "</td>
    <td>" . mb_convert_encoding($rs['numerodecontrato'], 'ISO-8859-1', 'UTF-8') . "</td>
    </tr>";

}

$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporteOs2024_" . time() . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;