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
        <div class="cabecera-contrato">
            <div class="imagen1"></div>
        <!--
            <div class="hospital-text">
                <h5>2020 "AÑO DE LEONA VICARIO, BENEMÉRITA MADRE DE LA PATRIA"</h5><br>
                <h6>CONCENTRADO PROVEEDORES</h5>
                
            </div>
        -->
            <div class="descripcion">
            <h5>Hospital Regional de Alta Especialidad de Ixtapaluca </h5><br>
            <h6>Dirección de Administración y Finanzas</h6><br>
            <h6>Subdirección de Recursos Materiales</h6></div>
        </div>

        <div class="container" style="margin-top: -25px;">

            <div class="signup-form-container">

                <!-- form start -->

                <form action="registrarMedicamento.php" id="register-form" method="POST" autocomplete="off">

                    <div class="form-header">
                        <h3 class="form-title"><i class="fa fa-user"></i>Ingresa la informacion requerida</h3>

                        <div class="pull-right">
                            <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                        </div>

                    </div>

                    <div class="form-body">

                    <div class="form-group">
                    <strong>AÑO</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="year" type="text" class="form-control" value="2021"
                                    required="required"
                                    onkeyup="mayus(this);">
                            </div>

                        </div>
                        <div class="form-group">
                        <strong>NÚMERO DE CONTRATO/PEDIDO</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="numeroContrato" type="text" class="form-control" value=""
                                    required="required"
                                    onkeyup="mayus(this);">
                            </div>

                        </div>
                        <div class="form-group">
                        
                            <strong>OFICIO DE INFORME DE NOTIFICACIÓN</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="oficio_informe" type="text" class="form-control" value="-"
                                    
                                    onkeyup="mayus(this);">
                            </div>

                        </div>
                        <div class="form-group">
                            <strong>FECHA DE OFICIO</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="fecha_oficio" type="date" class="form-control" value=""
                                     onkeyup="mayus(this);">
                            </div>

                        </div>
                        <input type="hidden" id="grupoMedicamento" name="grupo" requerided="requireded" style="width: 200px; border: 1px solid black; height: 35px; color: black; border-radius: 10px;" ></center>
                        <div class="form-group">
                        <strong>SELECCIONA EL GRUPO</strong>
                            <select name="" id="selectGrupo" class="form-control">
                            <option value=""> Seleccione </option>

                                <?php
                                    require 'conexion.php';
                                    $sql_s = $conexion2 ->query ("SELECT * FROM grupomedicamento");
                                    while ($row_s = mysqli_fetch_array($sql_s)) {
                                    $ID_usuario = $row_s['nombreGrupo'];
                                    $nombre = $row_s['nombreGrupo'];
                                    ?>
                                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                                <?php
                                        }


                                ?>

                            </select>
                        </div>
                            </div>
                            <script>
                $(function(){
  	$('#selectGrupo').on("change", function(){ //detectamos el evento change
    	var value = $(this).val();//sacamos el valor del select
     var valor= $('#grupoMedicamento').val(value);
     var valor= $('#grupoMedicamento').val();
     
                                                      
         
      });                             
        });   
        
             </script> 
                        <div class="form-group">
                            <strong>FUENTE</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="fuente" type="text" class="form-control" value="-"
                                    >
                            </div>

                        </div>
                        <div class="form-group">
                            <strong>DESIGNACIÓN</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="designacion" type="text" class="form-control" value="100%"
                                    >
                            </div>
                        </div>


                        <div class="form-group">
                        <strong>SELECCIONA EL NOMBRE DEL PROVEEDOR</strong>
                            <select class="form-control" id="select_usuario" name="proveedor">
                               
                               
                                
                                <?php
                    
                                require 'conexion.php';
                                
                                $sql_s =$conexion2->query("SELECT * FROM datosproveedor");
                                while ($row_s = mysqli_fetch_array($sql_s)) {
                                    $ID_usuario = $row_s['id_datoProveedor'];
                                    $nombre = $row_s['datoPersonalProveedor'];
                                    ?>

                                <option value="<?php echo $nombre; ?>"> <?php echo $nombre; ?></option>
                                

                                <?php
                                }
                    
                                ?>
                                <option value="1">Otro</option>
                                
                            </select>
                            <div id="input"></div>
                        </div>

                        <div class="form-group">
                            <strong>CLAVE HRAEI</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="clave_hraei" type="text" class="form-control"
                                     onkeyup="mayus(this);" value="HRAEI-MD">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>DESCRIPCIÓN</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="descripcion" type="text" class="form-control" 
                                     onkeyup="mayus(this);">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>CLAVE DE CUADRO BASICO</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="clave_cuadro_basico" type="text" class="form-control"
                                 onkeyup="mayus(this);">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>CUCOP</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input name="cucop" type="text" class="form-control"
                                   onkeyup="mayus(this);">
                            </div>
                        </div>
                        <div class="form-group">
                        <strong>UNIDAD DE MEDIDA</strong>
                            <select name="unidad_medida" id="" class="form-control">
                                <option value="">Seleccione la unidad de Medida</option>
                                <option value="Pieza">Pieza</option>
                                <option value="Envase">Envase</option>
                                <option value="Bolsa">Bolsa</option>
                                <option value="Caja">Caja</option>
                                <option value="Caja">Tubo</option>
                                <option value="Caja">Ampula</option>
                                <option value="Caja">Frasco</option>
                            </select>
                        </div>
                            </div>
                    
                    <div class="form-group">
                        <strong>PRECIO UNITARIO ADJUDICADO SIN I.V.A</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="precio_unitario_sin_iva" type="number" class="form-control"
                                 id="txt_campo_1"
                                onchange="multiplicar(this.value);" min="0.0" max="90000.00" step="0.01">
                        </div>

                    </div>
                    <div class="form-group">
                        <strong>CONSUMO MINIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_minimo" type="text" class="form-control"
                                 id="txt_campo_2" onchange="multiplicar(this.value);">
                        </div>

                    </div>

                    <div class="form-group">
                        <strong>CONSUMO MAXIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_maximo" type="text" id="txt_campo_3" class="form-control"
                                 onchange="multiplicar(this.value);">
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>COSTO MÍNIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_minimo_costo" type="text" class="form-control" readonly="readonly"
                                 id="spTotal">

                        </div>

                    </div>
                    <div class="form-group">
                        <strong>COSTO MAXIMO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="hraei_maximo_costo" type="text" class="form-control" readonly="readonly"
                                 id="spTotal2">
                        </div>

                    </div>

            




            <div class="form-footer">

                <input type="submit" class="btn btn-info" name="guarda" value="Registrar">
                <input type="submit" value="Cerrar" name="submit" class="btn btn-danger" onclick="window.close()" />

            </div><br>
            </div>


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