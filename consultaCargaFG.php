<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.tabledit.js"></script>
<style>
    .titulo {

        font-size: 20px;
        color: blue;
        text-align: center;
        float: right;
    }

    .titulo2 {

        font-size: 20px;
        color: green;
        text-align: center;
        float: right
    }

    .titulo3 {

        font-size: 20px;
        color: red;
        text-align: center;
        float: right;
    }

    .titulo4 {

        font-size: 20px;
        color: black;
        text-align: center;
        float: right
    }

    td:hover {
        background: #6A6868;
        color: white;
    }

    td {
        cursor: pointer;
    }
</style>
<?php
error_reporting(0);
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
$contrato = $_POST['ID_usuario'];

$sql = "SELECT COUNT(*) total FROM proveedores WHERE year = '2024' and tipoFarmacia = 'gratuita 2024'";
$result = mysqli_query($conexion2, $sql);
$fila = mysqli_fetch_assoc($result);


$query = $conexion2->query("SELECT
    datosproveedor.id_datoProveedor,
    datosproveedor.datoPersonalProveedor,
    datosproveedor.domicilioPersonal,
    datosproveedor.telefono,
    datosproveedor.correoElectronico,
    datosproveedor.rfc,
    datosproveedor.direccionInternet,
    proveedores.id_proveedor,
    proveedores.numero_pedido, 
    proveedores.suficiencia_presupuestaria,
    proveedores.requisicion,
    proveedores.tipoFarmacia,
    proveedores.vigencia_pedido_inicio,
    proveedores.vigencia_pedido_final,
    proveedores.tipoadjudicacion,
    proveedores.year
    FROM proveedores left outer join datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor where proveedores.year = '2024' and tipoFarmacia = 'gratuita 2024' ORDER by datosproveedor.datoPersonalProveedor asc");

?>
<strong style="float: left; margin-left:0px; font-size: 14px; margin-top: 40px; font-style: normal;"><label>Total de contratos <input type="text" readonly value="<?php echo $fila['total']; ?>"></label></strong>
<table id="datatables-example" class="table table-striped table-bordered nowrap table-darkgray table-hover" width="100%">
    <thead>

        <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">
            <th scope="col">Datos Proveedor</th>
            <th scope="col">Información de contrato</th>
            <th scope="col">Montos</th>
            <th scope="col">Vencimiento</th>
            <th scope="col">O.S</th>

            <th scope="col">Ver</th>
            <th>Eliminar</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $fecha_actual = new DateTime(date('Y-m-d'));
        while ($dataRegistro = mysqli_fetch_assoc($query)) {
            $id = $dataRegistro['id_proveedor'];
            $fechaContrato = $dataRegistro['year'];
            $minimo = $dataRegistro['total_minimo'];
            $maximo = $dataRegistro['total_maximo'];
            $contrato = $dataRegistro['numero_pedido'];

            $sql_r = $conexion2->query("SELECT sum(MINIMOPRECIO) as total1, sum(MAXIMOPRECIO) as total2 from listamedicamento where id_contrato = $id and fechaContrato = $fechaContrato");
            $resp = mysqli_fetch_assoc($sql_r);

            $min = $resp['total1'];
            $max = $resp['total2'];

            $sql = $conexion2->query("SELECT sum(importe) as total from ordensuministro  where claveContrato = $id");
            $row = mysqli_fetch_assoc($sql);
            $totalContrato = $row['total'];
            $fecha_final = new DateTime($dataRegistro['vigencia_pedido_final']);
            $dias = $fecha_actual->diff($fecha_final)->format('%r%a');
            // Si la fecha final es igual a la fecha actual o anterior
            if ($dias <= 0) {
                /*echo '<td><button class="btn btn-danger" style="width: 50px; height: 20px;  text-size:10px; color: black;"></button></td>';*/
            } elseif ($dias <= 15) {
                /*echo '<td>Está a ' . $dias . ' días de vencer</td>';*/
            } else {
                /*echo '<td></td>';*/
            }
            $MINIMOOK = "<i class='lnr lnr-flag'></i>";
            $sincubrir = "<i class='lnr lnr-flag'></i>";
            $sincubrirmin = "<i class='lnr lnr-flag'></i>";
            $maximook = "<i class='lnr lnr-flag'></i>";
            $valor = base64_encode($dataRegistro['id_proveedor']);
            $contrato = base64_encode($dataRegistro['numero_pedido']);
            if ($totalContrato >= $min and $totalContrato < $max) {
                $cubierto = "<span class='titulo'> $MINIMOOK";
            } elseif ($totalContrato >= $max) {
                $cubierto = "<span class='titulo3'> $maximook";
            } elseif ($totalContrato < $min) {
                $cubierto = "<span class='titulo2'> $sincubrir";
            } elseif ($totalContrato == '') {
                $cubierto = "<span class='titulo4'> $sincubrirmin";
            }
        ?>
            <tr>
                <td colspan="1" rowspan="1"><?php echo 'Nombre:&nbsp' . $dataRegistro['datoPersonalProveedor'] . '<br>' . 'RFC:&nbsp' . $dataRegistro['rfc'] . '<br>' . 'Correo:&nbsp' . $dataRegistro['correoElectronico'] . '<br>' . 'Telefono:&nbsp' . $dataRegistro['telefono']; ?></td>
                <td><?php echo 'Número de contrato:&nbsp' . $dataRegistro['numero_pedido'] . '<br>' . 'Tipo de contrato:&nbsp' . $dataRegistro['tipoFarmacia'] . '<br>' . 'Tipo de adjudicación:&nbsp' . $dataRegistro['tipoadjudicacion']; ?></td>
                <td><?php echo 'Monto minimo:&nbsp' . formatMoney($resp['total1']) . '<br>' . 'Monto maximo:&nbsp' . formatMoney($resp['total2']) . '<br>' . 'Monto Consumido:&nbsp' . formatMoney($totalContrato) . ' ' . $cubierto; ?></td>
                <td>A <?php echo $dias; ?> de vencer </td>
                <td><a href="ordenSuminstroFG?Xy='<?php echo $valor ?>'&tr='<?php echo $contrato ?>'" target="popup" onClick="window.open(this.href, this.target, " width=1100,height=600,top=15px, left=220,scrollbars=NO,menubar=NO,titlebar=NO,status=NO,toolbar=NO" ); return false;" style="font-size: 24px; color: green; background: none; border: none;" class="lnr lnr-file-add"></a></td>
                <td><a href="editarContrato?Xy='<?php echo $valor ?>'" style="font-size: 24px; color: blue; background: none; border: none;" class="lnr lnr-enter"></a></td>
                <!--<td><a  href="verContratoFG?Xy='<?php echo $valor ?>'" style="font-size: 24px; color: yellow; background: none; border: none;" class="lnr lnr-exit"></a></td>-->
                <td><button type="button" value='<?php echo $valor ?>' style="font-size: 24px; color: red; background: none; border: none;" class="lnr lnr-trash"><i id="eliminar"></i></button></td>


            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<script>
    $(document).ready(function() {
        $('#datatables-example').DataTable({
            pagingType: 'full_numbers',
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

<script type="text/javascript">
    $("button").click(function() {
        var id = $(this).val();
        var mensaje = confirm("el registro se eliminara")
        let ob = {
            id: id
        };
        if (mensaje == true) {
            $.ajax({
                data: ob,
                url: 'eliminaProveedor.php',
                type: 'POST',
                beforeSend: function() {

                },
                success: function(response) {
                    $("#tabla_resultado").html(response);
                    $("#tabla_resultado").load('consultaCargaFG.php');
                }
            });
        } else {
            swal({
                title: '¡CANCELADO!',
                text: '',
                type: 'error',
                timer: 1000,
                showConfirmButton: false
            });
        }
    });
</script>