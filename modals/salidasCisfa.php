<div id="myModal_salidasCisfa" class="modal fade in" role="dialog">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: green; color: white; height: 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 16px;">Medicamentos en O.S 2023</h4>
            </div>
            <div class="modal-body">



                <div class="imagen1"></div>



                <!-- 
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
            /**
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT central FROM consumoscisfa");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['central'];
              $nombre = $row_s['central'];
              
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
             **/

            ?>
            
                            </select>--><br>
                <strong id="strong" style="color:black;">Fecha inicio:</strong><br>
                <input type="date" id="dateFrom" class="form-control" required="required" value="" style="width: 100%;">

                <strong id="strong" style="color:black;">Fecha final:</strong><br>
                <input type="date" id="dateTo" class="form-control" required="required" value="" style="width: 100%;">
                <input type="submit" onclick="selectDate();" class="btn btn-warning" value="Buscar Medicamento" style="width: 100%; margin-left: 0px; margin-top: 30px; color: white; font-size: 12px;"><br><br>


                <!--<strong id="strong" style="color:black;">CLAVE DATE FROM:</strong><br>
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
            $sql_s = $conexion2->query("SELECT DISTINCT clavehraei FROM consumoscisfa");
            while ($row_s = mysqli_fetch_array($sql_s)) {
                $ID_usuario = $row_s['clavehraei'];
                $nombre = $row_s['clavehraei'];
            ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }


                ?>
        </datalist><br>-->

            </div>
        </div>
    </div>
</div>