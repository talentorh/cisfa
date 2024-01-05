<script>
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });

    function guarda() {
        if ($('#numeroContrato').val().length == 0) {
            alert('Ingrese los datos requeridos');
            return false;
        }
        if ($('#descripcion').val().length == 0) {
            alert('Ingrese los datos requeridos');
            return false;
        }
        if ($('#clave_cuadro_basico').val().length == 0) {
            alert('Ingrese los datos requeridos');
            return false;
        }
        if ($('#cucop').val().length == 0) {
            alert('Ingrese los datos requeridos');
            return false;
        }

        let designacion = $("#designacion").val();
        let proveedor = $("#nombreproveedor").val();
        let clave_hraei = $("#clave_hraei").val();
        let descripcion = $("#descripcion").val();
        let clave_cuadro_basico = $("#clave_cuadro_basico").val();
        let cucop = $("#cucop").val();
        let unidad_medida = $("#unidad_medida").val();
        let precio_unitario_sin_iva = $("#txt_campo_1").val();
        let hraei_minimo = $("#txt_campo_2").val();
        let hraei_maximo = $("#txt_campo_3").val();
        let hraei_minimo_costo = $("#spTotal").val();
        let hraei_maximo_costo = $("#spTotal2").val();
        let otroLaboratorio = $("#otroLaboratorio").val();
        let year = $("#year").val();
        let numeroContrato = $("#numeroContrato").val();
        let tipofarmacia = $("#tipoFarmacia").val();
        // let id_contratoclave = $("#contratoclave").val();
        let ob = {
            designacion: designacion,
            proveedor: proveedor,
            clave_hraei: clave_hraei,
            descripcion: descripcion,
            clave_cuadro_basico: clave_cuadro_basico,
            cucop: cucop,
            unidad_medida: unidad_medida,
            precio_unitario_sin_iva: precio_unitario_sin_iva,
            hraei_minimo: hraei_minimo,
            hraei_maximo: hraei_maximo,
            hraei_minimo_costo: hraei_minimo_costo,
            hraei_maximo_costo: hraei_maximo_costo,
            otroLaboratorio: otroLaboratorio,
            year: year,
            numeroContrato: numeroContrato,
            tipofarmacia: tipofarmacia
        };

        $.ajax({
            type: "POST",
            url: "registrarMedicamento.php",
            data: ob,
            beforeSend: function(objeto) {

            },
            success: function(data) {
                $("#tabla_resultado").html(data);
                $("#tabla_resultado").load('tablamedicamento.php');
            }
        });

    }

    function limpiar() {

        setTimeout('document.formulario.reset()', 2000);
        return false;
    }
</script>




<!-- form start -->
<form name="formulario" onSubmit="return limpiar()">
    <strong>AÑO</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <input id="year" type="text" class="form-control" value="2023" required="required" onkeyup="mayus(this);" readonly>
    </div>


    <?php
    $contrato = $_POST['ID_contrato'];
    require '../conexion.php';
    $sql_s = $conexion2->query("SELECT numero_pedido, numero_proveedor  FROM proveedores where year = '2024' and id_proveedor = $contrato");
    $row = mysqli_fetch_assoc($sql_s);
    $numeroProveedor = $row['numero_proveedor'];



    $sql_s = $conexion2->query("SELECT datoPersonalProveedor FROM datosproveedor  where id_datoProveedor = $numeroProveedor");
    $row_s = mysqli_fetch_array($sql_s);

    $nombre = $row_s['datoPersonalProveedor'];


    ?>


    <strong>NÚMERO DE CONTRATO/PEDIDO</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <input id="numeroContrato" type="text" class="form-control" value="<?php echo $contrato; ?>" required="required" readonly>
    </div>
    <strong>NOMBRE PROVEEDOR</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <input id="nombreproveedor" type="text" class="form-control" value="<?php echo $nombre; ?>" readonly>
    </div>
    <input type="hidden" id="farmaciaTipo" requerided="requireded" style="width: 200px; border: 1px solid black; height: 35px; color: black; border-radius: 10px;">
    <strong>FARMACIA</strong>
    <select id="tipoFarmacia" class="form-control">
        <!--<option value="">Seleccione la farmacia</option>-->
        <option value="intrahospitalaria">Intrahospitalaria</option>
        <!--<option value="gratuita">Gratuita</option>-->

    </select>

    <script>
        $(function() {
            $('#tipoFarmacia').on("change", function() { //detectamos el evento change
                var value = $(this).val(); //sacamos el valor del select
                var valor = $('#farmaciaTipo').val(value);
                var valor = $('#farmaciaTipo').val();



            });
        });
    </script>



    <strong>DESIGNACIÓN</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <input id="designacion" type="text" class="form-control" value="100%">
    </div>


    <div id="input"></div>



    <strong>CLAVE HRAEI</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <input id="clave_hraei" type="text" class="form-control" onkeyup="mayus(this);" value="HRAEI-MD">
    </div>


    <strong>DESCRIPCIÓN</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <textarea rows="6" id="descripcion" class="form-control" onkeyup="mayus(this);" required="required"></textarea>
    </div>


    <strong>CLAVE DE CUADRO BASICO</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <input id="clave_cuadro_basico" type="text" class="form-control" onkeyup="mayus(this);" required="required">
    </div>


    <strong>CUCOP</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
        <input id="cucop" type="text" class="form-control" onkeyup="mayus(this);" required="required">
    </div>


    <strong>UNIDAD DE MEDIDA</strong>
    <select id="unidad_medida" id="" class="form-control">
        <option value="">Seleccione la unidad de Medida</option>
        <option value="Pieza">Pieza</option>
        <option value="Envase">Envase</option>
        <option value="Bolsa">Bolsa</option>
        <option value="Caja">Caja</option>
        <option value="Tubo">Tubo</option>
        <option value="Ampula">Ampula</option>
        <option value="Frasco">Frasco</option>
    </select>

    <strong>PRECIO UNITARIO ADJUDICADO SIN I.V.A</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
        <input type="number" class="form-control" id="txt_campo_1" onkeyup="multiplicar(this.value);" min="0.0" max="900000.00" step="0.01">
    </div>

    <strong>CONSUMO MINIMO</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
        <input type="text" class="form-control" id="txt_campo_2" onkeyup="multiplicar(this.value);">
    </div>


    <strong>CONSUMO MAXIMO</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
        <input type="text" id="txt_campo_3" class="form-control" onkeyup="multiplicar(this.value);">
    </div>


    <strong>COSTO MÍNIMO</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
        <input type="text" class="form-control" readonly="readonly" id="spTotal">

    </div>

    <strong>COSTO MAXIMO</strong>
    <div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
        <input type="text" class="form-control" readonly="readonly" id="spTotal2">
    </div>
    <br>
    <div class="form-footer">

        <input type="submit" class="btn btn-info" onclick="guarda();" value="Registrar">
        <a href='' class="btn btn-danger" onclick="window.reload();">Finalizar</a>

    </div><br>
    <script>
        function multiplicar(valor) {
            total1 = document.getElementById('txt_campo_1').value;
            total2 = document.getElementById('txt_campo_2').value;
            total5 = document.getElementById('txt_campo_3').value;
            total3 = parseFloat(total1);
            total = parseFloat(Math.round(total3 * total2 * 100) / 100).toFixed(2);
            total4 = parseFloat(Math.round(total3 * total5 * 100) / 100).toFixed(2);
            document.getElementById('spTotal').value = total;
            document.getElementById('spTotal2').value = total4
        }
    </script>
</form>
<div id="tabla_resultado2"></div>
</div>

</div>
</div>
</div>
</div>
</div>