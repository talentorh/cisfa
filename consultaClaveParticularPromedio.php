<?php 
error_reporting(0);

$clave = $_POST['clave'];
$dateFrom3 = $_POST['dateFrom3'];
$dateTo3 = $_POST['dateTo3'];


$clave4 = base64_encode($clave);
$dateFrom4 = base64_encode($dateFrom3);
$dateTo4 = base64_encode($dateTo3);

	require 'conexion.php';
  
    $tabla="";
    $query="SELECT * FROM covid where clavehraei = '$clave' and fecha between '$dateFrom3' and '$dateTo3'  order by fecha asc limit 1000";
     
    $sql="SELECT sum(cantidad) as total
     from covid where clavehraei = '$clave' and fecha between '$dateFrom3' and '$dateTo3'";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);
   

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
    <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total de salidas <input type="text" value='.$fila['total'].'></label><a href="exportExcelPieza?lab='.$clave4.'&dateFrom2='.$dateFrom4.'&dateTo2='.$dateTo4.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>CLAVE HAREI</td>
                <td>DESCRIPCION</td>
                <td>CANTIDAD</td>
                <td>FECHA</td>
                <td>CENTRAL</td>
                
    
             
                
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         
            
            
            $tabla.=
            '
            <tr>
            <td>'.$row['clavehraei'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td>'.$row['cantidad'].'</td>
            <td>'.$row['fecha'].'</td>
              
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
       