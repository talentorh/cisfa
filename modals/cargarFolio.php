<?php
$id_prov = $row['id_proveedor'];

?>
<div id="myModal_folio" class="modal fade" role="dialog">
    <style>
        label {
            color: black;
        }
    </style>
    <script>
        function deleteSpace() {
            var inputs = $("input[type=text]");
            for (var i = 0; i < inputs.length; i++) {
                var aux = $(inputs[i]).val().trim();
                $(inputs[i]).val(aux);
            }
        }
    </script>
    <script src="control_usuario.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 110%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <h4 class="modal-title"> Ingresa el número de orden </h4>
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="cabecera-contrato">
                        <div class="imagen1"></div>

                    </div>
                    <!-- form start -->
                    <form action="registrarFolio" method="POST">

                        <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">
                            <div class="form-body">

                                <div class="form-group"><br>
                                    <label>ID proveedor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                        <input name="id_proveedor" id="id_Proveedor" type="text" class="form-control" required="required" readonly value="<?php echo $row['id_proveedor']; ?>">
                                    </div>

                                    <label>Numero de orden</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                        <input name="numOrden" id="num_orden" type="text" onkeyup="deleteSpace();" class="form-control" autocomplete="off">

                                    </div>
                                    <div class="input-group">

                                        <input name="fechaOrden" id="fecha_orden" type="hidden" class="form-control">

                                    </div>

                                    <div class="input-group">

                                        <input name="rfc" id="rfc" type="hidden" class="form-control">
                                    </div>
                                    <div class="input-group">

                                        <input name="telefono" id="telefono" type="hidden" class="form-control">

                                    </div>


                                    <div class="input-group">

                                        <input name="direccionInternet" id="direccionInternet" type="hidden" class="form-control">

                                    </div>


                                    <div class="input-group">

                                        <input name="correoElectronico" id="correoElectronico" type="hidden" class="form-control">

                                    </div>


                                    <div class="input-group">

                                        <input name="numeroDeProcedimiento" id="numeroDeProcedimiento" type="hidden" class="form-control">

                                    </div>
                                </div>
                                <br>
                            </div>

                            <div id="panel_respuesta_edicion"></div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-info" name="almacenarFolio" value="Guardar" onclick="btn_guardar_proveedor();">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>