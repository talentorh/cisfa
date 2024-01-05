<div id="myModal_medicamentoEnOrden" class="modal fade" role="dialog">
    <script src="scripts/medicamentoEnOrden.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white; ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>


                        </div>
                        <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">
                            <label>NOMBRE O CNIS DEL MEDICAMENTO</label>
                            <input list="consult_medicaorden" class="form-control" id="medicamento_orden" name="" type="text" onchange="medicamento_enorden();">

                            <datalist id="consult_medicaorden">
                                <?php
                                require 'conexion.php';
                                $sql_s = $conexion2->query("SELECT DISTINCT cuadroBasico, descripcionDelBien FROM ordensuministro where fechacontrato = '2023'");
                                while ($row_s = mysqli_fetch_array($sql_s)) {
                                    $ID_usuario = $row_s['cuadroBasico'];
                                    $nombre = $row_s['descripcionDelBien'];
                                ?>
                                    <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                                <?php
                                }


                                ?>

                            </datalist>

                            <label>NOMBRE O CLAVE DEL MEDICAMENTO</label>
                            <input list="consultaMedicamentoEnOrden" class="form-control" id="medicamento_ordenClave" name="" type="text" onchange="medicamento_enordenClave();">

                            <datalist id="consultaMedicamentoEnOrden">
                                <?php
                                require 'conexion.php';
                                $sql_s = $conexion2->query("SELECT DISTINCT claveHraei, descripcionDelBien FROM ordensuministro where fechaContrato = '2023'");
                                while ($row_s = mysqli_fetch_array($sql_s)) {
                                    $ID_usuario = $row_s['claveHraei'];
                                    $nombre = $row_s['descripcionDelBien'];
                                ?>
                                    <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                                <?php
                                }


                                ?>

                            </datalist>


                            <!-- form start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>