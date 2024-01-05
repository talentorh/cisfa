<div id="myModal_folioPenalizacion" class="modal fade" role="dialog">
    <style>
        label {
            color: black;
        }
    </style>
    <script src="control_usuario.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 110%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ingresa el número de oficio </h4>
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="cabecera-contrato">
                        <div class="imagen1"></div>

                    </div>


                    <!-- form start -->
                    <form action="registrarFolioPenalizacion" method="POST">

                        <div class="container" style="margin-top: 20px; width: 97%; padding: 5px;">
                            <div class="form-body">

                                <div class="form-group"><br>


                                    <label>Numero de oficio</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                        <input name="numOrdenOficio" id="num_orden" type="text" class="form-control" onkeyup="mayus(this);">

                                    </div>


                                    <div class="input-group">

                                        <input name="fechaOrden" id="fecha_orden" type="hidden" class="form-control" onkeyup="mayus(this);">

                                    </div>


                                    <div class="input-group">

                                        <input name="rfc" id="rfc" type="hidden" class="form-control" onkeyup="mayus(this);">

                                    </div>


                                    <div class="input-group">

                                        <input name="telefono" id="telefono" type="hidden" class="form-control">

                                    </div>


                                    <div class="input-group">

                                        <input name="direccionInternet" id="direccionInternet" type="hidden" class="form-control" onkeyup="mayus(this);">

                                    </div>


                                    <div class="input-group">

                                        <input name="correoElectronico" id="correoElectronico" type="hidden" class="form-control">

                                    </div>


                                    <div class="input-group">

                                        <input name="numeroDeProcedimiento" id="numeroDeProcedimiento" type="hidden" class="form-control" onkeyup="mayus(this);">

                                    </div>
                                </div>
                                <br>
                            </div>

                            <div id="panel_respuesta_edicion"></div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-info" name="almacenarFolioPenalizacion" value="Guardar" onclick="btn_guardar_proveedor();">

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>