<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Inventario CISFA</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="menu/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="inventario.js"></script>
</head>
<body>
    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <div class="d-flex" id="wrapper" style="margin-top: 3px; ">
            <!-- Sidebar-->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading" >Menu General</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action bg-light" href="principal">Inicio</a>
                    <a class="list-group-item list-group-item-action bg-light" href="inventario">Inventario</a>
                    <a class="list-group-item list-group-item-action bg-light" href="suministros">Lab. con orden de suministro</a>
                    <a class="list-group-item list-group-item-action bg-light" style="cursor: pointer" data-toggle="modal" data-target="#myModal_listarMedicamento">Entrada medicamento</a>
                    <a class="list-group-item list-group-item-action bg-light" style="cursor: pointer" data-toggle="modal" data-target="#myModal_salidaMedicamento">Salida medicamento</a>
                    <a class="list-group-item list-group-item-action bg-light" href="export_excel">Exportar a excel</a>
                    <a class="list-group-item list-group-item-action bg-light" href="close_sesion">Cerrar sesion</a>
                </div>
            </div>
            <!-- Page Content-->
            <div id="page-content-wrapper" style="background: white;">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <input type="submit" class="btn btn-primary" value="Menu" id="menu-toggle" style="width: 150px;">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                
                                
                            </li>
                            
                        </ul>
                        
                       
</nav>

    <section>
        <div id="tabla_resultadoMedicamento"></div>
                <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
        </section>     
               
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="script/scripts.js"></script>
        <script src="frontend/js/script.js"></script>
        
    </body>
</html>
<div id="myModal_listarMedicamento" class="modal fade" role="dialog">


    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 1800px; height: auto; color: white; float: right; margin-right: -700px; margin-top: 40px;">
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

                            <div class="descripcion">
                                <h5>Hospital Regional de Alta Especialidad de Ixtapaluca </h5><br>
                                <h6>Dirección de Administración y Finanzas</h6><br>
                                <h6>Subdirección de Recursos Materiales</h6>
                            </div>
                        </div>

                        <div class="container" style="margin-top: -25px; height: 110px; width: 100%; text-align: center; top: 10px;">
                       
                                <strong style="color: black; margin-top: 10px; ">FILTRAR POR CLAVE DE MEDICAMENTO</strong>
                                <div class="input-group" style="float:left; margin-top: 20px; width: 100%; margin-left: 0px;">
                                    <div class="input-group" >
                                    </div>
                                    <input name="oficio_informe" type="text" id="buscardor" class="form-control" required="required" value="HRAEI-MD"
                                        onkeyup="mayus(this);"  style=" margin-top: 18px;">
                                       <input type="submit" name="guarda" class="btn btn-warning" value="Buscar Medicamento" 
                    onclick="btn_buscar_medicamento();" style="width: 100%; margin-left: 0px; margin-top: 20px;"> 
                                </div>
                             
                                <!-- form start -->
                               
 <div class="modal-body" >
<div id="tabla_resultado" style="margin-top: 30px; font-size: 15px; width: 137%; float:left; text-align: left; margin-left: -300px; color:black;" >
      
                <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
             
                </div>
            
            
            

<br>



<script>
function btn_buscar_medicamento()
{ 
  
 let ID_usuario =  $("#buscardor").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaInventario.php",
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
     <script>
    jQuery(document).ready(function(){
 
	jQuery('#myModal_listarMedicamento').on('hidden.bs.modal', function (e) {
	    jQuery(this).removeData('bs.modal');
	    jQuery(this).find('.modal-content').empty();
	})
 
    })
</script>
                                </div>
                            </div>                           
                        </div>           
                    </div>
                </div>
            </div>           
        </div> 
    </div>
</div>
<div id="myModal_salidaMedicamento" class="modal fade" role="dialog">


    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 1800px; height: auto; color: white; float: right; margin-right: -700px; margin-top: 40px;">
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

                            <div class="descripcion">
                                <h5>Hospital Regional de Alta Especialidad de Ixtapaluca </h5><br>
                                <h6>Dirección de Administración y Finanzas</h6><br>
                                <h6>Subdirección de Recursos Materiales</h6>
                            </div>
                        </div>

                        <div class="container" style="margin-top: -25px; height: 110px; width: 100%; text-align: center; top: 10px;">
                       
                                <strong style="color: black; margin-top: 10px; ">FILTRAR POR CLAVE DE MEDICAMENTO</strong>
                                <div class="input-group" style="float:left; margin-top: 20px; width: 100%; margin-left: 0px;">
                                    <div class="input-group" >
                                    </div>
                                    <input name="oficio_informe" type="text" id="buscardorSalida" class="form-control" required="required" value="HRAEI-MD"
                                        onkeyup="mayus(this);"  style=" margin-top: 18px;">
                                       <input type="submit" name="guarda" class="btn btn-warning" value="Buscar Medicamento" 
                    onclick="btn_buscar_salida();" style="width: 100%; margin-left: 0px; margin-top: 20px;"> 
                                </div>
                             
                                <!-- form start -->
                               
 <div class="modal-body" >
<div id="tabla_resultado_salida" style="margin-top: 30px; font-size: 15px; width: 137%; float:left; text-align: left; margin-left: -300px; color:black;" >
      
                <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
             
                </div>
            
            
            

<br>



<script>
function btn_buscar_salida()
{ 
  
 let ID_usuario =  $("#buscardorSalida").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaInventarioSalidas.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado_salida").html(data);
            
                }
             });
}


     </script>    
     <script>
    jQuery(document).ready(function(){
 
	jQuery('#myModal_listarMedicamento').on('hidden.bs.modal', function (e) {
	    jQuery(this).removeData('bs.modal');
	    jQuery(this).find('.modal-content').empty();
	})
 
    })
</script>
                                </div>
                            </div>                           
                        </div>           
                    </div>
                </div>
            </div>           
        </div> 
    </div>
</div>