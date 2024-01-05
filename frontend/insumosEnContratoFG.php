<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Insumos CISFA</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="control_usuario.js"></script>

</head>
<body>
<header>
             
    <strong id="cabecera"  style="margin-right: 36%; color: white;">Hospital Regional de Alta Especialidad de Ixtapaluca</strong>
        <strong id="cabecera2">HRAEI Ixtapaluca</strong>
        
    </header>
<!--<div class="cabecera-contrato">
            <div class="imagen1" style="margin-top: 70px;"></div>

            <div class="descripcion" style="margin-top:50px;">
            <h5>Hospital Regional de Alta Especialidad de Ixtapaluca </h5><br>
            <h6>Dirección de Administración y Finanzas</h6><br>
            <h6>Subdirección de Recursos Materiales</h6></div>
        </div>-->
    <?php
        $clave = base64_decode($_GET['var']);
        $clave2 = base64_decode($_GET['var2']);
        $clave3 = base64_encode($clave2);
        $numeroContrato = base64_decode($_GET['contPed']);

    ?>
    
    <div class="col-lg-6 col-md-8 xs-12">

    		<!--
       <input type="text" value="<?php echo $clave2; ?>">
       -->
      
    </div><br><br>
    
    <input type="text"  style="float: left; margin-left: 35%; margin-top: 40px;  width:auto;"value="<?php echo $clave; ?>" >
    
    <center><input type="text" id="claveUnicaContrato"  value="<?php echo $numeroContrato; ?>" style="float: left; margin-left: 5%; margin-top: 40px; width: auto; color: black;" ></center>
<!--  
   <select class="form-control" id="" name="" style=" width: 40%; height: 40px; margin-top: 70px; margin-right: auto; margin-left: auto;" onchange="select_datos();" >
                    <option value=""> Seleccione Descripción</option>

                    <?php

require 'conexion.php';
$sql_s = $conexion2->query ("SELECT id_medicamento, OFICIODEINFORMEDENOTIFICACION, FECHADEOFICIO, GRUPO, FUENTE, DEASIGNACION, PROVEEDOR, CLAVEHRAEI, CLAVEDECUADROBASICO, CUCOP, UNIDADDEMEDIDA, PRECIOUNITARIO, MINIMOCONSUMO, MAXIMOCONSUMO, MINIMOPRECIO, MAXIMOPRECIO,  otroLaboratorio, cantidad, LEFT(DESCRIPCION, 220) AS DESCRIPCION FROM listamedicamento where id_contrato = $clave2");
          while ($row_s = mysqli_fetch_array($sql_s)) {
            $ID_usuario = $row_s['id_medicamento'];
            $nombre = $row_s['DESCRIPCION'];
            ?>
             <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

             <?php
          }
       
            ?>

            </select><br>
            <select class="form-control" id="" name="" style=" width: 40%; height: 40px; margin-top: 0px; margin-right: auto; margin-left: auto;" onchange="select_datos();" >
                    <option value=""> Seleccione Clave HRAEI</option>

                    <?php

require 'conexion.php';
$sql_s = $conexion2->query ("SELECT id_medicamento, OFICIODEINFORMEDENOTIFICACION, FECHADEOFICIO, GRUPO, FUENTE, DEASIGNACION, PROVEEDOR, CLAVEHRAEI, CLAVEDECUADROBASICO, CUCOP, UNIDADDEMEDIDA, PRECIOUNITARIO, MINIMOCONSUMO, MAXIMOCONSUMO, MINIMOPRECIO, MAXIMOPRECIO,  otroLaboratorio, cantidad, LEFT(DESCRIPCION, 220) AS DESCRIPCION FROM listamedicamento where id_contrato = $clave2");
          while ($row_s = mysqli_fetch_array($sql_s)) {
            $ID_usuario = $row_s['id_medicamento'];
            $nombre = $row_s['CLAVEHRAEI'];
            ?>
             <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

             <?php
          }
       
            ?>

            </select>
            -->
                <script>
                /**
                        var ibxUserTwo=document.getElementById("claveUnicaContrato");
                        var fired_button2=ibxUserTwo.value;
                
                        $('#select_suministro').change(function() {
                                
                        var fired_button = $(this).val();
                        window.location.href = 'modelo/modelo_insertar_obeto_contratcion.php?valor='+fired_button+'&valor2='+fired_button2;
                    
});    
**/
     </script>
     <table class="table table-bordered" style="border-collapse: separate; border-spacing: 2px 1px; padding: 10px;">
	<tr style="background-color: #E5E4EF;">
		<th style="background-color: #E5E4EF;"> # </th>
        <th> Designación</th>
        <th> Proveedor</th>
        <th> Clave HRAEI</th>
        <th> Descripción</th>
        <th> Clave de cuadro basico</th>
        <th> CUCOP</th>
        <th> Unidad de medida</th>
        <th> Precio Unitario</th>
        <th> Minimo consumo</th>
        <th> Maximo consumo</th>
        <th> Minimo precio</th>
		<th> Maximo precio</th>
        <th > Eliminar</th>
	</tr>
