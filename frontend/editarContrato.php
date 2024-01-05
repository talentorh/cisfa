<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <title>Datos de contrato</title>
</head>

<body>
    <?php
    $var2 = base64_encode($row['id_proveedor']);
    $contPed = base64_encode($row['numero_pedido']);
    ?>
    <div class="contrato-nuevo">



        <div class="container" style="width: 750px; margin-top: 35px;">
            <div class="imagen1" style="width: 200px; float: left; margin-left: 10px;"></div>
            <div class="signup-form-container">
                <!--
            <div class="hospital-text">
                <h5>2020 "AÑO DE LEONA VICARIO, BENEMÉRITA MADRE DE LA PATRIA"</h5><br>
                <h6>CONCENTRADO PROVEEDORES</h5>
                
            </div>
        -->
                <div class="descripcion" style="width: auto;  float: right; margin-right: 0px; margin-top: 30px;">
                    <p style="font-size: 12px;">Hospital Regional de Alta Especialidad de Ixtapaluca.<br>
                        Dirección de Administración y Finanzas.<br>
                        Subdirección de Recursos Materiales.</p>
                </div>
            </div>

            <!-- form start -->

            <form action="editaDatosContrato" id="register-form" method="POST" autocomplete="off">

                <div class="form-header">


                    <div class="pull-right">
                        <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>

                </div>

                <div class="form-body">

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="id_proveedor" type="hidden" class="form-control" placeholder="Nombre proveedor" required="required" onkeyup="mayus(this);" readonly value="<?php echo $row['id_proveedor']; ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <strong>Nombre del proveedor</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input type="text" readonly class="form-control" placeholder="Nombre proveedor" required="required" onkeyup="mayus(this);" value="<?php echo $row['datoPersonalProveedor']; ?>">
                        </div>

                    </div>


                    <div class="form-group">
                        <strong>Domicilio del proveedor</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input readonly type="text" class="form-control" placeholder="Domicilio proveedor" required="required" onkeyup="mayus(this);" value="<?php echo $row['domicilioPersonal']; ?>">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>R.F.C</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input readonly type="text" class="form-control" placeholder="Registro federal de contribuyentes" required="required" onkeyup="mayus(this);" value="<?php echo $row['rfc']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Telefono</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input readonly type="text" class="form-control" placeholder="Telefono" required="required" value="<?php echo $row['telefono']; ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <strong>Correo electronico</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input readonly type="text" class="form-control" placeholder="Correo electronico" required="required" value="<?php echo $row['correoElectronico']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Numero de contrato</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="numero_pedido" type="text" class="form-control" placeholder="Numero de pedido" required="required" onkeyup="mayus(this);" value="<?php echo $row['numero_pedido']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Suficiencia presupuestaria</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="suficiencia_presupuestaria" type="text" class="form-control" placeholder="Suficiencia presupuestaria" required="required" onkeyup="mayus(this);" value="<?php echo $row['suficiencia_presupuestaria']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Requisición</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="requisicion" type="text" class="form-control" placeholder="Requisicion" required="required" onkeyup="mayus(this);" value="<?php echo $row['requisicion']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Partida presupuestaria</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="partida_presupuestaria" type="text" class="form-control" placeholder="Partida presupuestaria" required="required" value="<?php echo $row['partida_presupuestaria']; ?>">
                        </div>
                    </div>

                <div class="form-group col-lg-6">
                    <label class="fecha-inicio">Fecha de firma</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="fecha_firma" type="date" class="form-control" placeholder="Fecha de firma" required="required" value="<?php echo $row['fecha_firma']; ?>">
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label class="fecha-inicio">Vigencia del pedido fecha de inicio</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="vigencia_pedido_inicio" type="date" class="form-control" placeholder="Fecha inicio" required="required" value="<?php echo $row['vigencia_pedido_inicio']; ?>">
                    </div>

                </div>
                <div class="form-group col-lg-6">
                    <label class="fecha-inicio">Vigencia del pedido fecha de termino</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="vigencia_pedido_final" type="date" class="form-control" placeholder="Fecha termino" required="required" value="<?php echo $row['vigencia_pedido_final']; ?>">
                    </div>

                </div>
            </div>

                <div style="width: 100%; height:auto; background: #E7E7E7; padding: 5px; display: flex; align-items:center; justify-content:center;">
                    <a href="principal" class="btn btn-danger">Regresar</a>&nbsp;&nbsp;
                    <input type="submit" class="btn btn-info" name="editar" value="Editar">&nbsp;&nbsp;

                    <?php
                    echo '<a href="insumosEnContrato?var2=' . $var2 . '&&contPed=' . $contPed . '" class="btn btn-info">Siguiente</a>';
                    ?>
                </div><br>



            </form>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <script src="frontend/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/assets/jquery-1.11.2.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>