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
$dateFrom = $_POST['dateFrom6'];
$dateTo = $_POST['dateTo6'];

$dateForm2 = base64_encode($dateFrom);
$dateTo2 = base64_encode($dateTo);
	require 'conexion.php';
  
    $tabla="";
    $query="SELECT proveedores.*, ordensuministro.*, datosproveedor.datoPersonalProveedor FROM proveedores INNER JOIN datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor INNER join ordensuministro on ordensuministro.numerodecontrato = proveedores.numero_pedido WHERE ordensuministro.fechaorden BETWEEN '$dateFrom' AND '$dateTo' AND proveedores.year = '2022' AND proveedores.tipoFarmacia = 'intrahospitalaria 2022' AND ordensuministro.cantidad is not null ";
     
    
   





    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
       
       
        $tabla.= 
       
        '
  <strong style="float: left; margin-left:0%; font-size: 15px; margin-top: 10px; font-style: italic;"><a href="exportExcelSolicitadoOS2022?dateFrom='.$dateForm2.'&dateTo='.$dateTo2.'" >Exportar a excel</a></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"  style="font-size: 12px;">
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
            
                <td>PROVEEDOR</td>
                <td>NUMERO DE CONTRATO</td>
                <td>NUMERO DE O.S</td>
                <td>CLAVE HAREI</td>
                <td>CNIS</td>
                <td>CUCOP</td>
                <td>DESCRIPCION</td>
                <td>CANTIDAD</td>
                <td>P.U</td>
                <td>IMPORTE</td>
                <td>FECHA DE O.S</td>
 
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
   
        $tabla.=
            '
            <tr>
            <td>'.$row['datoPersonalProveedor'].'</td>
            <td>'.$row['numero_pedido'].'</td>
            <td>'.$row['claveUnicaOrden'].'</td>
            <td>'.$row['claveHraei'].'</td>
            <td>'.$row['cuadroBasico'].'</td>
            <td>'.$row['cucop'].'</td>
            <td>'.$row['descripcionDelBien'].'</td>
            <td>'.$row['cantidad'].'</td>
            <td>'.formatMoney($row['precioUnitario']).'</td>
            <td>'.formatMoney($row['importe']).'</td>
            <td>'.$row['fechaorden'].'</td>
       
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
       