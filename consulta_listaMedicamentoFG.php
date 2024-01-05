<style>
    td{
        cursor: pointer;
    }
    td:hover{
        background: #BAC0C4;
    }
    tbody{
        overflow: scroll;
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
$val = $_POST['ID_usuario'];
$sql = "SELECT COUNT(*) total, PROVEEDOR, GRUPO, fechaContrato FROM listamedicamento where PROVEEDOR = '$val' or CLAVEHRAEI = '$val' or fechaContrato = '$val' ";
$result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);

$tabla="";
$query="SELECT id_medicamento, 
OFICIODEINFORMEDENOTIFICACION, 
FECHADEOFICIO, 
GRUPO, 
FUENTE, 
DEASIGNACION, 
PROVEEDOR,
otroLaboratorio, 
CLAVEHRAEI, 
CLAVEDECUADROBASICO, 
CUCOP, 
UNIDADDEMEDIDA, 
PRECIOUNITARIO, 
MINIMOCONSUMO, 
MAXIMOCONSUMO,
cantidad, 
MINIMOPRECIO, 
MAXIMOPRECIO, numeroContrato, tipoAdjudicacion,  DESCRIPCION, count(*) total, farmacia FROM listamedicamento where PROVEEDOR = '$val' and fechaContrato = '2022' or CLAVEHRAEI = '$val' and fechaContrato = '2022' group by listamedicamento.id_medicamento asc ";


//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '

<table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
        
           <tr  style="background-color:#7C7C7C; color: white; font-style: italic; ">
            <th scope="col">Proveedor</th>
            <th scope="col">Contrato</th>
            <th scope="col">Fuente de financiamiento</th>
            <th scope="col">Clave HRAEI</th>
            <th scope="col">Descripcion</th>
            <th scope="col">CNIS</th>
            <th scope="col">CUCOP</th>
            <th scope="col">UDM</th>
            <th scope="col">Precio unitario</th>
            <th scope="col">Minimo consumo</th>
            <th scope="col">Maximo consumo</th>
            <th scope="col">Consumo real</th>
            <th scope="col">Minimo precio</th>
            <th scope="col">Maximo precio</th>
            <th scope="col">Eliminar</th>
			
        </tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	$clave = base64_encode($filaAlumnos['id_medicamento']);
		
		$tabla.=
        '  
     <tbody>
        <tr>
            <td id='.$clave.' class="check" title="click para editar">'.$filaAlumnos['PROVEEDOR'].'</td>
            <td id='.$clave.' class="check" title="click para editar">'.$filaAlumnos['numeroContrato'].'</td>
            <td>'.$filaAlumnos['tipoAdjudicacion'].'</td>
            <td>'.$filaAlumnos['CLAVEHRAEI'].'</td>
            <td>'.$filaAlumnos['DESCRIPCION'].'</td>
            <td>'.$filaAlumnos['CLAVEDECUADROBASICO'].'</td>
            <td>'.$filaAlumnos['CUCOP'].'</td>
            <td>'.$filaAlumnos['UNIDADDEMEDIDA'].'</td>
            <td>'.formatMoney($filaAlumnos['PRECIOUNITARIO']).'</td>
            <td>'.$filaAlumnos['MINIMOCONSUMO'].'</td>
            <td>'.$filaAlumnos['MAXIMOCONSUMO'].'</td>
            <td>'.$filaAlumnos['cantidad'].'</td>
            <td>'.formatMoney($filaAlumnos['MINIMOPRECIO']).'</td>
            <td>'.formatMoney($filaAlumnos['MAXIMOPRECIO']).'</td>
			
			<td><button id="elimina" value='.$clave.'  style="background: none; font-size: 15px; border: 0; color: red"><i id ="eliminar" class="fas fa-trash"></i></button></td>
		
			
			</tr>
      </tbody>
         
        ';
		
		
	}

	$tabla.='</table>';
	$conexion2->close();
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;

?>

    <script>
    $(function(){

  $('table').on('click', '.check', function(){ 
  
      let clave = $(this).prop('id');
     
     window.open ('editarListaMedicamento?clave='+clave);
  });
});
        $("button").click(function () {
            var fired_button = $(this).val();
            var mensaje = confirm(
            "¡El medicamento se eliminara de la base de datos! ¿Desea continuar?");

            if (mensaje == true) {
                window.location.href = "eliminaMedicamento?id_medicamento=" + fired_button;
            } else {
                swal("Proceso cancelado", " ", "error");
            }
        });
    </script>

