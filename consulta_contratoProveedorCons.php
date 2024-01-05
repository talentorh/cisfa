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


$tabla="";
$query="SELECT * FROM consolidados where NUMERODECONTRATO = '$val' group by consolidados.ID_CONSOLIDADA asc ";


//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '
<table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
        
           <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
			<th scope="col">N° oficio adjudicacion</th>
            <th scope="col">Contrato</th>
            <th scope="col">Oficio de adjudicación</th>
            <th scope="col">Grupo</th>
            <th scope="col">N° de contrato</th>
            <th scope="col">Fecha de formalización</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Demanda</th>
            <th scope="col">Clave HRAEI</th>
            <th scope="col">CNIS</th>
            <th scope="col">CUCOP</th>
            <th scope="col">Descripción</th>
            <th scope="col">Presentación</th>
            <th scope="col">UDM</th>
            <th scope="col">Minimo</th>
            <th scope="col">Maximo</th>
            <th scope="col">Solicitado por CISFA</th>
            <th scope="col">Precio unitario</th>
            <th scope="col">Importe minimo</th>
            <th scope="col">Importe maximo</th>
            <th scope="col">Origen del bien</th>
            <th scope="col">Nombre del fabricante</th>
            <th scope="col">N° de registro sanitario</th>
            <th scope="col">Editar</th>
            <th scope="col">Ver</th>
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
			<td>'.$filaAlumnos['OFICIODEINFORMEDEADJUDICACION'].'</td>
            <td>'.$filaAlumnos['CONTRATO'].'</td>
            <td>'.$filaAlumnos['OFICIODEADJUDICACION'].'</td>
            <td>'.$filaAlumnos['GRUPO'].'</td>
            <td>'.$filaAlumnos['NUMERODECONTRATO'].'</td>
            <td>'.$filaAlumnos['FECHADEFORMALIZACION'].'</td>
            <td>'.$filaAlumnos['PROVEEDOR'].'</td>
            <td>'.$filaAlumnos['DEMANDA'].'</td>
            <td>'.$filaAlumnos['CLAVEHRAEI'].'</td>
            <td>'.$filaAlumnos['CNIS2'].'</td>
            <td>'.$filaAlumnos['CUCOP'].'</td>
            <td>'.$filaAlumnos['DESCRIPCIONDELBIEN'].'</td>
            <td>'.$filaAlumnos['PRESENTACION'].'</td>
            <td>'.$filaAlumnos['UNIDADDEMEDIDA'].'</td>
            <td>'.$filaAlumnos['CANTIDADMINIMA'].'</td>
            <td>'.$filaAlumnos['CANTIDADMAXIMA'].'</td>
            <td>'.$filaAlumnos['CANTIDADSOLICITADAPORCISFA'].'</td>
            <td>'.$filaAlumnos['PRECIOUNITARIO'].'</td>
            <td>'.$filaAlumnos['IMPORTEMINIMO'].'</td>
            <td>'.$filaAlumnos['IMPORTEMAXIMO'].'</td>
            <td>'.$filaAlumnos['ORIGENDELBIEN'].'</td>
            <td>'.$filaAlumnos['NOMBREDELFABRICANTE'].'</td>
            <td>'.$filaAlumnos['NOUMERODEREGISTROSANITARIO'].'</td>
			<td><a href="editarListaMedicamento?clave='.$clave.'" target="popup" onClick="window.open(this.href, this.target, "width=1130,height=800, top=15px, left=180,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO" ); return false;"> <i id="guardar" class="fas fa-edit" ></a></i></td>
			<td><a  href="verMedicamento?clave='.$clave.'"  target="popup" onClick="window.open(this.href, this.target, "width=1130,height=800, top=15px, left=180,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO" ); return false;"><i id="ver" class="fas fa-binoculars"></i></a></td>
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
