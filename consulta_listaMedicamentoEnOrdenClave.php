<html>
    <style>
        td{
            font-size: 12px;
        }
    </style>
<?php
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
require "conexion.php";
error_reporting(0);
$ID_usuario = $_POST['ID_usuario'];


$tabla="";
$query="SELECT id_ordenSuministro, 
partidaPresupuestal, 
claveHraei, 
cuadroBasico, 
cucop, 
LEFT(descripcionDelBien, 200) AS descripcionDelBien, 
unidadMedida, 
minimo, 
maximo, 
cantidad, 
precioUnitario, 
importe, 
claveContrato, 
claveUnicaOrden FROM ordensuministro where claveHraei = '$ID_usuario' and fechaContrato = '2021'";



//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);




if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '
       <table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
        
            <tr style="background-color: #7C7C7C; color: white; font-size:15px;">
			<th scope="col">Nombre proveedor</th>
			<th scope="col">Numero de contrato</th>
            <th scope="col">Numero de orden</th>
            <th scope="col">Fecha de orden</th>
			<th scope="col">Clave HRAEI</th>
			<th scope="col">Cuadro Basico</th>
			<th scope="col">CUCOP</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Unidad</th>
            <th scope="col">Minimo</th>
            <th scope="col">Maximo</th>
            <th scope="col">Solicitado en OS</th>
            <th scope="col">Faltante por entregar</th>
            <th scope="col">Costo</th>
            <th scope="col">Importe</th>
            
           

            
			
        </tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	$orden = $filaAlumnos['claveUnicaOrden'];
    $nombre = $filaAlumnos['claveContrato'];
    $clavehraei = $filaAlumnos['claveHraei'];
    $id_orden = $filaAlumnos['id_ordenSuministro'];
  $sql_i = "SELECT nombre_proveedor, numero_pedido from proveedores where id_proveedor = '$nombre'";
  $sq = mysqli_query($conexion2, $sql_i);
  $row = mysqli_fetch_assoc($sq);
  
  $sql = "SELECT cantidad, pzasEntrego, pzasEntrego2, pzasEntrego3 from ordensuministro where claveHraei = '$clavehraei' and id_ordenSuministro = '$id_orden' and fechaContrato = '2021'";
  $sq_i = mysqli_query($conexion2, $sql);
  $rows = mysqli_fetch_assoc($sq_i);
  
  $pzas1 = $rows['pzasEntrego'];
  $pzas2 = $rows['pzasEntrego2'];
  $pzas3 = $rows['pzasEntrego3'];
  $monto = $rows['cantidad'];
  
  $total1 = $pzas1 + $pzas2 + $pzas3;
  
  $totalGral = $monto - $total1;
  $respuesta;
$consult = $conexion2->query("SELECT fechaRegistro FROM numeroorden where claveUnicaContrato = '$orden'");
    $row_r = mysqli_fetch_assoc($consult);
        $fecha = $row_r['fechaRegistro'];
        
        if($total1 >= $monto){
            $respuesta = 0;
        }elseif($total1 < $monto){
            $respuesta = $totalGral;
        }
		$tabla.=
        '  
     
        <tr>
		    <td>'.$row['nombre_proveedor'].'</td>
		    <td>'.$row['numero_pedido'].'</td>
            <td>'.$filaAlumnos['claveUnicaOrden'].'</td>
            <td>'.$fecha.'</td>
			<td>'.$filaAlumnos['claveHraei'].'</td>
			<td>'.$filaAlumnos['cuadroBasico'].'</td>
			<td>'.$filaAlumnos['cucop'].'</td>
            <td>'.$filaAlumnos['descripcionDelBien'].'</td>
            <td>'.$filaAlumnos['unidadMedida'].'</td>
            <td>'.$filaAlumnos['minimo'].'</td>
            <td>'.$filaAlumnos['maximo'].'</td>
            <td>'.$filaAlumnos['cantidad'].'</td>
            <td>'.$respuesta.'</td>
            <td>'.formatMoney($filaAlumnos['precioUnitario']).'</td>
            <td>'.formatMoney($filaAlumnos['importe']).'</td>
            
            
      
			
			</tr>
         
        ';
		
		
	}

	$tabla.='</table>';
	$conexion2->close();
} else
	{

	}


echo $tabla;


?>
</html>