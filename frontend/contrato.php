<!DOCTYPE html>
<html>
<head>
	<title> Contratos </title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">
  <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
  <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
	<script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="control_usuario.js"></script>

</head>
<body>
	
    <div class="col-lg-6 col-md-8 xs-12">
    	<h3 align="center"><strong>Listado de Proveedores</strong></h3>
    	
        
        <center><button class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal_selector" style="margin-top:0%"> Cargar contrato</button></center>
    	<div id="panel_listado">
    		<!-- Panel de datos -->

    	</div>
    </div>
	</div>

</body>
</html>

<!-- Modal -->
<div id="myModal_selector" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color:white; ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" > Cargar contrato </h4>
      </div>
      <div class="modal-body">
        <p> Seleccion </p>
        <select class="form-control" id="select_usuario" onchange="select_usuario();">
        <option value=""> Seleccione </option>
            <?php

            require 'conexion.php';

            $sql_s = $conexion2->query("SELECT * FROM datosproveedor");
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
