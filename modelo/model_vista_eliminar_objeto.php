<?php
$id=$_POST['cucop'];

require '../conexion.php';

$sql = $conexion2->query("SELECT DESCRIPCION, CUCOP FROM objetocontratacion WHERE CUCOP='$id'");
$row = mysqli_fetch_array($sql);

echo $nombre = $row['DESCRIPCION']; 
echo " "; echo $apellido = $row['CUCOP'];



?>
<input type="hidden" id="CUCOP"  onclick="btn_eliminar('<?php echo $cucop; ?>');">