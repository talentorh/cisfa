<?php
error_reporting(0);
require 'conexion.php';
$valor=$_POST['dato'];


    $query= $conexion2->query("SELECT CLAVEHRAEI, DESCRIPCION, CUCOP FROM listamedicamento where CLAVEDECUADROBASICO = '$valor' and fechaContrato = '2022' and farmacia = 'intrahospitalaria' LIMIT 1");
    $rw= mysqli_fetch_array($query);

    $clavehraei=$rw['CLAVEHRAEI'];
    $descripciondelbien=$rw['DESCRIPCION'];
    $cucopmedicamento=$rw['CUCOP'];

    
    

if($rw > 0){
?>

<label>CLAVE HRAEI</label>
                            <div class="input-group">
                           
                                <input id="clave_hraei" type="text" class="form-control"
                                    value="<?php echo $clavehraei ?>" readonly>
                            </div>
                    
                
                            <label>DESCRIPCIÓN</label>
                            <div class="input-group">
                             
                                <textarea rows="6" id="descripcion" class="form-control" 
                                    required="required" readonly><?php echo $descripciondelbien ?></textarea>
                            </div>
                
                
                            <label>CUCOP</label>
                            <div class="input-group">
                        
                                <input id="cucop" type="text" class="form-control"
                                    required="required" value="<?php echo $cucopmedicamento ?>" readonly>
                            </div>
                        <?php }else{ ?>
                            <label>CLAVE HRAEI</label>
                            <div class="input-group">
                           
                                <input id="clave_hraei" type="text" class="form-control"
                                    value="">
                            </div>
                    
                
                            <label>DESCRIPCIÓN</label>
                            <div class="input-group">
                             
                                <textarea rows="6" id="descripcion" class="form-control" 
                                    required="required"></textarea>
                            </div>
                
                
                            <label>CUCOP</label>
                            <div class="input-group">
                        
                                <input id="cucop" type="text" class="form-control"
                                    required="required" value="">
                            </div>

                        <?php } ?>