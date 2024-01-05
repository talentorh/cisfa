<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?=1">
    <link href="css/main.css?n=1" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>HRAEI</title>

    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="control_usuario.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">

    <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <script src="iconos/js/all.min.js"></script>
    <script src="graficoConsumosMedicamentos.js"></script>
    <script src="listarMedicamento.js"></script>
    <script src="selectContratoExterno.js"></script>
    <script src="selectProveedor.js"></script>
    <script src="consolidadas.js"></script>
    <script src="consolidadasExterno.js"></script>
    <script src="medicamentosExterno.js"></script>
    <script src="medicamentoEnOrden.js"></script>
    <script src="salidasCisfa.js"></script>
    <script src="cancelarOrdenOs.js"></script>


    <script>
        function opener() {
            nwin = window.open("", "newWin", "toolbar=no,location= no,resizable=no",
                width = 200, height = 200, left = 100, top = 100)
        }
    </script>
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
            let select = document.querySelector("#select_usuario");
            let i = "";
            let input = document.querySelector("#input");

            select.addEventListener('change', function (e) {
                e.preventDefault();
                input.innerHTML = '';
                for (i = 0; i < select.value; i++) {
                    createInputs();
                }
            });

            function createInputs() {
                let element = document.createElement('div');
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

    <?php 
            
			if (isset($_SESSION['externo'])){
				$usernameSesion = $_SESSION['externo'];
				require 'conexion.php';
				$query ="SELECT nombre_trabajador from login where correo_electronico = '$usernameSesion' limit 1";
                $res = mysqli_query($conexion2, $query);
                $rw = mysqli_fetch_assoc($res);
			
			}
			  	 
    ?>
<header>

        <label class="lnr lnr-menu"
            style="font-size: 32px; font-style: italic; float: left; margin-left: 18px; color: white;">Menu</label>

        <strong id="cabecera" style="color: white; float: left; margin-left: 42%;">FARMACIA CISFA</strong>

        <script>
        
		//	window.onload = function(){killerSession();}
		//	function killerSession(){
		//	setTimeout("window.open('confirmCloseSession.php','_top');", 2.4e+6);
		//	}
</script>
<script type="text/javascript">

$(document).ready(function() {    
    $('.button').on('click', function(){
        //Añadimos la imagen de carga en el contenedor
        $('#tabla_resultado').html('<div id="tabla_resultado" style="position: fixed; margin-top: 20%; margin-left: 40%;  width: 100%; height: 100%; z-index: 9999;  opacity: .8; "><img src="imagenes/loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');
 
        
        return false;
    });              
});    
</script>
    </header>
    <div class="menu">
        <input type="text"
            style="width:100%; text-align: center; height:30px; margin-top:5px; font-size:15px; font-style: normal; color: white; background-color: #235279; border-radius:5px"
            disabled value="Hola&nbsp;<?php echo $rw['nombre_trabajador']; ?>">
    <div class="line"><label class="lnr lnr-enter"><input type="submit" data-toggle="modal"
                    data-target="#myModal_contratos"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                value="Contratos CISFA"></label></div>
             
    <div class="line"><label class="lnr lnr-heart-pulse"><input type="submit" data-toggle="modal"
                    data-target="#myModal_medicamentoEnOrden"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Medicamento en OS" ></label></div>
        <div class="line"><label class="lnr lnr-magnifier"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamento"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Buscar Medicamento"></label></div>
                    
        <div class="line"><label class="lnr lnr-magnifier"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamentoConsExterno"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Buscar Medicamento Cons."></label></div>
        <div class="line"><label class="lnr lnr-database"><input type="submit" data-toggle="modal"
                    data-target="#myModal_salidasCisfa"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Salidas CISFA"></label></div>
                
        <div class="line"><label class="lnr lnr-chart-bars"><input type="submit" value="Grafico consumos"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; border: 0; outline: none; "
                    onclick="graficosConsumosMedicamentos(); return false;" class="button">
                    
                    </label></div>
                    
        <!--          
        <div class="line"><label class="lnr lnr-database"><input type="submit" onclick="window.open('inventario','','');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Control inventario"></label></div>
                    
        <div class="line"><label class="lnr lnr-database"><input type="submit" onclick="window.open('entradasBodega','','');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Entradas bodega"></label></div>
                    
        <div class="line"><label class="lnr lnr-database"><input type="submit" onclick="window.open('salidasBodega','','');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Salidas bodega"></label></div>-->

        <!--<div class="line"><label class="lnr lnr-heart-pulse"><input type="submit" data-toggle="modal"
                    data-target="#myModal_minimosLab"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; "
                    value="Minimos N/A por Laboratorio"></label></div>-->
       <!-- <div class="line"><label class="lnr lnr-heart-pulse"><input type="submit" data-toggle="modal"
                    data-target="#myModal_maximosLab"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; "
                    value="Maximos Alcan. por Laboratorio"></label></div>-->
        <!--<div class="line"><label class="lnr lnr-book"><input type="submit" data-toggle="modal"
                    data-target="#myModal_folios"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; "
                    value="Generar folios Ordenes"></label></div>-->

        <div class="line"><label class=""><a href="close_sesion"
                    style="color: red; font-size:17px; font-style:normal; margin-left: 60px; text-decoration: none;">
                    Cerrar Sesion
                    </a></label></div>
    
<br><br><br><br>
    </div>

    <main>
    
        <div class="imagenCisfa" style="margin-top: -30px; border-radius: 25px; height: 98px;"></div>
   
        <div id="tabla_resultado">
             
            
        
<style>
    #tabla_resultado {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('imagenes/loader2.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
        </div>
   
</main>
    <script src="frontend/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>
<div id="myModal_contratos" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contratos CISFA </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                          
                        </div>
<style>
    label{
        color: black;
    }
</style>
                    
  
                            
                    <div class="modal-body" >
    <label>Filtrar por nombre de proveedor</label>
        <select class="list-group-item list-group-item-action bg-ligh" id="select_proveedorExterno" style="height: 40px; cursor: pointer;" onchange="select_proveedorExterno();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Nombre de proveedor</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT datoPersonalProveedor FROM datosproveedor order by datoPersonalProveedor asc");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['datoPersonalProveedor'];
  $nombre = $row_s['datoPersonalProveedor'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>
    <label>Filtrar por nùmero de contrato</label>    
        <select class="list-group-item list-group-item-action bg-ligh" id="select_numerocontratoExterno" style="height: 40px; cursor: pointer;" onchange="select_numerocontratoExterno();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Numero de contrato</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT DISTINCT numero_pedido FROM proveedores where year = '2021' order by numero_pedido asc");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['numero_pedido'];
  $nombre = $row_s['numero_pedido'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>
    <label>Filtrar por año de contratos</label>         
        <select class="list-group-item list-group-item-action bg-ligh" id="select_contratoExterno" style="height: 40px; cursor: pointer;" onchange="select_contratoExterno();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Año de contratos</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT DISTINCT year FROM proveedores ");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['year'];
  $nombre = $row_s['year'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>    
    <label>Fitar por tipo de contratos</label>
        <select class="list-group-item list-group-item-action bg-ligh" id="select_tipoFarmExterno" style="height: 40px; cursor: pointer;" onchange="select_tipoFarmExterno();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Tipo de contrato</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT DISTINCT tipoFarmacia FROM proveedores ");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['tipoFarmacia'];
  $nombre = $row_s['tipoFarmacia'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>

  
                            </div>
                        </div>           
                    </div>
                </div>
            </div>           
        </div> 
    </div>
</div>

<div id="myModal_folios" class="modal fade" role="dialog">
        <script src="control_usuario.js"></script>
        <script src="metas.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Generar folios</h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
                         
                        </div>



<strong style="color: black;">SELECCIONA</strong>

<select class="form-control" id="folio" name="ejeUno" onchange="select_folio(this.value);" style="height: 35px;">
            <option>-Selecciona-</option>
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT referenciaCorta FROM numeroorden ");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['referenciaCorta'];
  $nombre = $row_s['referenciaCorta'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

                </select><br><br>
<script>
function select_folio()
{ //id="select_usuario"
  
 let val =  $("#folio").val();
 let encodedString = btoa(val);

    window.location.href = "Folio?val="+encodedString;
}

     </script> 
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal_cancelarOrden" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>
<script src="metas.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Cancelar orden de suministro </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                          
                        </div>

                   
                        <form action="cancelaOrden" method="POST">
                               
                        <strong style="color: black;">SELECCIONA EL NUMERO DE CANCELACION</strong>

<select class="form-control" id="mySelect" name="oficio_informe"  style="height: 35px;" onchange="select(this.value);">
           
            <option>-Selecciona un oficio de cancelacion-</option>
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT claveUnicaContrato FROM numeroorden where estatus = 1 ");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['claveUnicaContrato'];
              $nombre = $row_s['claveUnicaContrato'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </select><br>
       
        <strong id="strong" style="color:black;">ID CONTRATO:</strong><br>
     <select class="form-control" id="tabla_rest"  name="idcont"  onclick="cancela();" style=" height: 35px;">
     <option value=""> Seleccione el numero de contrato </option>
    
                <input type="hidden" name="guarda" class="btn btn-danger" value="Buscar Orden" 
                     style="width: 100%; margin-left: 0px; margin-top: 10px;"><br>
                     <strong id="strong" style="color:black;">ID CONTRATO:</strong><br>
     <select class="form-control" id="tabla_rests"  name="idcontar" style=" height: 35px;">
     <option value=""> Seleccione el numero de contrato </option>
     <input type="submit" name="guarda" class="btn btn-danger" value="Buscar Orden" 
                     style="width: 100%; margin-left: 0px; margin-top: 10px;"><br><br><br>
        </form>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="myModal_minimosLab" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>
<script src="metas.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Minimos no alcanzados por laboratorio </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
       
                    
                        </div>

<strong style="color: black;">SELECCIONA EL NOMBRE DEL PROVEEDOR</strong>

<select class="form-control" id="mySelect" name="ejeUno" onchange="select_lab(this.value);" style="height: 35px;">
            <option>-Selecciona un proveedor-</option>
            <?php
            require('conexion.php');
           
        $sql_s = $conexion2->query('SELECT DISTINCT PROVEEDOR FROM listamedicamento order by PROVEEDOR asc');
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['PROVEEDOR'];
  $nombre = $row_s['PROVEEDOR'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

</select><br>
   
     <strong id="strong" style="color:black;">SELECCIONA EL NÚMERO DEL CONTRATO:</strong><br>
     <select class="form-control" id="tabla_result"  name="metaEspecifica6" style=" height: 35px;">
     <option value=""> Seleccione el numero de contrato </option>
     <input type="submit" class="btn btn-warning" value="CONSULTAR" 
                    onclick="select_min();" style="width: 100%; margin-left: 0px; margin-top: 5px;">
     
</select><br><br>
<script>
function select_min()
{ //id="select_usuario"
  
 let ID_usuario =  $("#tabla_result").val();
 
// alert("Hola select = "+ID_usuario);

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaMinNoLaboratorio.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

     </script> 
      
                         
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

<div id="myModal_maximosLab" class="modal fade" role="dialog">
        <script src="control_usuario.js"></script>
        <script src="metas.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Maximos alcanzados por laboratorio</h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
                          
                        </div>

<strong style="color: black;">SELECCIONA EL NOMBRE DEL PROVEEDOR</strong>

<select class="form-control" id="mySelect" name="ejeUno" onchange="select_max_no_lab(this.value);" style="height: 35px;">
            <option>-Selecciona un proveedor-</option>
            <?php
            require('conexion.php');
          
        $sql_s = $conexion2->query('SELECT DISTINCT PROVEEDOR FROM listamedicamento order by PROVEEDOR asc');
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['PROVEEDOR'];
  $nombre = $row_s['PROVEEDOR'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


?>
</select><br>
   
     <strong id="strong" style="color:black;">SELECCIONA EL NÚMERO DEL CONTRATO:</strong><br>
     <select class="form-control" id="tabla_resu" onchange="select_max();" name="metaEspecifica6" style=" height: 35px;">
     <option value=""> Seleccione el numero de contrato </option>
</select><br><br>
<script>
function select_max()
{ //id="select_usuario"
  
 let ID_usuario =  $("#tabla_resu").val();
 
// alert("Hola select = "+ID_usuario);

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaMaxLaboratorio.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

     </script> 
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- inicio modal -->
<div id="myModal_listarMedicamento" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                          
                        </div>
<style>
    label{
        color: black;
    }
</style>
                    
  
                            
                    <div class="modal-body" >
                        <label>BUSCAR POR NOMBRE O CLAVE DE MEDICAMENTO</label>  
                            <input list="consult_medicaExterno" class="form-control" id="buscardorExterno" name="" type="text"  onchange="btn_buscar_medicamentoExterno();">
           
        <datalist id="consult_medicaExterno" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT DESCRIPCION, CLAVEHRAEI FROM listamedicamento where fechaContrato = '2021'");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['CLAVEHRAEI'];
              $nombre = $row_s['DESCRIPCION'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
<!--
                <label>FILTRA MEDICAMENTO POR AÑO</label>
                <select class="form-control" id="select_year"  onchange="select_year();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value=""> Seleccione </option>
                    <meta charset="UTF-8">
                    <?php
/**
$sql_s = $conexion2->query ("SELECT DISTINCT fechaContrato FROM listamedicamento ");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['fechaContrato'];
  $nombre = $row_s['fechaContrato'];
 
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
   
}

**/
            ?>

                </select>-->


<label>BUSCAR MEDICAMENTO POR CONTRATO</label>  
                            <input list="contratExterno" class="form-control" id="select_contratExterno" name="" type="text"  onchange="select_contExterno();">
           
        <datalist id="contratExterno" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2 -> query ("SELECT DISTINCT nombre_proveedor, numero_pedido FROM proveedores where year = '2021'");
                while ($row_s = mysqli_fetch_array($sql_s)) {
                    $ID_usuario = $row_s['numero_pedido'];
                    $nombre = $row_s['nombre_proveedor'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>

  
                            </div>
                        </div>           
                    </div>
                </div>
            </div>           
        </div> 
    </div>
</div>

<div id="myModal_listarMedicamentoConsExterno" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                          
                        </div>
<style>
    label{
        color: black;
    }
</style>
                    
  
                            
                    <div class="modal-body" >
                        <label>NOMBRE O CLAVE DEL MEDICAMENTO</label>  
                            <input list="consult_medicacons" class="form-control" id="buscardorconsExterno" name="" type="text"  onchange="btn_buscar_medicamentoconsExterno();">
           
        <datalist id="consult_medicacons" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT DESCRIPCIONDELBIEN, CLAVEHRAEI FROM consolidados");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['CLAVEHRAEI'];
              $nombre = $row_s['DESCRIPCIONDELBIEN'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>

<label>FILTRAR MEDICAMENTO POR CONTRATO</label>
<input list="consult_medicaconscontrato" class="form-control" id="select_contratconsExterno"  onchange="select_contconsExterno();">

<datalist id="consult_medicaconscontrato" >
    <?php

$sql_s = $conexion2 -> query ("SELECT DISTINCT NUMERODECONTRATO, PROVEEDOR FROM consolidados ");
while ($row_s = mysqli_fetch_array($sql_s)) {
$ID_usuario = $row_s['NUMERODECONTRATO'];
$nombre = $row_s['PROVEEDOR'];

?>
<option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

<?php
}


?>

</datalist>

   
                            </div>
                        </div>           
                    </div>
                </div>
            </div>           
        </div> 
    </div>
</div>

<div id="myModal_medicamentoEnOrden" class="modal fade" role="dialog">


    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white; ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                         
                        </div>

                        <label>NOMBRE O CNIS DEL MEDICAMENTO</label>  
                            <input list="consult_medicaorden" class="form-control" id="medicamento_orden" name="" type="text"  onchange="medicamento_enorden();">
           
        <datalist id="consult_medicaorden" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT cuadroBasico, descripcionDelBien FROM ordensuministro where fechaContrato = '2021'");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['cuadroBasico'];
              $nombre = $row_s['descripcionDelBien'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>

                            </datalist>    
                         

                                <!-- form start -->
                               
                            </div>                           
                        </div>           
                    </div>
                </div>
            </div>           
        </div> 
    </div>
    
<div id="myModal_contratoProveedor" class="modal fade" role="dialog" >

<meta charset="UTF-8">
    <div class="modal-dialog">

        <!--Modal content-->
        <div class="modal-content" style="width: 100%; height: auto; color: black; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color:white; ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Cargar contrato </h4>
            </div>
            <div class="modal-body">

                <select class="form-control" id="select_usuario" style="height: 40px;" onchange="select_usuario();">
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value=""> Seleccione </option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query("SELECT * FROM datosproveedor ");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['id_datoProveedor'];
  $nombre = $row_s['datoPersonalProveedor'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

                </select>
                <div id="panel_selector"></div>
            </div>
            <div class="modal-footer">
         

            </div>
        </div>

    </div>
</div>
<div id="myModal_salidasCisfa" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Salidas CISFA </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>

                        <div class="container" style="margin-top: 0px; width: 100%;">
                        <strong id="strong" style="color:black;">DATE FROM:</strong><br>
     <input  type="date" id="dateFrom1" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">DATE TO:</strong><br>
     <input  type="date" id="dateTo1" class="form-control" required="required" value=""
                                        style="width: 100%;" >
                               
                        <strong style="color: black;">SELECCIONA LA CENTRAL</strong>

<select class="form-control" id="selectCis" name="oficio_informe"  style="height: 35px; width: 100%;" onchange="selectCisfa();">
           
            <option>-Selecciona-</option>
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT central FROM consumoscisfa");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['central'];
              $nombre = $row_s['central'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </select><br>
       
        <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE FROM:</strong><br>
     <input  type="date" id="dateFrom" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE TO:</strong><br>
     <input  type="date" id="dateTo" class="form-control" required="required" value=""
                                        style="width: 100%;" >
     <input type="submit" onclick="selectDate();" class="btn btn-warning" value="Buscar Medicamento" 
                     style="width: 100%; margin-left: 0px; margin-top: 30px;"><br><br>
                     
                     
    <strong id="strong" style="color:black;">CLAVE DATE FROM:</strong><br>
     <input  type="date" id="dateFrom3" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">CLAVE DATE TO:</strong><br>
     <input  type="date" id="dateTo3" class="form-control" required="required" value=""
                                        style="width: 100%;" >
                                        
      <strong id="strong" style="color:black;">CLAVE EN ESPECIFICO:</strong><br>  
    <input list="claves" id="clave" class="form-control" onchange="selectClave();" type="text" placeholder="Escribe la clave">
        <datalist id="claves" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT clavehraei, descripcion FROM consumoscisfa");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
        </datalist><br>
               
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="myModal_covid" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pacientes COVID </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>
rong id="strong" style="color:black;">TODAS LAS CLAVES DATE FROM:</strong><br>
     <input  type="date" id="dateFromCovid" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE TO:</strong><br>
     <input  type="date" id="dateToCovid" class="form-control" required="required" value=""
                                        style="width: 100%;" >
     <input type="submit" onclick="selectDateCovid();" class="btn btn-warning" value="Buscar Medicamento" 
                     style="width: 100%; margin-left: 0px; margin-top: 30px;"><br><br>
                     
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="myModal_promedioCisfa" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Consumo promedio CISFA </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>

                        <div class="container" style="margin-top: 0px; width: 100%;">
                            <!--
                        <strong id="strong" style="color:black;">DATE FROM:</strong><br>
     <input  type="date" id="" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">DATE TO:</strong><br>
     <input  type="date" id="" class="form-control" required="required" value=""
                                        style="width: 100%;" >
                               
                        <strong style="color: black;">SELECCIONA LA CENTRAL</strong>

<select class="form-control" id="" name="oficio_informe"  style="height: 35px; width: 100%;" onchange="">
           
            <option>-Selecciona-</option>
            <?php
            /**
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT central FROM consumoscisfa");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['central'];
              $nombre = $row_s['central'];
              **/
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
               /**
            }
            
            **/
                        ?>
            
                            </select><br>
       -->
        <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE FROM:</strong><br>
     <input  type="date" id="dateFromProm4" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE TO:</strong><br>
     <input  type="date" id="dateTo4" class="form-control" required="required" value=""
                                        style="width: 100%;" >
     <input type="submit" onclick="selectDateAll();" class="btn btn-warning" value="Buscar claves" 
                     style="width: 100%; margin-left: 0px; margin-top: 30px;"><br><br>
                     
                     
    <strong id="strong" style="color:black;">CLAVE DATE FROM:</strong><br>
     <input  type="date" id="dateFromProm3" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">CLAVE DATE TO:</strong><br>
     <input  type="date" id="dateToProm3" class="form-control" required="required" value=""
                                        style="width: 100%;" >
                                        
      <strong id="strong" style="color:black;">CLAVE EN ESPECIFICO:</strong><br>  
    <input list="claves" id="claveProm" class="form-control" onchange="selectClaveProm();" type="text" placeholder="Escribe la clave">
        <datalist id="claves" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT clavehraei FROM controlmedicamentoinventario");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['clavehraei'];
              $nombre = $row_s['clavehraei'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
        </datalist><br><br>
               
     
<script>
                    function selectClaveProm(val)
{
    let clave = $("#claveProm").val();
    let dateFrom3 = $("#dateFromProm3").val();
    let dateTo3 = $("#dateToProm3").val();
    let ob = {clave:clave, dateFrom3:dateFrom3, dateTo3:dateTo3};
    $.ajax({
        type: "POST",
        url: 'consultaClaveParticular.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}
   function selectDateAll(val)
{
    let dateFrom = $("#dateFromProm4").val();
    let dateTo = $("#dateTo4").val();
    let ob = {dateFrom:dateFrom, dateTo:dateTo}
    $.ajax({
        type: "POST",
        url: 'consultaFechaSalidasPromedio.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}              

</script>        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>


<div id="myModal_consultarFactura" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 900px; height: 550px; color: white;  margin-top: 35px; 
  left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Facturas CISFA </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>
                                        
                  
                               
                        <strong style="color: black;">SELECCIONA EL NUMERO DE FACTURA</strong>

<input list="consult_Fact" class="form-control" id="consultaFactu" name="" type="text" style="height: 35px; width: 100%;" onchange="selectFactura();">
           
        <datalist id="consult_Fact" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT num_factura, nombre_laboratorio FROM facturas");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['num_factura'];
              $nombre = $row_s['nombre_laboratorio'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            
                            <strong style="color: black;">BUSCAR POR NOMBRE O CLAVE HRAEI</strong>

<input list="consult_claveH" class="form-control" id="consultaClaveH" name="" type="text" style="height: 35px; width: 100%;" onchange="selectClaveH();">
           
        <datalist id="consult_claveH" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT clavehraei, descripcion FROM facturas");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            
                            <strong style="color: black;">SELECCIONA EL NOMBRE DEL PROVEEDOR</strong>

<input list="consult_laboratorio" class="form-control" id="consultaLaboratorio" name="" type="text" style="height: 35px; width: 100%;" onchange="selectLaboratorio();">
           
        <datalist id="consult_laboratorio" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT nombre_laboratorio FROM facturas");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['nombre_laboratorio'];
              $nombre = $row_s['nombre_laboratorio'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                <input type="submit" onclick="todasFacturas();" class="btn btn-warning" value="Ver todas las facturas" 
                     style="width: 100%; margin-left: 0px; margin-top: 20px;"><br><br>  
<script>
function selectFactura(val)
{
    let factura2 = $("#consultaFactu").val();
    let ob = {factura2:factura2};

    $.ajax({
        type: "POST",
        url: 'consultaFactura.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}

function selectClaveH(val)
{
    let clavehraei = $("#consultaClaveH").val();
    let ob = {clavehraei:clavehraei};

    $.ajax({
        type: "POST",
        url: 'consultaFacturaClave.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}
function selectLaboratorio(val)
{
    let laboratorio = $("#consultaLaboratorio").val();
    let ob = {laboratorio:laboratorio};

    $.ajax({
        type: "POST",
        url: 'consultaLaboratorio.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}
function todasFacturas(val)
{
    let fecha = '2021';
    let ob = {fecha:fecha};
    
    $.ajax({
        type: "POST",
        url: 'consultaTodasFacturas.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}


</script>        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="myModal_cargarFactura" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 900px; height: 550px; color: white;  margin-top: 25px; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Facturas CISFA </h4>
            </div>
            <div class="modal-body">
            
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>

                        <div class="container" style="margin-top: 0px; width: 100%;">
                        <strong id="strong" style="color:black; float: right;">Numero factura:</strong><br>
     <input  type="text" id="numFactura" class="form-control" required="required"  value=""
                                        style="width: 30%; float: right" >
    
                     <strong id="strong" style="color:black; float: left; margin-top: -20px;">Fecha:</strong><br>
     <input  type="date" id="fechaFactura" class="form-control" required="required" value=""
                                        style="width: 30%; float: left;  margin-top: -20px;" ><br>
                                        
                    <strong id="strong" style="color:black; float: left;">Nombre proveedor:</strong><br>
     <input list="proveedor" id="proveedorDato" class="form-control" onchange="" type="text" placeholder="Escribe el nombre del proveedor">
        <datalist id="proveedor" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT * FROM datosproveedor");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['datoPersonalProveedor'];
              $nombre = $row_s['datoPersonalProveedor'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
        </datalist>
                <strong id="strong" style="color:black; float: left; ">Número de contrato</strong><br>
     <input  type="text" id="numeroContrato" class="form-control" required="required" value="">
                                    
                <strong style="color: black;">SELECCIONA LA CLAVE</strong>

<input list="selectClave" class="form-control" id="selectCla" name="" type="text" style="height: 35px; width: 100%;" onchange="selectProv();">
           
        <datalist id="selectClave" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT CLAVEHRAEI, DESCRIPCION FROM listamedicamento where fechaContrato = 2021");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['CLAVEHRAEI'];
              $nombre = $row_s['DESCRIPCION'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist><br>
                            
<script>
                    function selectProv(val)
{
    let proveedor = $("#proveedorDato").val();
    let factura = $("#numFactura").val();
    let fechaFactura = $("#fechaFactura").val();
    let clave = $("#selectCla").val();
    let contrato = $("#numeroContrato").val();
    let ob = {proveedor:proveedor, factura:factura, fechaFactura:fechaFactura, clave:clave, contrato:contrato};

    $.ajax({
        type: "POST",
        url: 'consultaCargaFactura.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}




</script>        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="myModal_VerDonaciones" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Facturas CISFA </h4>
            </div>
            <div class="modal-body">
              
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>
                                        
                  
                               
                        <strong style="color: black;">SELECCIONA EL NUMERO DE DONACION</strong>

<input list="consult_Donacion" class="form-control" id="consultaDonacion" name="" type="text" style="height: 35px; width: 100%;" onchange="selectDonacion();">
           
        <datalist id="consult_Donacion" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT numerodonacion FROM donaciones");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['numerodonacion'];
              $nombre = $row_s['numerodonacion'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                <input type="submit" onclick="todasDonaciones();" class="btn btn-warning" value="Ver todas las donaciones" 
                     style="width: 100%; margin-left: 0px; margin-top: 20px;"><br><br>  
<script>
function selectDonacion(val)
{
    let donacion = $("#consultaDonacion").val();
    let ob = {donacion:donacion};

    $.ajax({
        type: "POST",
        url: 'consultaDonacion.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}

function todasDonaciones(val)
{
    let fecha = '2021';
    let ob = {fecha:fecha};
    
    $.ajax({
        type: "POST",
        url: 'consultaTodasDonaciones.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}


</script>        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="myModal_Donaciones" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Donaciones CISFA </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>

                        <strong id="strong" style="color:black; float: right;">Numero Donacion:</strong><br>
     <input  type="text" id="numFacturaDonacion" class="form-control" required="required"  value=""
                                        style="width: 30%; float: right" >
    
                     <strong id="strong" style="color:black; float: left; margin-top: -20px;">Fecha:</strong><br>
     <input  type="date" id="fechaFacturaDonacion" class="form-control" required="required" value=""
                                        style="width: 30%; float: left;  margin-top: -20px;" ><br>
                                        
                   
                               
                        <strong style="color: black;">SELECCIONA LA CLAVE DE MEDICAMENTO</strong>

<input list="selectClave" class="form-control" id="selectClaveDonacion" name="" type="text" style="height: 35px; width: 100%;" onchange="selectProvDonacion();">
           
        <datalist id="selectClave" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT clavehraei FROM listamedicamento where fechaContrato = 2021");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['clavehraei'];
              $nombre = $row_s['clavehraei'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            
<script>
                    function selectProvDonacion(val)
{
    
    let factura = $("#numFacturaDonacion").val();
    let fechaFactura = $("#fechaFacturaDonacion").val();
    let clave = $("#selectClaveDonacion").val();
    let ob = {factura:factura, fechaFactura:fechaFactura, clave:clave};

    $.ajax({
        type: "POST",
        url: 'consultaCargaDonacion.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}




</script>        
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<div id="myModal_proveedor" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 110%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ingresa los datos del proveedor </h4>
            </div>
            <div class="modal-body">
              
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
      
                        </div>


                                <!-- form start -->
                                <form action="registrarProveedor" method="POST">
                   

                                    <div class="form-body">
                                        
                                        <div class="form-group">
                                            <label>NOMBRE DEL PROVEEDOR</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="datoPersonalProveedor" id="datoPersonalProveedor"
                                                    type="text" class="form-control" required="required"
                                                    onkeyup="mayus(this);">
                                            </div>

                                            <label>DOMICILIO PERSONAL</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="domicilioPersonal" id="domicilioPersonal" type="text"
                                                    class="form-control" onkeyup="mayus(this);">
                  
                                        </div>
                                
                                            <label>R.F.C</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="rfc" id="rfc" type="text"
                                                    class="form-control" onkeyup="mayus(this);">
                               
                                        </div>
                                 
                                            <label>TELEFONO</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="telefono" id="telefono" type="text" class="form-control"
                                                    >
                       
                                        </div>
                                  
                                            <label>DIRECCIÓN DE INTERNET</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="direccionInternet" id="direccionInternet" type="text"
                                                    class="form-control" onkeyup="mayus(this);">
                         
                                        </div>
                              
                                            <label>CORREO ELECTRONICO</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="correoElectronico" id="correoElectronico" type="text"
                                                    class="form-control" >
      
                                        </div>
                                      
                                            <label>NUMERO DE PROCEDIMIENTO</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="numeroDeProcedimiento" id="numeroDeProcedimiento"
                                                    type="text" class="form-control" 
                                                    onkeyup="mayus(this);">
                          
                                        </div>
                                    </div>
                                <br>
                            </div>
               
                <div id="panel_respuesta_edicion"></div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" name="almacenarProveedor" value="Guardar"
                        onclick="btn_guardar_proveedor();">
                    
                </div>
            </div>
        </div>
    </div>
</form>
