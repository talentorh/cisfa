<style>
        .titulo {
            
            font-size:27px;
            color : blue;
            text-align : center;
        }
        .titulo2 {
            
            font-size:27px;
            color : green;
            text-align : center;
        }
        .titulo3{
            
            font-size:27px;
            color : red;
            text-align : center;
        }
        .titulo4{
            
            font-size:27px;
            color : black;
            text-align : center;
        }
        td:hover{
            background: #BAC0C4;
        }
        td{
            cursor: pointer;
        }
    </style>
<?php 
error_reporting(0);
 function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
                    if (is_numeric($number)) { // a number
                      if (!$number) { // zero
                        $money = ($cents == 2 ? '0.00' : '0'); // output zero
                      } else { // value
                        if (floor($number) == $number) { // whole number
                          $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
                        } else { // cents
                          $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
                        } // integer or decimal
                      } // value
                      return '$'.$money;
                    } // numeric
                  } // formatMoney
	require 'conexion.php';
    $numerocontrato = $_POST['ID_usuario'];
    
	$sql = "SELECT COUNT(*) total FROM proveedores WHERE numero_pedido = '$numerocontrato'";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);

    
    $tabla="";
    $query="SELECT id_proveedor, 
    nombre_proveedor,  
    rfc_proveedor, 
    telefono_proveedor, 
    direccion_internet, 
    email_proveedor, 
    numero_pedido, 
    suficiencia_presupuestaria,
    requisicion,
    total_minimo,
    total_maximo,
    tipoFarmacia,
    vigencia_pedido_final,
    tipoadjudicacion,
    LEFT(domicilio_proveedor,250) AS domicilio_proveedor FROM proveedores where numero_pedido = '$numerocontrato' and tipoFarmacia = 'gratuita 2023'";
    

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        $tabla.= 
        
        '
        <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 40px; font-style: italic;"><label>Total de contratos <input type="text" value='.$fila['total'].'></label></strong>
        <table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
       
            <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <th scope="col">Nombre proveedor</th>
                <th scope="col">RFC</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Tipo de contrato</th>
                <th scope="col">Numero pedido</th>
                <th scope="col">Tipo de adjudicación</th>
                <th scope="col">Monto minimo</th>
                <th scope="col">Monto maximo</th>
                <th scope="col">Monto consumido</th>
                <th scope="col">Estatus minimo</th>
                <th scope="col">Vencimiento</th>
                <th scope="col">O.S</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
                <th>Eliminar</th>
                
            </tr>';
          
        $fecha_actual = new DateTime(date('Y-m-d'));
        while($filaAlumnos= $buscarAlumnos->fetch_assoc())
        {
            $id = $filaAlumnos['id_proveedor'];
            $minimo = $filaAlumnos['total_minimo'];
            $maximo = $filaAlumnos['total_maximo'];

            $contrato = $filaAlumnos['numero_pedido'];

            $sql_r = $conexion2->query("SELECT sum(MINIMOPRECIO) as total1, sum(MAXIMOPRECIO) as total2 from listamedicamento where numeroContrato = '$contrato'");
            $resp = mysqli_fetch_assoc($sql_r); 

            $min = $resp['total1'];
            $max = $resp['total2'];

           $sql = $conexion2->query("SELECT sum(importe) as total from ordensuministro  where claveContrato = $id");
    $row = mysqli_fetch_assoc($sql);
    $totalContrato = $row['total'];
                $fecha_final = new DateTime($filaAlumnos['vigencia_pedido_final']);
                $dias = $fecha_actual->diff($fecha_final)->format('%r%a');
                // Si la fecha final es igual a la fecha actual o anterior
                 if ($dias <= 0) {
                    /*echo '<td><button class="btn btn-danger" style="width: 50px; height: 20px;  text-size:10px; color: black;"></button></td>';*/
                }elseif ($dias <= 15) {
                    /*echo '<td>Está a ' . $dias . ' días de vencer</td>';*/
                } else {
                    /*echo '<td></td>';*/
                }
                $MINIMOOK = "<i class='lnr lnr-flag'></i>";
                $sincubrir = "<i class='lnr lnr-flag'></i>";
                $sincubrirmin = "<i class='lnr lnr-flag'></i>";
                $maximook = "<i class='lnr lnr-flag'></i>";
                $valor = base64_encode($filaAlumnos['id_proveedor']);
                $name = base64_encode($filaAlumnos['nombre_proveedor']);
                $contrato = base64_encode($filaAlumnos['numero_pedido']);
            if($totalContrato >= $min and $totalContrato < $max ){
                $cubierto = "<span class='titulo'> $MINIMOOK";
            }elseif($totalContrato >= $max ){
                $cubierto = "<span class='titulo3'> $maximook";
            }elseif($totalContrato < $min ){
                $cubierto = "<span class='titulo2'> $sincubrir";
            }elseif($totalContrato == '' ){
                $cubierto = "<span class='titulo4'> $sincubrirmin";
            }
            $tabla.=
            '<tr>
            <input type="hidden" id="nombre" value="'.$name.'">
                
                <td>'.$filaAlumnos['nombre_proveedor'].'</td>
                <td>'.$filaAlumnos['rfc_proveedor'].'</td>
                <td>'.$filaAlumnos['correoElectronico'].'</td>
                <td>'.$filaAlumnos['telefono_proveedor'].'</td>
                <td>'.$filaAlumnos['tipoFarmacia'].'</td>
                <td>'.$filaAlumnos['numero_pedido'].'</td>
                <td>'.$filaAlumnos['tipoadjudicacion'].'</td>
                <td>'.formatMoney($resp['total1']).'</td>
                <td>'.formatMoney($resp['total2']).'</td>
                <td>'.formatMoney($totalContrato).'</td>
                <td>'.$cubierto.'</td>
                <td>A '.$dias.' dias de vencer</td>
                <td><a href="ordenSuminstroFG?Xy='.$valor.'&tr='.$contrato.'" target="popup" onClick="window.open(this.href, this.target, "width=1100,height=600,top=15px, left=220,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO" ); return false;"
                style="font-size: 24px; color: green; background: none; border: none;" class="lnr lnr-file-add"></a></td>
                <td><a  href="editarContratoFG?Xy='.$valor.'"  style="font-size: 24px; color: blue; background: none; border: none;" class="lnr lnr-enter"></a></td>
                <td><a  href="verContratoFG?Xy='.$valor.'" style="font-size: 24px; color: yellow; background: none; border: none;" class="lnr lnr-exit"></a></td>
                <td><button type="button" value='.$valor.' style="font-size: 24px; color: red; background: none; border: none;" class="lnr lnr-trash"><i id ="eliminar" ></i></button></td>
                            
                
             </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
       
    }
      
    echo $tabla;
    
    ?>
        <script type="text/javascript">
            var ibxUserTwo=document.getElementById("nombre");
                        var fired_button2=ibxUserTwo.value;
            $("button").click(function () {
                var fired_button = $(this).val();
                var mensaje = confirm("el registro se eliminara")
                
                if (mensaje == true) {
                    window.location.href = "frontend/eliminaProveedorFG?id_proveedor="+fired_button+"&nombre="+fired_button2;
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