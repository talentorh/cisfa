<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <link rel="stylesheet" href="css/style.css?n=1">
    <script src="iconos/js/all.min.js"></script>

    <title>Datos de medicamento</title>
    <?php
    require 'conexion.php';
    $id_prov = $row['id_proveedor'];
    $fonsabi = 'FONSABI';
    $sql_s = $conexion2->query("SELECT * from numeroorden where id_contrato = $id_prov and estatus = 1 order by claveUnicaContrato desc ");
    $res = mysqli_fetch_assoc($sql_s);

    $sql_r = $conexion2->query("SELECT claveUnicaContrato from numeroorden where claveUnicaContrato like '%$fonsabi%' and estatus = 1 order by claveUnicaContrato desc");
    $resp = mysqli_fetch_assoc($sql_r);


    ?>

<body>

    <div class="container" style="width: 800px; margin-top: 25px;">

        <div class="signup-form-container">

            <!-- form start -->



            <div class="form-header">
                <h3 class="form-title"><i class="fa fa-user"></i>INFORMACIÓN DEL PROVEEDOR</h3>
                <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal" data-target="#myModal_folioFG" style="margin-left: 0px; background: none; color: blue; font-size: 14px; cursor: pointer;" value="Cargar N° de orden"></div>
                <div class="form-body">
                    <input type="hidden" id="id_proveedor" value="<?php echo base64_encode($row['id_proveedor']); ?>" style="width: 80px; border: 1px solid black; height: 35px; color: black; float: left; margin-left: 5px; margin-top: -25px;"><br>
                    <input type="hidden" id="contrato" value="<?php echo base64_encode($contrato); ?>" style="width: 80px; border: 1px solid black; height: 35px; color: black; float: left; margin-left: 5px; margin-top: -25px;"><br>


                    <div class="form-group">
                        <strong>Ultimo numero de folio ocupado</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="numOrden" type="text" class="form-control" required="required" onkeyup="mayus(this);" value="<?php error_reporting(0);
                                                                                                                                        echo $res['claveUnicaContrato']; ?>" readonly="readonly">
                        </div>

                    </div>

                    <div class="form-group">

                        <strong>SELECCIONA LA CLAVE INTRAHOSPITALARIA</strong>
                        <select class="form-control" id="mySelect" name="claveUnicaContrato" style="height: 35px;">
                            <option value=""> Seleccione la clave </option>
                            <?php

                            require 'conexion.php';

                            $sql_s = $conexion2->query("SELECT * FROM numeroorden where estatus = 0 and id_contrato = $id_prov and tipoFarmacia = 'gratuita'");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario2 = base64_encode($row_s['claveUnicaContrato']);
                                $nombre = $row_s['claveUnicaContrato'];
                            ?>

                                <option value="<?php echo $ID_usuario2; ?>"> <?php echo $nombre; ?></option>


                            <?php
                            }

                            ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <strong>SELECCIONA LA CLAVE FONSABI</strong>
                        <select class="form-control" id="mySelect2" name="claveUnicaContrato2" style="height: 35px;">
                            <option value=""> Seleccione la clave </option>
                            <?php

                            require 'conexion.php';

                            $sql_s = $conexion2->query("SELECT * FROM numeroorden where claveUnicaContrato like '%$fonsabi%' and estatus = 0 and tipoFarmacia = 'gratuita'");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario2 = base64_encode($row_s['claveUnicaContrato']);
                                $nombre = $row_s['claveUnicaContrato'];
                            ?>

                                <option value="<?php echo $ID_usuario2; ?>"> <?php echo $nombre; ?></option>


                            <?php
                            }

                            ?>

                        </select>

                    </div>

                    <div class="form-group">
                        <strong>Contrato N°</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="contrato" type="text" class="form-control" placeholder="OFICIO DE INFORME DE NOTIFICACIÓN" required="required" onkeyup="mayus(this);" value="<?php echo $contrato; ?>" readonly="readonly">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>Datos del proveedor</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="oficio_informe" type="text" class="form-control" required="required" onkeyup="mayus(this);" value="<?php echo $row['datoPersonalProveedor']; ?>" readonly="readonly">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>Domicilio</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="fecha_oficio" type="text" class="form-control" required="required" value="<?php echo $row['domicilioPersonal']; ?>" readonly="readonly">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>Telefono</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="grupo" type="text" class="form-control" required="required" value="<?php echo $row['telefono']; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Correo electronico</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="designacion" type="text" class="form-control" required="required" value="<?php echo $row['correoElectronico']; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>N° de contrato pedido</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="proveedor" type="text" class="form-control" placeholder="Proveedor" value="<?php echo $contrato; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Fecha</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="OtroProveedor" type="text" class="form-control" placeholder="Otro Proveedor" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                        </div>
                    </div>

                    <strong>N° de orden de suministro</strong>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                        <input name="clave_hraei" type="text" class="form-control" placeholder="CLAVE HRAEI" required="required" onkeyup="mayus(this);" id="claveUnicaContrato">
                    </div>
                </div>

            </div>

        </div>
        <a href="" class="btn btn-danger" onclick="window.close();" style=" width: 150px; float: left; margin-left: 30px; margin-top: 20px;">Cancelar</a><br><br><br><br><br>
        <script>
            $(function() {
                $('#mySelect').change(function() { //detectamos el evento change
                    let value = $(this).val(); //sacamos el valor del select
                    let valor = $('#claveUnicaContrato').val(value); //le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
                    // var claveUnica= document.getElementById('claveUnicaContrato').value;
                    let id_unico = $("#id_proveedor").val();
                    let contrato = $("#contrato").val();

                    window.location.href = 'cargaMedicamentoFG?Wz=' + value + '&id_proveedor=' + id_unico + '&tr=' + contrato;

                });

            });

            $(function() {
                $('#mySelect2').change(function() { //detectamos el evento change
                    let value = $(this).val(); //sacamos el valor del select
                    let valor = $('#claveUnicaContrato2').val(value); //le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
                    // var claveUnica= document.getElementById('claveUnicaContrato').value;
                    let id_unico = $("#id_proveedor").val();
                    let contrato = $("#contrato").val();

                    window.location.href = 'cargaMedicamento?Wz=' + value + '&Zw=' + id_unico + '&tr=' + contrato;

                });

            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
        </script>
</body>

</html>
<?php
require 'modals/cargarFolioFG.php';

?>