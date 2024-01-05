<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="icono/icono.ico" rel="shortcut icon">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <title>HRAEI</title>

    <!--scripts para ejectuar ajax con onblur y editables   -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden.js"></script>

    <!-- para tablas editables -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.tabledit.js"></script>
</head>

<body>

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
    $var = base64_decode($_GET['var']);
    require 'conexion.php';

    $sql = $conexion2->query("SELECT sum(monto) total1, sum(monto2) total2, sum(monto3) total3, sum(importe) as total, fechacontrato FROM ordensuministro where claveContrato = $var");
    $row = mysqli_fetch_assoc($sql);

    $total1 = $row['total1'];
    $total2 = $row['total2'];
    $total3 = $row['total3'];

    $total4 = $total1 + $total2 + $total3;
    $totalReal = $row['total'];
    $fechacontrato = $row['fechacontrato'];



    ?>
    <header>
        <strong class="strong">CONTRATOS CISFA</strong>

    </header>
    <?php
    require 'menuCisfa/menuOrdenes.php';

    ?>
    <div class="box3">
        <script>
            function medicamento_enorden() {
                let ID_usuario = $("#medicamento_orden").val();
                let year = $("#year").val();

                let ob = {
                    ID_usuario: ID_usuario,
                    year: year
                };

                $.ajax({
                    type: "POST",
                    url: "consulta_listaMedicamentoEnOrden.php",
                    data: ob,
                    beforeSend: function(objeto) {


                    },
                    success: function(data) {

                        $("#tabla_resul").html(data);

                    }
                });
            }
        </script>
        <input type="hidden" id="year" value="<?php echo $fechacontrato ?>">
        <input list="medicamentoEnOrden" class="form-control" id="medicamento_orden" style="margin-left: auto; margin-right: auto; margin-top: 5px; width: 550px; height: 40px;" onchange="medicamento_enorden();" placeholder="Clave, Nombre o CNIS del Medicamento">

        <datalist id="medicamentoEnOrden">
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query("SELECT DISTINCT claveHraei, descripcionDelBien FROM ordensuministro where fechacontrato = $fechacontrato");
            while ($row_s = mysqli_fetch_array($sql_s)) {
                $ID_usuario = $row_s['claveHraei'];
                $nombre = $row_s['descripcionDelBien'];
            ?>
                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

            <?php
            }


            ?>

        </datalist>
        <div id="tabla_resul" class="table table-responsive table-striped table-darkgray table-hover" style="cursor: pointer;   font-size: 12px;"></div>

        <style>
            #datatables-example {
                width: 100%;
                margin-top: 0px;
                border: 1px solid #B4B4B4;
                cursor: pointer;
                white-space: nowrap;
                font-size: 12px;
            }
        </style>

        <table id="datatables-example" class="table table-striped table-bordered nowrap table-darkgray table-hover">

            <thead>

                <tr style="background-color:#7C7C7C; color: white; font-style: normal; ">
                    <!-- definimos cabeceras de la tabla -->
                    <th>clave orden</th>
                    <th>Ver orden</th>
                    <th>Fecha de orden</th>
                    <th>Fecha limite</th>
                    <th>$ orden</th>
                    <th>$ Monto Entregas</th>
                    <th>Seguimineto</th>
                    <th>Penalizar</th>
                    <th>Ver penalizaciones</th>
                </tr>

            </thead>
            <tbody>

                <?php
                error_reporting(0);

                $nombre = base64_decode($_GET['nombre']);
                $nombre3 = base64_encode($nombre);
                $var3 = base64_encode($var);
                $var2 = 0;

                require 'conexion.php';

                $sql = "SELECT DISTINCT numeroorden.claveUnicaContrato, numeroorden.fechaRegistro, numeroorden.fechaEntrego, numeroorden.totalOrden, numeroorden.cumplio, numeroorden.diasPenalizados, numeroorden.id_orden from numeroorden  where id_contrato= $var and estatus = 1";
                $result = mysqli_query($conexion2, $sql);

                while ($row = mysqli_fetch_assoc($result)) {

                    $tota_l = $row['claveUnicaContrato'];
                    $sq_l = "SELECT sum(monto) totalMonto, sum(monto2) totalMonto2, sum(monto3) totalMonto3, sum(monto4) totalMonto4, sum(monto5) totalMonto5 from ordensuministro where claveUnicaOrden = '$tota_l'";
                    $resul_t = mysqli_query($conexion2, $sq_l);
                    while ($row_s = $resul_t->fetch_assoc()) {

                        $cumplio = $row['cumplio'];

                        if ($cumplio == 'no') {
                            $date = $row['fechaRegistro'];
                            //Incrementamos los dias que se requieran
                            $mod_date = strtotime($date . "+ 15 days");
                            $dia = date("Y-m-d", $mod_date) . "\n";
                            $actual_dia = date("Y-m-d");

                            $datetime1 = date_create($dia);
                            $datetime2 = date_create($actual_dia);

                            if ($datetime2 >= $datetime1) {
                                $contador = date_diff($datetime1, $datetime2);
                                $differenceFormat = '%a';
                                $totalDias = $contador->format($differenceFormat);
                            } else {
                                $totalDias = 0;
                            }
                        } else {
                            $date = $row['fechaRegistro'];
                            $mod_date = strtotime($date . "+ 15 days");
                            $dia = date("Y-m-d", $mod_date) . "\n";
                            $totalDias = 'cumplio en entrega programada';
                        }
                        if ($cumplio == 'destiempo') {
                            $date = $row['fechaRegistro'];
                            $mod_date = strtotime($date . "+ 15 days");
                            $dia = date("Y-m-d", $mod_date) . "\n";
                            $totalDias = 'entrega a destiempo';
                        }
                        $claveUnica = base64_encode($row['claveUnicaContrato']);
                        $fecha = base64_encode($row['fechaRegistro']);
                        $dia2 = base64_encode($dia);
                        $totalDias2 = base64_encode($totalDias);
                ?>
                        <tr>
                            <td><?php echo $row['claveUnicaContrato'] ?></td>
                            <td><a href="verPDF?var='<?php echo $var3 ?>'&valor2='<?php echo $claveUnica ?>'" target="_blank"><i id="pdf" class="lnr lnr-file-empty" style="width: 50px; height: 20px; font-size: 22px; text-align: center;"></a></i></td>
                            <td id="fechadeRegistro" data-id_defecha='<?php echo $row['claveUnicaContrato'] ?>' contenteditable><?php echo $row['fechaRegistro'] ?></td>
                            <td><?php echo $dia ?></td>
                            <td><?php echo formatMoney($row['totalOrden']) ?></td>
                            <td><?php echo 'Primer entrega:&nbsp' . formatMoney($row_s['totalMonto']) . '<br>' . 'Segunda entrega:&nbsp' . formatMoney($row_s['totalMonto2']) . '<br>' . 'Tercer entrega:&nbsp' . formatMoney($row_s['totalMonto3']) . '<br>' . 'Cuarta entrega:&nbsp' . formatMoney($row_s['totalMonto4']) . '<br>' . 'Quinta entrega:&nbsp' . formatMoney($row_s['totalMonto5']) ?></td>
                            <td><a href="seguimientoEntrega?claveEntrega='<?php echo $claveUnica ?>'&dias='<?php echo $totalDias ?>'&nombre='<?php echo $nombre3 ?>'&fecha='<?php echo $fecha ?>'&fechaEntrega='<?php echo $dia2 ?>'&var='<?php echo $var3 ?>'" target="_blank" style="margin-top: 0%; outline:none; cursor:pointer; font-size: 20px; margin-left: 30px;"><span class="lnr lnr-enter"></span></a></td>
                            <td><button value="'<?php echo $claveUnica ?>'&dias='<?php echo $totalDias2 ?>'&nombre='<?php echo $nombre3 ?>'&fecha='<?php echo $fecha ?>'&fechaEntrega='<?php echo $dia2 ?>'&var='<?php echo $var3 ?>'" style="border: none; cursor:pointer; background: none; font-size: 22px; color: red; margin-left: 30px;"><span class="lnr lnr-lock"></span></button></td>
                            <td><a href="vistaPenalizaciones?var='<?php echo $var3 ?>'&valor2='<?php echo $claveUnica ?>'"><i id="pdf" class="lnr lnr-file-empty" style="width: 80px; height: 20px; font-size: 22px; text-align: center;"></a></i></td>


                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#datatables-example').DataTable({
            pagingType: 'full_numbers',
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</html>

<script>
    $("button").click(function() {
        var fired_button = $(this).val();

        window.location.href = "registrarEntrega?claveEntrega=" + fired_button;

    });
</script>
<script>
    $(document).on("blur", "#fechaEntrego", function() {

        let id = $(this).data("id_entrega");
        let nombre = $(this).text();
        actualizar_datos(id, nombre, "fechaEntrego");
    });
    $(document).on("blur", "#cumplio", function() {

        let id = $(this).data("id_cumplio");
        let nombre = $(this).text();
        actualizar_datos(id, nombre, "cumplio");
    });
    $(document).on("blur", "#diasPenalizados", function() {

        let id = $(this).data("id_penalizacion");
        let nombre = $(this).text();

        actualizar_datos(id, nombre, "diasPenalizados");
    });
    $(document).on("blur", "#fechadeRegistro", function() {

        let id = $(this).data("id_defecha");
        let nombre = $(this).text();
        // alert(id);
        actualizar_datos(id, nombre, "fechaRegistro");

    });


    function actualizar_datos(id, texto, columna) {

        let ob = {
            id: id,
            texto: texto,
            columna: columna
        };

        $.ajax({
            url: 'modelo/modelo_actualiza_ordenes.php',
            type: 'POST',
            data: ob,
            success: function(data) {
                $('#tabla_result').html(data);
            }

        })

    }
</script>