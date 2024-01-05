<div id="myModal_listarMedicamento" class="modal fade" role="dialog">
<script src="scripts/medicamentos.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">
    
                <div id="panel_editar">

                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                          
                        </div>
<style>
    label{
        color: black;
    }
</style>
                    
  
                    <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">       
                    <div class="modal-body" >
                        <label>BUSCAR POR NOMBRE O CLAVE DE MEDICAMENTO</label>  
                            <input list="consult_medica" class="form-control" id="buscardor" name="" type="text"  onchange="btn_buscar_medicamento();">
           
        <datalist id="consult_medica" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query("SELECT DISTINCT DESCRIPCION, CLAVEHRAEI, CLAVEDECUADROBASICO FROM listamedicamento where fechaContrato = '2021' or fechaContrato = '2023'");
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
            
<label>FILTRAR MEDICAMENTO POR PROVEEDOR</label>
<select class="form-control" id="select_medicam"  onchange="select_medica();">

    <option value=""> Seleccione </option>
    <meta charset="UTF-8">
    <?php

$sql_s = $conexion2 ->query("SELECT DISTINCT PROVEEDOR FROM listamedicamento order by PROVEEDOR asc");
while ($row_s = mysqli_fetch_array($sql_s)) {
$ID_usuario = $row_s['PROVEEDOR'];
$nombre = $row_s['PROVEEDOR'];

?>
<option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

<?php
}


?>

</select>

<label>BUSCAR MEDICAMENTO POR CONTRATO</label>  
                            <input list="contrat" class="form-control" id="select_contrat" name="" type="text"  onchange="select_cont();">
           
        <datalist id="contrat" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2 ->query("SELECT DISTINCT nombre_proveedor, numero_pedido FROM proveedores ");
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
    
