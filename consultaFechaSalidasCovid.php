<?php 
error_reporting(0);

$dateFrom = $_POST['dateFromCovid'];
$dateTo = $_POST['dateToCovid'];

$dateForm2 = base64_encode($dateFrom);
$dateTo2 = base64_encode($dateTo);
	require 'conexion.php';
  
    $tabla="";
    $query="SELECT covid.clavehraei, covid.descripcion, covid.cantidad, covid.fecha, covid.destino, pacientescovid.fechaingreso
     from covid inner join pacientescovid on pacientescovid.nombre = covid.destino where pacientescovid.fechaingreso BETWEEN '$dateFrom' and '$dateTo' limit 1000";
     
    $sql="SELECT sum(cantidad) as total
     from covid  where fecha BETWEEN '$dateFrom' and '$dateTo' ";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);
   





    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
       
       
        $tabla.= 
        
        '
    <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total de salidas <input type="text" value='.$fila['total'].'></label><a href="exportExcelCovid?dateFrom='.$dateForm2.'&dateTo='.$dateTo2.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>CLAVE HAREI</td>
                <td>DESCRIPCION</td>
                <td>CANTIDAD</td>
                <td>FECHA</td>
                <td>DESTINO</td>
    
                
    
             
                
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
     
            
            $tabla.=
            '
            <tr>
            <td>'.$row['clavehraei'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td>'.$row['cantidad'].'</td>
            <td>'.$row['fechaingreso'].'</td>
            <td>'.$row['destino'].'</td>
               
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
       