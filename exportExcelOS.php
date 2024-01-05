<?php
$var = $_GET['id'];
	require 'conexion.php';
	
	//Consulta
    $sql = "SELECT * from ordensuministro where claveContrato = $var" ;

$salida = "";
$salida .= "<table style='color: black; font-size: 14px;' border=1>";
$buscarAlumnos=mysqli_query($conexion2,$sql);
   if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
      
       
        $salida.= 
        
        '<th>Clave HRAEI</th><th>CNIS</th><th>CUCOP</th><th>Descripcion</th><th>Cantidad</th><th>Precio Unitario</th><th>Importe</th><th>Entrega 1</th><th>monto</th><th>Entrega 2</th><th>monto 2</th><th>Entrega 3</th><th>monto3</th><th>Entrega 4</th><th>monto4</th><th>Entrega 5</th><th>monto5</th>';
     /*   $clave = $r['clavehraei'];
       
       $consulta = "SELECT CLAVEDECUADROBASICO from listamedicamento where CLAVEHRAEI = '$clave'";
       $consult = mysqli_query($conexion2, $consulta);
       $rs = mysqli_fetch_assoc($consult);*/
while($r = $buscarAlumnos->fetch_assoc()){
      
    
       
    $salida .= "<tr>
    <td>".$r['claveHraei']."</td>
    <td>".$r['cuadroBasico']."</td>
    <td>".$r['cucop']."</td>
    <td>".$r['descripcionDelBien']."</td>
    <td>".$r['cantidad']."</td>
    <td>".$r['precioUnitario']."</td>
    <td>".$r['importe']."</td>
    <td>".$r['pzasEntrego']."</td>
    <td>".$r['monto']."</td>
    <td>".$r['pzasEntrego2']."</td>
    <td>".$r['monto2']."</td>
    <td>".$r['pzasEntrego3']."</td>
    <td>".$r['monto3']."</td>
    <td>".$r['pzasEntrego4']."</td>
    <td>".$r['monto4']."</td>
    <td>".$r['pzasEntrego5']."</td>
    <td>".$r['monto5']."</td>
    </tr>";
        
    }
    
}
else{
    
}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ordenesSuministro_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>