<div id="myModal_cargamedicamento" class="modal fade in" role="dialog">

    <meta charset="UTF-8">
    <div class="modal-dialog">

        <!--Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: green; color:white; ">
                <h4 class="modal-title"> Cargar medicamento</h4>
            </div>
            <div class="modal-body">
                <script>
                    function select_proveedormedicamento() {

                        let ID_contrato = $("#select_usuario").val();

                        let ob = {
                            ID_contrato: ID_contrato
                        };

                        $.ajax({
                            type: "POST",
                            url: "modelo/modelo_cargar_medicamento.php",
                            data: ob,
                            beforeSend: function(objeto) {

                            },
                            success: function(data) {

                                $("#panel_selector").html(data);

                            }
                        });
                    }
                </script>
                <strong>NUMERO DE CONTRATO</strong>
                <input list="lista" class="form-control" id="select_usuario" onchange="select_proveedormedicamento();" placeholder="Ingresa el numero de contrato">
                <datalist id="lista">


                    <?php

                    require 'conexion.php';

                    $sql_s = $conexion2->query("SELECT numero_pedido, numero_proveedor FROM proveedores where year = '2023' and tipoFarmacia = 'intrahospitalaria 2023'");
                    while ($row_s = mysqli_fetch_array($sql_s)) {
                        $ID_usuario = $row_s['numero_pedido'];
                        $nombre = $row_s['numero_pedido'];
                    ?>

                        <option value="<?php echo $nombre; ?>"> <?php echo $nombre; ?></option>


                    <?php
                    }

                    ?>

                </datalist>
                <div id="panel_selector"></div>
            </div>
            <div class="modal-footer">


            </div>
        </div>

    </div>
</div>