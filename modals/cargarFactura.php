<div id="myModal_cargarFactura" class="modal fade" role="dialog">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 700px; height: 550px; color: white;  margin-top: 35px; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Facturas CISFA </h4>
            </div>
            <div class="modal-body">

                <div class="imagen1"></div>


            </div>

            <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">
                <strong id="strong" style="color:black; float: right;">Numero factura:</strong><br>
                <input type="text" id="numFactura" class="form-control" required="required" value="" style="width: 30%; float: right">

                <strong id="strong" style="color:black; float: left; margin-top: -20px;">Fecha:</strong><br>
                <input type="date" id="fechaFactura" class="form-control" required="required" value="" style="width: 30%; float: left;  margin-top: -20px;"><br>

                <strong id="strong" style="color:black; float: left;">Nombre proveedor:</strong><br>
                <input list="proveedor" id="proveedorDato" class="form-control" onchange="" type="text" placeholder="Escribe el nombre del proveedor">
                <datalist id="proveedor">
                    <?php
                    require 'conexion.php';
                    $sql_s = $conexion2->query("SELECT * FROM datosproveedor");
                    while ($row_s = mysqli_fetch_array($sql_s)) {
                        $ID_usuario = $row_s['datoPersonalProveedor'];
                        $nombre = $row_s['datoPersonalProveedor'];
                    ?>
                        <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                    <?php
                    }


                    ?>
                </datalist>
                <strong id="strong" style="color:black; float: left; ">Número de contrato</strong><br>
                <input type="text" id="numeroContrato" class="form-control" required="required" value="">

                <strong style="color: black;">CLAVE HRAEI</strong>

                <input list="selectClave" class="form-control" id="selectCla" name="" type="text" style="height: 35px; width: 100%;" onchange="selectProv();">

                <datalist id="selectClave">
                    <?php
                    require 'conexion.php';
                    $sql_s = $conexion2->query("SELECT DISTINCT CLAVEHRAEI, DESCRIPCION FROM listamedicamento where fechaContrato = 2021 or fechaContrato = 2022");
                    while ($row_s = mysqli_fetch_array($sql_s)) {
                        $ID_usuario = $row_s['CLAVEHRAEI'];
                        $nombre = $row_s['DESCRIPCION'];
                    ?>
                        <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                    <?php
                    }


                    ?>

                </datalist>
                <strong style="color: black;">CNIS</strong>

                <input list="selectClaveCnis" class="form-control" id="selectClavCnis" name="" type="text" style="height: 35px; width: 100%;" onchange="selectCnis();">

                <datalist id="selectClaveCnis">
                    <?php
                    require 'conexion.php';
                    $sql_s = $conexion2->query("SELECT DISTINCT CLAVEDECUADROBASICO, DESCRIPCION FROM listamedicamento where fechaContrato = 2021 or fechaContrato = 2022");
                    while ($row_s = mysqli_fetch_array($sql_s)) {
                        $ID_usuario = $row_s['CLAVEDECUADROBASICO'];
                        $nombre = $row_s['DESCRIPCION'];
                    ?>
                        <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                    <?php
                    }


                    ?>

                </datalist><br>

                <script>
                    function selectProv(val) {
                        let proveedor = $("#proveedorDato").val();
                        let factura = $("#numFactura").val();
                        let fechaFactura = $("#fechaFactura").val();
                        let clave = $("#selectCla").val();
                        let contrato = $("#numeroContrato").val();
                        let ob = {
                            proveedor: proveedor,
                            factura: factura,
                            fechaFactura: fechaFactura,
                            clave: clave,
                            contrato: contrato
                        };

                        $.ajax({
                            type: "POST",
                            url: 'consultaCargaFactura.php',
                            data: ob,
                            success: function(resp) {
                                $('#tabla_resultado').html(resp);

                            }

                        });

                    }

                    function selectCnis(val) {
                        let proveedor = $("#proveedorDato").val();
                        let factura = $("#numFactura").val();
                        let fechaFactura = $("#fechaFactura").val();
                        let clave = $("#selectClavCnis").val();
                        let contrato = $("#numeroContrato").val();
                        let ob = {
                            proveedor: proveedor,
                            factura: factura,
                            fechaFactura: fechaFactura,
                            clave: clave,
                            contrato: contrato
                        };

                        $.ajax({
                            type: "POST",
                            url: 'consultaCargaFacturaCnis.php',
                            data: ob,
                            success: function(resp) {
                                $('#tabla_resultado').html(resp);

                            }

                        });

                    }
                </script>

            </div>
        </div>
    </div>
</div>
</div>