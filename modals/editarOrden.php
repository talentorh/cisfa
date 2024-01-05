<div id="myModal_editarOrden" class="modal fade" role="dialog">
    <script src="control_usuario.js"></script>
    <script src="metas.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <h4 class="modal-title">Editar orden de suministro</h4>
            </div>
            <div class="modal-body">

                <div class="contrato-nuevo">
                    <div class="cabecera-contrato">
                        <div class="imagen1"></div>


                    </div><br>


                    <form action="editarOrden" method="GET">

                        <strong style="color: black;">SELECCIONA EL NUMERO DE ORDEN</strong>

                        <input list="editarOrden" id="mySelect" class="form-control" name="Wz" style="height: 35px;" onchange="select(this.value);">

                        <datalist id="editarOrden">
                            <?php
                            require 'conexion.php';
                            $sql_s = $conexion2->query("SELECT claveUnicaContrato FROM numeroorden where fechaRegistro like '%2023%' and estatus = 1 and tipoFarmacia = 'intrahospitalaria'");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario = $row_s['claveUnicaContrato'];
                                $nombre = $row_s['claveUnicaContrato'];
                            ?>
                                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                            <?php
                            }


                            ?>

                        </datalist><br>
                        <input type="submit" name="guarda" class="btn btn-success" value="Buscar Orden" style="width: 100%; margin-left: 0px; margin-top: 10px;"><br><br><br>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>