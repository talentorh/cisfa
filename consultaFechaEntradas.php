<?php 
error_reporting(0);

$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];

$dateForm2 = base64_encode($dateFrom);
$dateTo2 = base64_encode($dateTo);
	require 'conexion.php';
  
    $tabla="";
    $query = "SELECT ordensuministro.claveUnicaOrden, ordensuministro.nombreproveedor, ordensuministro.numerodecontrato, ordensuministro.claveHraei, ordensuministro.descripcionDelBien, ordensuministro.pzasEntrego, ordensuministro.pzasEntrego2, ordensuministro.pzasEntrego3, ordensuministro.pzasEntrego4, ordensuministro.pzasEntrego5, ordensuministro.fechaorden, proveedores.tipoFarmacia from ordensuministro inner join proveedores on proveedores.id_proveedor = ordensuministro.claveContrato and ordensuministro.fechaorden between '$dateFrom' and '$dateTo' where ordensuministro.pzasEntrego > 0 and ordensuministro.vigente = 0 and ordensuministro.fechacontrato = '2022'" ;
     
   /* $sql="SELECT sum(cantidad) as total
     from facturas where fecha_factura BETWEEN '$dateFrom' and '$dateTo' ";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);
   */





    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
       
       
        $tabla.= 
        
        '
    <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 20px; font-style: italic;"><label>Total de entradas <input type="text" value='.$fila['total'].'></label><a href="exportExcelFechaEntradas?dateFrom='.$dateForm2.'&dateTo='.$dateTo2.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>NOMBRE DE LABORATORIO</td>
                <td>NUMERO DE CONTRATO</td>
                <td>ORDEN DE SUMINISTRO</td>
                <td>FARMACIA</td>
                <td>CLAVE HAREI</td>
                <td>DESCRIPCION</td>
                <td>CANTIDAD</td>
                <td>FECHA</td>
 
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         $total1= $row['pzasEntrego'];
         $total2= $row['pzasEntrego2'];
         $total3= $row['pzasEntrego3'];
         $total4= $row['pzasEntrego4'];
         $total5= $row['pzasEntrego5'];
         
         $total = $total1 + $total2 + $total3 + $total4 + $total5;
         
   
            $tabla.=
            '
            <tr>
            <td>'.$row['nombreproveedor'].'</td>
            <td>'.$row['numerodecontrato'].'</td>
            <td>'.$row['claveUnicaOrden'].'</td>
            <td>'.$row['tipoFarmacia'].'</td> 
            <td>'.$row['claveHraei'].'</td>
            <td>'.$row['descripcionDelBien'].'</td>
            <td>'.$total.'</td>
            <td>'.$row['fechaorden'].'</td>
       
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
       