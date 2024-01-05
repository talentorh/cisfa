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
                <div class="descripcion" style="width: auto; float: right; margin-right: 0px; margin-top: 30px;">
                    <p style="font-size: 12px;">Hospital Regional de Alta Especialidad de Ixtapaluca.<br>
                        Dirección de Administración y Finanzas.<br>
                        Subdirección de Recursos Materiales.</p>
                </div>
            </div>
            <form action="registrarContrato" id="register-form" method="POST" autocomplete="off">

                <div class="form-header">


                    <div class="pull-right">
                        <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>

                </div>

                <div class="form-body">
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="id_proveedor" type="hidden" class="form-control" placeholder="Nombre proveedor" required="required" onkeyup="mayus(this);" value="<?php echo $row['nombre_proveedor']; ?>" readonly="readonly">
                        </div>

                    </div>

                    <div class="form-group">
                        <strong>Nombre del proveedor</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="nombre_proveedor" type="text" class="form-control" placeholder="Nombre proveedor" required="required" onkeyup="mayus(this);" value="<?php echo $row['nombre_proveedor']; ?>" readonly="readonly">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>Domicilio del proveedor</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="domicilio_proveedor" type="text" class="form-control" placeholder="Domicilio proveedor" required="required" onkeyup="mayus(this);" value="<?php echo $row['domicilio_proveedor']; ?>" readonly="readonly">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>R.F.C</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="rfc_proveedor" type="text" class="form-control" placeholder="Registro federal de contribuyentes" required="required" onkeyup="mayus(this);" value="<?php echo $row['rfc_proveedor']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Telefono</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="telefono_proveedor" type="text" class="form-control" placeholder="Telefono" required="required" value="<?php echo $row['telefono_proveedor']; ?>" readonly="readonly">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>Dirección de internet</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="direccion_internet" type="text" class="form-control" placeholder="Direccion internet" required="required" value="<?php echo $row['direccion_internet']; ?>" readonly="readonly">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>Correo electronico</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="email_proveedor" type="email" class="form-control" placeholder="Correo electronico" required="required" value="<?php echo $row['email_proveedor']; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Numero de pedido</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="numero_pedido" type="text" class="form-control" placeholder="Numero de pedido" required="required" onkeyup="mayus(this);" value="<?php echo $row['numero_pedido']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Suficiencia presupuestaria</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="suficiencia_presupuestaria" type="text" class="form-control" placeholder="Suficiencia presupuestaria" required="required" onkeyup="mayus(this);" value="<?php echo $row['suficiencia_presupuestaria']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Requisición</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="requisicion" type="text" class="form-control" placeholder="Requisicion" required="required" onkeyup="mayus(this);" value="<?php echo $row['requisicion']; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Partida presupuestaria</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                            <input name="partida_presupuestaria" type="text" class="form-control" placeholder="Partida presupuestaria" required="required" onkeyup="mayus(this);" value="<?php echo $row['partida_presupuestaria']; ?>" readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label class="fecha-inicio">Fecha de firma</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="fecha_firma" type="date" class="form-control" placeholder="Fecha de firma" required="required" value="<?php echo $row['fecha_firma']; ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label class="fecha-inicio">Vigencia del pedido fecha de inicio</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="vigencia_pedido_inicio" type="date" class="form-control" placeholder="Fecha inicio" required="required" value="<?php echo $row['vigencia_pedido_inicio']; ?>" readonly="readonly">
                    </div>

                </div>
                <div class="form-group col-lg-6">
                    <label class="fecha-inicio">Vigencia del pedido fecha de termino</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="vigencia_pedido_final" type="date" class="form-control" placeholder="Fecha termino" required="required" value="<?php echo $row['vigencia_pedido_final']; ?>" readonly="readonly">
                    </div>

                </div>
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Monto</h3>
                    <div class="card-body">
                        <div id="table" class="table-editable">
                            <span class="table-add float-right mb-3 mr-2"><a href="#" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Minimo</th>
                                        <th class="text-center">Maximo</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        function formatMoney($number, $cents = 1)
                                        { // cents: 0=never, 1=if needed, 2=always
                                            if (is_numeric($number)) { // a number
                                                if (!$number) { // zero
                                                    $money = ($cents == 2 ? '0.00' : '0'); // output zero
                                                } else { // value
                                                    if (floor($number) == $number) { // whole number
                                                        $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
                                                    } else { // cents
                                                        $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
                                                    } // integer or decimal
                                                } // value
                                                return '$' . $money;
                                            } // numeric
                                        } // formatMoney
                                        ?>
                                        <th class="text-center">SUBTOTAL</th>
                                        <td><input type="text" name="sub_min" value="<?php echo formatMoney($row['sub_minimo']); ?>" readonly="readonly"></td>
                                        <td><input type="text" name="sub_max" value="<?php echo formatMoney($row['sub_maximo']); ?>" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">I.V.A</th>
                                        <td><input type="text" name="iva_min" value="<?php echo $row['iva_minimo']; ?>" readonly="readonly"></td>
                                        <td><input type="text" name="iva_max" value="<?php echo $row['iva_maximo']; ?>" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">TOTAL</th>
                                        <td><input type="text" name="total_min" value="<?php echo formatMoney($row['total_minimo']); ?>" readonly="readonly"></td>
                                        <td><input type="text" name="total_max" value="<?php echo formatMoney($row['total_maximo']); ?>" readonly="readonly"></td>
                                    </tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>





                <div class="form-footer">
                    <?php
                    $valor = base64_encode($row['id_proveedor']);
                    ?>
                    <a href="redirectInsumos?Xy=<?php echo base64_encode($row['numero_pedido']); ?>" class="btn btn-info">Siguiente</a>
                    <a href="principal" class="btn btn-danger">Regresar</a>

                </div><br>



            </form>
        </div>

    </div>



    <script src="frontend/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/assets/jquery-1.11.2.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>



</body>

</html>