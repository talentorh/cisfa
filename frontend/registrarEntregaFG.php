<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
<link rel="stylesheet" href="iconos/css/all.css?n=1">
<link rel="stylesheet" href="css/style.css?n=1">
<link rel="stylesheet" href="css/main.css?n=1">
<link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
<script src="iconos/js/all.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
<div class="imagenCisfa" style="margin-top: 10px; "></div>
<title>Ordenes de suministro</title>
<style type="text/css">
    td {
        font-size: 13px;

    }

    th {
        font-size: 13px;

    }
</style>
<script language="JavaScript">
    setInterval("window.status = ''", 10);
</script>
<script>
    $(document).on("blur", "#fechaEntrego", function() {

        var id = $(this).data("id_entrega");
        var nombre = $(this).text();
        //alert(id);
        actualizar_datos(id, nombre, "fechaEntregaInsumo");
    });

    $(document).on("blur", "#diasVencidos", function() {

        var id = $(this).data("id_dias");
        var nombre = $(this).text();
        //alert(id);
        actualizar_datos(id, nombre, "diasVencidos");
    });

    $(document).on("blur", "#porcentaje", function() {

        var id = $(this).data("id_procentaje");
        var nombre = $(this).text();
        //alert(id);
        actualizar_datos(id, nombre, "procentaje");
    });

    $(document).on("blur", "#total", function() {

        var id = $(this).data("id_total");
        var nombre = $(this).text();
        //alert(id);
        actualizar_datos(id, nombre, "totalPenalizacion");
    });

    $(document).on("blur", "#cantidad", function() {

        var id = $(this).data("id_cantidad");
        var nombre = $(this).text();
        //alert(id);
        actualizar_datos(id, nombre, "cantidadNoEntregada");
    });
    $(document).on("blur", "#monto", function() {

        var id = $(this).data("id_monto");
        var nombre = $(this).text();
        //alert(id);
        actualizar_datos(id, nombre, "montoPenalizar");
    });

    function myFunction(o) {

        var _tr = $(o);
        var _11 = _tr.find("td").eq(14).html();
        var _22 = _tr.find("td").eq(11).html();

        var _111 = parseFloat(_11);
        var _222 = parseFloat(_22);
        var totall = (_111 * _222) / 10;

        var _totall = _tr.find("td").eq(15);

        if (isNaN(totall)) {
            _totall.html(0);
        } else {
            _totall.html(totall.toFixed(2) / 10);
        }



        var _tr = $(o);
        var _1 = _tr.find("td").eq(7).html();
        var _2 = _tr.find("td").eq(10).html();
        var _11 = parseFloat(_1);
        var _22 = parseFloat(_2);
        var total = (_11 * _22);

        var _total = _tr.find("td").eq(11);

        if (isNaN(total)) {
            _total.html(0);
        } else {
            _total.html(total.toFixed(2));
        }


    }
</script>
<script>
    function actualizar_datos(id, texto, columna) {

        $.ajax({
            url: 'modelo/actualizar_entrega_insumo.php',
            method: 'POST',
            data: {
                id: id,
                texto: texto,
                columna: columna
            },
            succes: function(data) {

            }

        })

    }
</script>