<?php

$sql = $conexion2 ->query("SELECT * FROM listamedicamento where id_contrato = $clave2");

$i =0;
$var = 0;
$var2 = 0;

while ($row = mysqli_fetch_array($sql)) {
    $i++;
   
	$ID_usuario = $row['id_medicamento'];
    $grupo = $row['GRUPO'];
    $designacion = $row['DEASIGNACION'];
    $proveedor = $row['PROVEEDOR'];
    $clavehraei = $row['CLAVEHRAEI'];
    $descripcion = $row['DESCRIPCION'];
    $cuadrobasico = $row['CLAVEDECUADROBASICO'];
    $cucop = $row['CUCOP'];
    $unidadmedida = $row['UNIDADDEMEDIDA'];
    $precio = $row['PRECIOUNITARIO'];
    $minimoconsumo = $row['MINIMOCONSUMO'];
    $maximoconsumo = $row['MAXIMOCONSUMO'];
    $var += $minimoprecio = $row['MINIMOPRECIO'];
    $var2 += $maximoprecio = $row['MAXIMOPRECIO'];
	?>
     <tr>
     	<td style="background-color: #E5E4EF;"> <?php echo $i; ?></td>
     
         <td> <?php echo utf8_decode($designacion); ?></td>
         <td> <?php echo $proveedor; ?></td>
         <td> <?php echo $clavehraei; ?></td>
         <td> <?php echo $descripcion; ?></td>
         <td> <?php echo $cuadrobasico; ?></td>
         <td> <?php echo $cucop; ?></td>
         <td> <?php echo $unidadmedida; ?></td>
         <td> <?php echo '$',$precio; ?></td>
         <td> <?php echo $minimoconsumo; ?></td>
         <td> <?php echo $maximoconsumo; ?></td>
         <td> <?php echo '$',$minimoprecio; ?></td>
         <td > <?php echo '$',$maximoprecio; ?></td>

     	<td class="col-lg-1" style="background-color: #E5E4EF;"> 
     		 <!--
     		 <button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $ID_usuario; ?>');"> Editar </button>
     		 -->
     		 <button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" value="<?php echo $clavehraei; ?>"> Eliminar </button>
     	</td>
     </tr>
	<?php
}

?>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>
<td style="background-color: #E5E4EF;"></td>



<td style="background-color: #E5E4EF;"><label >Total</label></td>
<td style="background-color: #E5E4EF;"><input type="text" value="<?php echo '$',$var; ?>" readonly="readonly"></td>
<td style="background-color: #E5E4EF;"><input type="text" value="<?php echo '$',$var2; ?>" readonly="readonly"></td>
<td style="background-color: #E5E4EF;"></td>
</table>
<script type="text/javascript">
            $("button").click(function () {
                let fired_button = $(this).val();
                let ibxUserTwo=document.getElementById("claveUnicaContrato");
                let fired_button2=ibxUserTwo.value;
                let mensaje = confirm("el registro se eliminara")

                if (mensaje == true) {
                    window.location.href = "frontend/eliminaObjetoContratacion?Cjh="+ fired_button+'&Rmg='+fired_button2;
                } else {
                  swal({
                    title: '¡CANCELADO!',
                    text: '',
                    type: 'error',
                    timer: 1000,
                    showConfirmButton: false
                     });
                

                }
            });
        </script>
        <?php
         /*echo '<a href="redirect-cancelar-registro.php?var='.$clave3.'" class="btn btn-danger" style="width: 150px; float: left; margin-left: 50px; margin-top: 3px;">cancelar</a>';*/
         echo '<a href="principal" class="btn btn-info" style="width: 150px; float: right; margin-right: 50px; margin-top: 3px;">Finalizar</a>';
       
       ?>
</body>
</html>


