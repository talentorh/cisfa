<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <title>Datos de medicamento</title>

    <script>
        function multiplicar(valor) {
            //var total = 0;	
            //valor = parseInt(valor); // Convertir el valor a un entero (número).

            total1 = document.getElementById('txt_campo_1').value;
            total2 = document.getElementById('txt_campo_2').value;
            total5 = document.getElementById('txt_campo_3').value;

            total3 = parseFloat(total1);

            // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
            //total = (total == ""  || total == undefined || total == "") ? 0 : total;

            /* Esta es la suma. */
            total = parseFloat(Math.round(total3 * total2 * 100) / 100).toFixed(2);
            total4 = parseFloat(Math.round(total3 * total5 * 100) / 100).toFixed(2);

            // Colocar el resultado de la suma en el control "span".
            document.getElementById('spTotal').value = total;
            document.getElementById('spTotal2').value = total4;
        }
        window.addEventListener('load', function () {
    var select = document.querySelector("#select_usuario");
    var i = "";
    var input = document.querySelector("#input");

    select.addEventListener('change', function (e) {
        e.preventDefault();
        input.innerHTML = '';
        for (i = 0; i < select.value; i++) {
            createInputs();
        }
    });

    function createInputs() {
        var element = document.createElement('div');
        element.innerHTML = `
    <div class="form-group">
        <p>Inresa el nombre del laboratorio ${i + 1}</p>
        <input type="text" class="form-control" name="otroLaboratorio" placeholder="Ingresa el nombre del laboratorio"/>
    </div>
    `;
        input.appendChild(element);
    }
});
    </script>

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
            Subdirección de Recursos Materiales.</p></div>
        </div>

      

     

                <!-- form start -->

                <form action="registrarMedicamento.php" id="register-form" method="POST" autocomplete="off">

                    <div class="form-header">

                        <div class="pull-right">
                            <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                        </div>

                    </div>

                    <div class="form-body">
                        <div class="form-group">
                          
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="" type="hidden" class="form-control"
                                    placeholder="OFICIO DE INFORME DE NOTIFICACIÓN" required="required" readonly="readonly"
                                    onkeyup="mayus(this);" value="">
                            </div>
                        
                      
                        <div class="form-group">
                            <strong>GRUPO</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="grupo" type="text" class="form-control" placeholder="GRUPO" readonly="readonly"
                                    required="required" value="<?php echo $row['GRUPO'];?>" onkeyup="mayus(this);">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <strong>DESIGNACIÓN</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="designacion" type="text" class="form-control" placeholder="DESIGNACION" readonly="readonly"
                                    required="required" value="<?php echo $row['DEASIGNACION'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <strong>PROVEEDOR</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="proveedor" type="text" class="form-control" placeholder="Proveedor" readonly="readonly"
                                     value="<?php echo $row['PROVEEDOR'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <strong>OTRO PROVEEDOR</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="OtroProveedor" type="text" class="form-control" placeholder="Otro Proveedor" readonly="readonly"
                                     value="<?php echo $row['otroProveedor'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <strong>CLAVE HRAEI</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="clave_hraei" type="text" class="form-control" placeholder="CLAVE HRAEI" readonly="readonly"
                                    required="required" onkeyup="mayus(this);" value="<?php echo $row['CLAVEHRAEI'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>DESCRIPCIÓN</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="descripcion" type="text" class="form-control" placeholder="DESCRIPCION" readonly="readonly"
                                    required="required" onkeyup="mayus(this);" value="<?php echo $row['DESCRIPCION'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                        <strong>CLAVE CUADRO BASICO</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="clave_cuadro_basico" type="text" class="form-control" readonly="readonly"
                                    placeholder="CLAVE DE CUADRO BASICO" required="required" value="<?php echo $row['CLAVEDECUADROBASICO'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>CUCOP</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="cucop" type="text" class="form-control" placeholder="CUCOP" readonly="readonly"
                                    required="required" value="<?php echo $row['CUCOP'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>UNIDAD DE MEDIDA</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="cucop" type="text" class="form-control" placeholder="UNIDAD DE MEDIDA" readonly="readonly"
                                    required="required" onkeyup="mayus(this);" value="<?php echo $row['UNIDADDEMEDIDA'];?>">
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <strong>PRECIO UNITARIO SIN I.V.A</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="precio_unitario_sin_iva" type="text" class="form-control"
                                placeholder="PRECIO UNITARIO ADJUDICADO SIN I.V.A." required="required" readonly="readonly"
                                value="$<?php echo $row['PRECIOUNITARIO']; ?>">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>CONSUMO MINIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_minimo" type="text" class="form-control"
                                placeholder="HOSPITAL REGIONAL DE ALTA ESPECIALIDAD IXTAPALUCA(CONSUMO MÍNIMO)" readonly="readonly"
                                required="required" id="txt_campo_2" value="<?php echo $row['MINIMOCONSUMO']; ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <strong>CONSUMO MAXIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_maximo" type="text" id="txt_campo_3" class="form-control"
                                placeholder="HOSPITAL REGIONAL DE ALTA ESPECIALIDAD IXTAPALUCA(CONSUMO MAXIMO)" readonly="readonly"
                                required="required" value="<?php echo $row['MAXIMOCONSUMO']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>CONSTO MINIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_minimo_costo" type="text" class="form-control" readonly="readonly"
                                placeholder="HOSPITAL REGIONAL DE ALTA ESPECIALIDAD IXTAPALUCA(COSTO MÍNIMO)"
                                required="required" id="spTotal" value="$<?php echo $row['MINIMOPRECIO']; ?>">

                        </div>

                    </div>
                    <div class="form-group">
                        <strong>COSTO MAXIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_maximo_costo" type="text" class="form-control" readonly="readonly"
                                placeholder="HOSPITAL REGIONAL DE ALTA ESPECIALIDAD IXTAPALUCA(COSTO MAXIMO)"
                                required="required" id="spTotal2" value="$<?php echo $row['MAXIMOPRECIO']; ?>">
                        </div>

                    </div>

            </div>




            <div class="form-footer">

                <a href="principal.php" class="btn btn-danger">Regresar</a>
            
        </div><br>
    </form>
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