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
   
    
	$sql = "SELECT COUNT(*) total FROM consolidados WHERE DEMANDA = 'FARMACIA GRATUITA'";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);

    
    $tabla="";
    $query="SELECT DISTINCT PROVEEDOR, NUMERODECONTRATO, OFICIODEINFORMEDEADJUDICACION, DEMANDA FROM consolidados where DEMANDA = 'FARMACIA GRATUITA'";
    

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        $tabla.= 
        
        '
        <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 40px; font-style: italic;"><label>Total de contratos <input type="text" value='.$fila['total'].'></label></strong>
        <table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
       
            <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <th scope="col">Nombre proveedor</th>
                <th scope="col">RFC proveedor</th>
                <th scope="col">Telefono proveedor</th>
                <th scope="col">Email</th>
                <th scope="col">Numero pedido</th>
                <th scope="col">Monto minimo</th>
                <th scope="col">Monto maximo</th>
                <th scope="col">Monto consumido</th>
                <th scope="col">Estatus minimo</th>
                <th scope="col">Fecha vencimiento</th>
                <th scope="col">Vencimiento</th>
                <th scope="col">Nueva orden</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
                <th>Eliminar</th>
                
            </tr>';
          
        while($filaAlumnos= $buscarAlumnos->fetch_assoc())
        {
           
        $tabla.=
            '<tr>
      
                
                <td>'.$filaAlumnos['PROVEEDOR'].'</td>
                <td>'.$filaAlumnos['NUMERODECONTRATO'].'</td>
                <td>'.$filaAlumnos['OFICIODEINFORMEDEADJUDICACION'].'</td>
                <td>'.$filaAlumnos['DEMANDA'].'</td>
             
                            
                
             </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
       
    }
      
    echo $tabla;
    
    ?>
        <script type="text/javascript">
            let ibxUserTwo=document.getElementById("nombre");
                        let fired_button2=ibxUserTwo.value;
            $("button").click(function () {
                let fired_button = $(this).val();
                let mensaje = confirm("el registro se eliminara")
                
                if (mensaje == true) {
                    window.location.href = "frontend/eliminaProveedor.php?id_proveedor="+fired_button+"&nombre="+fired_button2;
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
