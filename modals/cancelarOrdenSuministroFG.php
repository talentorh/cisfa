<div id="myModal_cancelarOrden" class="modal fade" role="dialog">
    <script src="control_usuario.js"></script>
    <script src="metas.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <h4 class="modal-title"> Cancelar orden de suministro </h4>
            </div>
            <div class="modal-body">

                <div class="contrato-nuevo">
                    <div class="cabecera-contrato">
                        <div class="imagen1"></div>


                    </div><br>


                    <form action="cancelaOrdenFG" method="GET">

                        <strong style="color: black;">SELECCIONA EL NUMERO DE CANCELACION</strong>

                        <input list="cancelarOrden" id="mySelect" class="form-control" name="oficio_informe" style="height: 35px;" onchange="select(this.value);">

                        <datalist id="cancelarOrden">
                            <?php
                            require 'conexion.php';
                            $sql_s = $conexion2->query("SELECT claveUnicaContrato FROM numeroorden where fechaRegistro like '%2023%' and estatus = 1 and tipoFarmacia = 'gratuita'");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario = $row_s['claveUnicaContrato'];
                                $nombre = $row_s['claveUnicaContrato'];
                            ?>
                                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                            <?php
                            }


                            ?>

                        </datalist>

                        <!--<strong id="strong" style="color:black;">ID CONTRATO:</strong><br>
                        <select class="form-control" id="tabla_rest" type="hidden" name="idcont"  onclick="cancela();" style=" height: 35px;">
                        <option value=""> Seleccione el numero de contrato </option>
                        <input type="hidden" name="guarda" class="btn btn-danger" value="Buscar Orden" 
                            style="width: 100%; margin-left: 0px; margin-top: 10px;">
                        <strong id="strong" style="color:black;">ID CONTRATO:</strong>
                        <select class="form-control" id="tabla_rests" type="hidden" name="idcontar" style=" height: 35px;">
                        <option value=""> Seleccione el numero de contrato </option>--><br>
                        <input type="submit" name="guarda" class="btn btn-warning" value="Buscar Orden" style="width: 100%; margin-left: 0px; margin-top: 10px;"><br><br><br>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>