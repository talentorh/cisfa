<!DOCTYPE html>
<html>
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
	<script src="iconos/js/all.min.js"></script>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
	<link rel="stylesheet" href="iconos/css/all.css?n=1">
	<link rel="stylesheet" href="css/style.css?n=1">
	<script src="iconos/js/all.min.js"></script>
    
    <title>Ordenes de suministro</title>

</style>

<body>

<?php 
error_reporting(0);

$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];

$dateForm2 = base64_encode($dateFrom);
$dateTo2 = base64_encode($dateTo);
	require 'conexion.php';
  
    $tabla="";
    $query="SELECT consumoscisfa.clavehraei, consumoscisfa.descripcion, consumoscisfa.cantidad, consumoscisfa.central, consumoscisfa.fecha, controlmedicamentoinventario.clavehraei FROM consumoscisfa inner join controlmedicamentoinventario on controlmedicamentoinventario.clavehraei = consumoscisfa.clavehraei and consumoscisfa.fecha between '$dateFrom' and '$dateTo'  limit 1000";
     
    $sql="SELECT sum(consumoscisfa.cantidad) as total FROM consumoscisfa where fecha between '$dateFrom' and '$dateTo' ";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);
   





    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
    <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total de salidas <input type="text" value='.$fila['total'].'></label><a href="exportExcelFechaProm?dateFrom='.$dateForm2.'&dateTo='.$dateTo2.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
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
            <td>'.$row['central'].'</td>
               
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
       
    </main>
</body>
</html>