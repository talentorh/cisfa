<?php 
error_reporting(0);

$clave = $_POST['clave'];
$dateFrom = $_POST['dateFrom3'];
$dateTo = $_POST['dateTo3'];


$clave4 = base64_encode($clave);
$dateFrom4 = base64_encode($dateFrom);
$dateTo4 = base64_encode($dateTo);

	require 'conexion.php';
  
    $tabla="";
    $query = "SELECT ordensuministro.nombreproveedor, ordensuministro.numerodecontrato, ordensuministro.claveHraei, ordensuministro.descripcionDelBien, ordensuministro.pzasEntrego, ordensuministro.pzasEntrego2, ordensuministro.pzasEntrego3, ordensuministro.fechaorden, proveedores.tipoFarmacia from ordensuministro inner join proveedores on proveedores.id_proveedor = ordensuministro.claveContrato and ordensuministro.fechaorden between '$dateFrom' and '$dateTo' where ordensuministro.claveHraei = '$clave' and ordensuministro.pzasEntrego > 0" ;
   // $query="SELECT * FROM facturas where clavehraei = '$clave' and fecha_factura between '$dateFrom3' and '$dateTo3' ";
     
   /* $sql="SELECT sum(cantidad) as total
     from facturas where clavehraei = '$clave' and fecha_factura between '$dateFrom3' and '$dateTo3'";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);*/
   

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
    <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total de entradas <input type="text" value='.$fila['total'].'></label><a href="exportExcel?dateFrom='.$dateFrom.'&dateTo='.$dateTo2.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>NOMBRE DE LABORATORIO</td>
                <td>NUMERO DE CONTRATO</td>
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
         
         $total = $total1 + $total2 + $total3;
         
   
            $tabla.=
            '
            <tr>
            <td>'.$row['nombreproveedor'].'</td>
            <td>'.$row['numerodecontrato'].'</td>
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