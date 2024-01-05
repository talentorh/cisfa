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
    <title>Contratos CISFA</title>
</head>
<body>
<center>
<div class="container" style="margin-top: 10px; width: 700px; padding: 5px;">
    
        <div class="cabecera-contrato" >
            <div class="imagen1" style="float: left; margin-left: 0px; margin-top: 10px;"></div>
 
        </div>
    
<?php
$ID_usuario = base64_decode($_GET['var']);

require 'conexion.php';

$sql_u = $conexion2->query("SELECT * FROM proveedores WHERE id_proveedorDato ='$ID_usuario'");
 $row_u = mysqli_fetch_array($sql_u);
 $id_datoProveedor = base64_encode($row_u['id_proveedor']);
 $nombre_proveedor = base64_encode($row_u['nombre_proveedor']);

 $id_datoProveedor3 = base64_decode($id_datoProveedor);
 $nombre_proveedor3 = base64_decode($nombre_proveedor);
 

 $sql = $conexion2->query("SELECT rfc, direccionInternet from datosproveedor where datoPersonalProveedor = '$nombre_proveedor3'");
 $row = mysqli_fetch_assoc($sql);
 $rfc = $row['rfc'];
 $direccionInternet = $row['direccionInternet'];

?>
<form method="POST" action="redirect-update-contratoFG">
     

<label class="fecha-inicio"></label>

<div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="id_proveedor" type="hidden" class="form-control" placeholder="Clave unica"
                                readonly="readonly" value="<?php echo $id_datoProveedor; ?>" >
                        </div>
                        <label class="fecha-inicio"></label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="nombre_proveedor" type="hidden" class="form-control" placeholder="Clave unica"
                                 readonly="readonly" value="<?php echo $nombre_proveedor; ?>" >
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="" type="text" class="form-control" placeholder="Clave unica"
                                 readonly="readonly" value="<?php echo $id_datoProveedor3; ?>" >
                        </div>
                        <label class="fecha-inicio"></label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="" type="text" class="form-control" placeholder="Clave unica"
                                 readonly="readonly" value="<?php echo $nombre_proveedor3; ?>" >
                        </div><br>
                        <strong>Fitar por tipo de contratos</strong>
            <select class="list-group-item list-group-item-action bg-ligh" id="select_tipoFarm" style="height: 45px; cursor: pointer;" onchange="select_tipoFarm();" name="tipofarmacia" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Tipo de contrato</option>
                    <meta charset="UTF-8">
                    <?php
                   
                        $sql_s = $conexion2->query ("SELECT tipoFarmacia FROM tipoFarmacia where id_tipoFarmacia = 4");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario = $row_s['tipoFarmacia'];
                                $nombre = $row_s['tipoFarmacia'];
                    ?>
                    <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                <?php
                    }
                

                ?>
             </select><br>
                        <strong>NUMERO DE PEDIDO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="numeroContrato" id="numeroContrato" type="text" class="form-control"
                                 >
                        </div>
                        <strong>RFC</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="rfc" type="text" class="form-control" readonly="readonly" value="<?php echo $rfc; ?>" 
                                 >
                        </div>

                        <strong>DIRECCIÓN DE INTERNET</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="direccion_internet" type="text" class="form-control" readonly="readonly" value="<?php echo $direccionInternet; ?>" 
                                 >
                        </div>

                        <strong>SUFICIENCIA PRESUPUESTARIA</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="suficiencia_presupuestaria" type="text" class="form-control"
                                 >
                        </div>

                        <strong>REQUISICIÓN</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="requisicion" type="text" class="form-control"
                                 >
                        </div>

                        <strong>PARTIDA PRESUPUESTARIA</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="partida_presupuestaria" type="text" class="form-control"
                                 >
                        </div>

                        <strong>FECHA DE FIRMA</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="fecha_firma" type="date" class="form-control"
                                 >
                        </div>

                        <strong>VIGENCIA DEL PEDIDO, FECHA DE INICIO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="vigencia_pedido_incio" type="date" class="form-control" 
                                 >
                        </div>

                        <strong>VIGENCIA DEL PEDIDO, FECHA DE TERMINO</strong>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="vigencia_pedido_termino" type="date" class="form-control" 
                                 >
                        </div><br>

	        <div class="card">
                        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Monto</h3>
                        <div class="card-body">
                          <div id="table" class="table-editable">
                            <span class="table-add float-right mb-3 mr-2"><a href="#" class="text-success"><i
                                  class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
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
                                    <th class="text-center">SUBTOTAL</th>
                                    <td><input type="text" name="sub_min" readonly value="<?php echo $row_u['sub_minimo']; ?>"></td>
                                    <td><input type="text" name="sub_max"  readonly value="<?php echo $row_u['sub_maximo']; ?>"></td>
                                </tr>
                               <tr> 
                                <th class="text-center">I.V.A</th>
                                <td><input type="text" name="iva_min" readonly value="0%" readonly></td>
                                <td><input type="text" name="iva_max" readonly value="0%" readonly></td>
                               </tr>  
                                  <tr><th class="text-center">TOTAL</th>
                                <td><input type="text" name="total_min" readonly value="<?php echo $row_u['total_minimo']; ?>"></td>
                                <td><input type="text" name="total_max" readonly value="<?php echo $row_u['total_maximo']; ?>"></td>
                                </tr>
                                  
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <input type="submit" name="editar" class="btn btn-info" style="float: left;" value="Continuar">
                        <?php
                         echo '<input type="submit "><a href="redirect-cancelar-registro?var='.$id_datoProveedor.'" class="btn btn-danger" style="float: left; margin-left: 10px;">cancelar</a>';
                        ?>
                        </div>
                        
                      </div></center>
                     

</form>
</body>
</html>