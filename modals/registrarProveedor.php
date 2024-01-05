<div id="myModal_proveedor" class="modal fade in" role="dialog">
    <script src="control_usuario.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: green; color: white;">
                <h4 class="modal-title"> Ingresa los datos del proveedor </h4>
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="cabecera-contrato">
                        <div class="imagen1"></div>

                    </div>
                    <!-- form start -->
                    <form action="registrarProveedor" method="POST">

                        <div class="form-body">

                            <div class="form-group"><br>
                                <strong>NOMBRE DEL PROVEEDOR</strong>
                                <input name="datoPersonalProveedor" id="datoPersonalProveedor" type="text" class="form-control" required="required">


                                <strong>DOMICILIO PERSONAL</strong>
                                <input name="domicilioPersonal" id="domicilioPersonal" type="text" class="form-control">


                                <strong>R.F.C</strong>

                                <input name="rfc" id="rfc" type="text" class="form-control">


                                <strong>TELEFONO</strong>
                                <input name="telefono" id="telefono" type="text" class="form-control">



                                <strong>DIRECCIÓN DE INTERNET</strong>
                                <input name="direccionInternet" id="direccionInternet" type="text" class="form-control">


                                <strong>CORREO ELECTRONICO</strong>
                                <input name="correoElectronico" id="correoElectronico" type="text" class="form-control">


                                <strong>NUMERO DE PROCEDIMIENTO</strong>

                                <input name="numeroDeProcedimiento" id="numeroDeProcedimiento" type="text" class="form-control">

                            </div>
                        </div>
                        <br>
                </div>

                <div id="panel_respuesta_edicion"></div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-info" name="almacenarProveedor" value="Guardar" onclick="btn_guardar_proveedor();">


            </div>
        </div>
    </div>
</div>
</div>
</form>