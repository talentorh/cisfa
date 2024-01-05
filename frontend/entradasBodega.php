<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Entradas Bodega CISFA</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>

    <header class="header11">
            
    <strong id="cabecera"  style="margin-right: 36%; color: white;">Hospital Regional de Alta Especialidad de Ixtapaluca</strong>
        <strong id="cabecera2">HRAEI Ixtapaluca</strong>
 
    </header>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
<link rel="stylesheet" href="iconos/css/all.css?n=1">
<link rel="stylesheet" href="../css/style.css?n=1">
    <div class="line"><label class="lnr lnr-heart-pulse"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamento"
                    style="margin-left: 47px; background: none; margin-top: 50px; color: white; font-size: 21px; font-style: italic;"
                    value="Buscar Medicamento"></label></div>
                    <button onclick="location.reload();" class="btn btn-info">Listar medicamento</button>
        <div id="tabla_resultado" style="margin-top: 10px; width: 100%; float:left; margin-left: 20px;" >
      
                <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
             
                </div>

<?php
require "conexion.php";
error_reporting(0);

$query="SELECT *
FROM seguimiento where movimiento = 'entrada' and ubicacion = 'BODEGA'";
$result=mysqli_query($conexion2, $query);
?>

<table class="table table-bordered table-striped" style="float: left; margin-left: 0%; margin-top: 10px;">
                  
<thead style="background: grey; color: white;"> 
 
<tr>
<!-- definimos cabeceras de la tabla --> 

<th>CLAVE HRAEI</th>
<th>CANTIDAD</th>
<th>MOVIMIENTO</th>
<th>UBICACION</th>
<th>FECHA</th>

</tr>
 
</thead>
 
 
<tbody>

<?php
while($row= $result->fetch_assoc())
	{
	
		
	echo
        '  <tbody>
     
        <tr>
	
            <td >'.$row['clavehraei'].'</td>
            <td>'.$row['cantidad'].'</td>
            <td>'.$row['movimiento'].'</td>
            <td>'.$row['ubicacion'].'</td>
            <td>'.$row['fecha'].'</td>

			</tr>
            </tbody>
         
        ';
			
	}


?>
</tbody>
</table>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="frontend/js/script.js"></script>
<div id="myModal_listarMedicamento" class="modal fade" role="dialog">


    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 1200px; height: auto; color: white; float: right; margin-right: -450px;">
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

                        <div class="container" style="margin-top: -25px;">
                       
                                <strong style="color: black; margin-top: 10px; float: left; margin-left: 13px;">FILTRAR POR CLAVE DE MEDICAMENTO</strong>
                                <div class="input-group" style="float:left; margin-top: 5px; width: 97.5%; margin-left: 16px;">
                                    <div class="input-group">
                                    </div>
                                    <input name="oficio_informe" type="text" id="buscardor" class="form-control" required="required" value="HRAEI-MD"
                                        onkeyup="mayus(this);" >
                                        
                                </div>
                                <input type="submit" name="guarda" class="btn btn-warning" value="Buscar Medicamento" 
                    onclick="btn_buscar_medicamento();" style="width: 97.5%; margin-left: 16px; margin-top: 2px;">
                            
                         

                                <!-- form start -->
                               
 <div class="modal-body" >

            
            
            

<br>



<script>
function btn_buscar_medicamento()
{ 
  
 var ID_usuario =  $("#buscardor").val();

    var ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaEntradasBodega.php",
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
    </div>
</div>