<div class="table-responsive">
    <div class=""><input type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal_folioPenalizacion" style="margin-left: 10px; background: none; color: blue; font-size: 14px; cursor: pointer; margin-top: 10px;" value="Cargar folio Penalización"></div>
    <div class="pull-right">
        <h3 class="form-title"></h3>
    </div>

    <table class="table table-bordered table-striped" style="width: 99%; float: left; margin-left: 10px; margin-top: 10px;">

        <thead>

            <tr style="color: white; background: green;">
                <!-- definimos cabeceras de la tabla -->

                <th>Nombre proveeedor</th>
                <th>Fecha de orden de suministro</th>
                <th>Numero de orden de suministro</th>
                <th>Clave HRAEI</th>
                <th>Descripcion del bien</th>
                <th>U D M</th>
                <th>Cantidad solicitada</th>
                <th>Precio unitario</th>
                <th>Total de orden</th>
                <th>Fecha limite de entrega</th>
                <th>Pzas a penalizar</th>
                <th>Monto a penalizar</th>
                <th>Fecha de entrega de insumo</th>
                <th>Numero de dias penalizables</th>
                <th>% de penalizacion, segun contrato (penalización)</th>
                <th>Monto de penalización con iva (penalización)</th>



            </tr>

        </thead>


        <tbody>
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
            $total = 0;
            $var = 0;
            $var2 = 0;
            $claveEntrega = base64_decode($_GET['claveEntrega']);
            $nombre = base64_decode($_GET['nombre']);
            $fecha = base64_decode($_GET['fecha']);
            $fechaEntrega = base64_decode($_GET['fechaEntrega']);
            $var = base64_decode($_GET['var']);
            require 'conexion.php';
            $valor2 = "LA-006000999-E4-2020";
            $sql = "SELECT * from ordensuministro where claveUnicaOrden = '$claveEntrega' and penalizar = 1";
            $result = mysqli_query($conexion2, $sql);

            while ($row = $result->fetch_assoc()) {
                $entrega1 = $row['pzasEntrego'];
                $entrega2 = $row['pzasEntrego2'];
                $entrega3 = $row['pzasEntrego3'];
                $solicitado = $row['cantidad'];
                $PU = $row['precioUnitario'];

                $totalPzas = $entrega1 + $entrega2 + $entrega3;
                $penalizar = $solicitado - $totalPzas;
                $montoPenalizado = $penalizar * $PU;

                $totalMaximo = $row['totalMaximoContrato'];

                $totalMaximoPenalizar = $totalMaximo * .10;
                $date = $fechaEntrega;
                //Incrementamos los dias que se requieran
                $mod_date = strtotime($date . "+ 0 days");
                $dia = date("d-m-Y", $mod_date) . "\n";
                $actual_dia = $row['fechaEntregaInsumo'];

                $datetime1 = date_create($dia);
                $datetime2 = date_create($actual_dia);

                if ($datetime2 >= $datetime1) {
                    $contador = date_diff($datetime1, $datetime2);
                    $differenceFormat = '%a';
                    $totalDias = $contador->format($differenceFormat);
                } else {
                    $totalDias = 0;
                }

                echo '
                 
                 <tr onkeyup="myFunction(this)">
                 <td>' . $nombre . '</td>
                 <td>' . $fecha . '</td>
                 <td>' . $claveEntrega . '</td>
                 <td>' . $row['claveHraei'] . '</td>
                 <td>' . $row['descripcionDelBien'] . '</td>
                 <td>' . $row['unidadMedida'] . '</td>
                 <td>' . $row['cantidad'] . '</td>
                    <td id="pu" data-id_pu=' . $row['precioUnitario'] . ' contenteditable>' . $row['precioUnitario'] . '</td>
               
                 <td>' . formatMoney($row['importe']) . '</td>
                 <td>' . $fechaEntrega . '</td>
                 <td id="cantidad" data-id_cantidad=' . $row['id_ordenSuministro'] . ' contenteditable>' . $row['cantidadNoEntregada'] . '</td>
                 <td id="monto" data-id_monto=' . $row['id_ordenSuministro'] . ' contenteditable>' . formatMoney($row['montoPenalizar']) . '</td>
                 <td id="fechaEntrego" data-id_entrega=' . $row['id_ordenSuministro'] . ' contenteditable>' . $row['fechaEntregaInsumo'] . '</td>
                 <td id="diasVencidos" data-id_dias=' . $row['id_ordenSuministro'] . ' contenteditable>' . $totalDias . '</td>
                 <td id="porcentaje" data-id_procentaje=' . $row['id_ordenSuministro'] . ' contenteditable>' . $row['procentaje'] . '</td>
                 <td id="total" data-id_total=' . $row['id_ordenSuministro'] . ' contenteditable>' . $row['totalPenalizacion'] . '</td>
                                 
                 </tr>';
                $total += $row['totalPenalizacion'];
                $id = $row['id_ordenSuministro'];
            }


            ?>

            <script type="text/javascript">
                $("button").click(function() {
                    var fired_button = $(this).val();

                    var mensaje = confirm("el registro se eliminara")

                    if (mensaje == true) {
                        window.location.href = "frontend/eliminaRegistr?cucop=" + fired_button;
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>SUBTOTAL</td>
            <td><input type="text" value="<?php echo formatMoney($total); ?>" onclick="location.reload()" readonly="readonly"></td>
            <tr></tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>IVA</td>
            <td></td>
            <tr></tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL</td>

            <td><input type="text" value="<?php echo formatMoney($total); ?>" onclick="location.reload()" readonly="readonly"></td>




        </tbody>

    </table>
</div>
</div>





<!--<input type="submit" class="btn btn-warning" name="monto" value="Total" style=" width: 150px; float: right; margin-right: 60px; margin-top: 0px;">-->

<input type="submit" onclick="window.history.back();" class="btn btn-danger" value="Regresar" style=" width: 150px; float: left; margin-left: 10px; margin-top: 0px;">
<!-- <a href="" class="btn btn-info" onclick="window.location.reload();" style=" width: 150px; float: right; margin-right: 50px; margin-top: 0px;">Calcular dias</a>-->
<?php

$total2 = base64_encode($total);
$claveEntrega2 = base64_encode($claveEntrega);
$var2 = base64_encode($var);
$fecha2 = base64_encode($fecha);
$fechaEntrega2 = base64_encode($fechaEntrega);
//echo "<a href='informePenalizacion.php?valor2=$claveEntrega&var=$var&fecha=$fecha&claveEntrega=$claveEntrega&fechaLimite=$fechaEntrega'><i id='pdf' class='btn btn-primary'  style='width: 150px; float: right; margin-right: 50px; height: 40px;'>Generar informe</i></a>";

?>

<input type="hidden" id="valor2" value="<?php echo $claveEntrega2; ?>">
<input type="hidden" id="var" value="<?php echo $var2; ?>">
<input type="hidden" id="fecha" value="<?php echo $fecha2; ?>">
<input type="hidden" id="fechaLimite" value="<?php echo $fechaEntrega2; ?>">
<input type="hidden" id="folio" value="">
<input type="hidden" id="valor3" value="<?php echo $total2; ?>">
<input type="hidden" id="totalMaximo" value="<?php echo $totalMaximo; ?>">
<input type="hidden" id="totalMaximoPenalizar" value="<?php echo $totalMaximoPenalizar; ?>">

<select class="form-control" id="mySele" style=" width: 300px; height: 40px; float: right; margin-right: 50px; background: #321DFF; color: white;" onchange="select_orden();">
    <option value="">Numero de folio</option>

    <?php
    // require 'conexion.php';



    $sql_s = $conexion2->query("SELECT * FROM oficiospenalizcion where estatus = 0");
    while ($row_s = mysqli_fetch_array($sql_s)) {
        $ID_usuario3 = $row_s['numOficioPenalizacion'];
        $nombre = $row_s['numOficioPenalizacion'];
    ?>

        <option value="<?php echo $ID_usuario3; ?>"> <?php echo $nombre; ?></option>

    <?php
    }

    ?>

</select>
</form>

<script>
    $(function() {
        $('#mySele').on("change", function() { //detectamos el evento change
            var value = $(this).val(); //sacamos el valor del select
            var valor = $('#folio').val(value);
            var valor = $('#folio').val();

            var fired_button2 = $("#valor2").val();
            var fired_button3 = $("#var").val();
            var fired_button4 = $("#fecha").val();
            var fired_button6 = $("#fechaLimite").val();
            var fired_button7 = $("#valor3").val();
            var fired_button8 = $("#totalMaximo").val();
            var fired_button9 = $("#totalMaximoPenalizar").val();
            window.location.href = 'informePenalizacionFG?totalMaximoPenalizar=' + fired_button9 + '&totalMaximo=' + fired_button8 + '&valor=' + valor + '&valor2=' + fired_button2 + '&var=' + fired_button3 + '&fecha=' + fired_button4 + '&fechaLimite=' + fired_button6 + '&valor3=' + fired_button7;


        });
    });
</script>

</div>

<?php
require 'modals/cargarFolioPenalizacion.php';

?>