<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <title>Datos de proveedor</title>
</head>
<body>
    <div class="contrato-nuevo">
        <div class="cabecera-contrato">
            <div class="imagen1"></div>
        <!--
            <div class="hospital-text">
                <h5>2020 "AÑO DE LEONA VICARIO, BENEMÉRITA MADRE DE LA PATRIA"</h5><br>
                <h6>CONCENTRADO PROVEEDORES</h5>
                
            </div>
        -->
     
        </div>

        <div class="container" style="margin-top: 10px;">

            <div class="signup-form-container">
               
                <!-- form start -->

                <form action="editaDatosProveedor" id="register-form"  method="POST" autocomplete="off">
                    
                    <div class="form-header">
                       
                        <h3 class="form-title"><i class="fa fa-user"></i>Ingresa la información del proveedor</h3>

                        <div class="pull-right">
                            <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                        </div>

                    </div>

                    <div class="form-body">

                    <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="id_datoProveedor" type="hidden" class="form-control" placeholder="Numero de proveedor"
                                    required="required" value="<?php echo $row['id_datoProveedor'];?>"onkeyup="mayus(this);">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="numeroProveedor" type="hidden" class="form-control" placeholder="Numero de proveedor"
                                    required="required" value="<?php echo $row['numeroProveedor'];?>"onkeyup="mayus(this);">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="datoPersonalProveedor" type="text" class="form-control"
                                    placeholder="Nombre del proveedor" required="required" value="<?php echo $row['datoPersonalProveedor'];?>" onkeyup="mayus(this);">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="domicilioPersonal" type="text" class="form-control"
                                    placeholder="Domicilio personal" required="required" value="<?php echo $row['domicilioPersonal'];?>" onkeyup="mayus(this);">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="telefono" type="text" class="form-control"
                                    placeholder="Telefono" required="required" value="<?php echo $row['telefono'];?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="correoElectronico" type="text" class="form-control"
                                    placeholder="Correo electronico" required="required" value="<?php echo $row['correoElectronico'];?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="rfc" type="text" class="form-control"
                                    placeholder="R.F.C" required="required" value="<?php echo $row['rfc'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="direccionInternet" type="text" class="form-control"
                                    placeholder="Direccion de internet" required="required" value="<?php echo $row['direccionInternet'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="numeroDeProcedimiento" type="text" class="form-control"
                                    placeholder="Numero de procedimiento" value="<?php echo $row['numeroDeProcedimiento'];?>" onkeyup="mayus(this);">
                            </div>
                        </div>
                       
            </div>

            <div class="form-footer">

                <input type="submit" class="btn btn-info" name="editaProveedor" value="Editar">
                <a href="listaProveedores" class="btn btn-danger" >Regresar</a>

            </div><br>



            </form>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <script src="frontend/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/assets/jquery-1.11.2.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>