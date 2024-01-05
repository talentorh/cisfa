<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>

</head>
<style>
    td{
        cursor: pointer;
    }
</style>
<body>
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
$sql = "SELECT COUNT(*) total, PROVEEDOR, GRUPO, fechaContrato FROM listamedicamento where numeroContrato = '$val' ";
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
MAXIMOPRECIO, numeroContrato,  DESCRIPCION, count(*) total FROM listamedicamento where numeroContrato = '$val' group by listamedicamento.id_medicamento asc ";


//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '
   
<label style="float: left; margin-left:0%; font-size: 17px; margin-top: 0px;">Total de claves <input type="text" value='.$fila['total'].' class="form-input"></label><a href="exportExcelClaves?clave='.$val.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i>
<table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
        
           <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
		
            <th scope="col">Proveedor</th>
            <th scope="col">Numero de contrato</th>
            
            <th scope="col">Clave HRAEI</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Clave cuadro basico</th>
            <th scope="col">CUCOP</th>
            <th scope="col">Unidad de medida</th>
            <th scope="col">Precio unitario</th>
            <th scope="col">Minimo consumo</th>
            <th scope="col">Maximo consumo</th>
            <th scope="col">Consumo real</th>
            <th scope="col">Minimo precio</th>
            <th scope="col">Maximo precio</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
			
        </tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	$clave = base64_encode($filaAlumnos['id_medicamento']);
		
		$tabla.=
        '  
     
        <tr>
		
            <td>'.$filaAlumnos['PROVEEDOR'].'</td>
            <td>'.$filaAlumnos['numeroContrato'].'</td>
           
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
			<td><a  href="editarListaMedicamento?clave='.$clave.'"  ><i id="guardar" class="fas fa-edit" ></i></a></td>
			<td><button id="elimina" value='.$clave.'  style="background: none; border: 0; color:inherit"> <i id ="eliminar" class="fas fa-trash"></i></button></td>
		
			
			</tr>
      
         
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
    <script type="text/javascript">
        $("button").click(function () {
            let fired_button = $(this).val();
            let mensaje = confirm(
            "¡El medicamento se eliminara de la base de datos! ¿Desea continuar?");

            if (mensaje == true) {
                window.location.href = "frontend/eliminaMedicamento.php?id_medicamento=" + fired_button;
            } else {
                swal("Proceso cancelado", " ", "error");
            }
        });
    </script>

</body>

</html>