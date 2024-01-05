<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 

if(isset($_SESSION['usuario'])) {
  error_reporting(0);
    
require 'conexion.php';
$clav = base64_decode($_GET['id_proveedor']);
$cantidad = $_GET['cantidad'];
$id = $_GET['id_ordenSuministro'];
$claveUnicaContrato = $_GET['claveUnicaContrato'];
$claveMedicamento = $_GET['claveMedicamento'];
$contrato = $_GET['contrato'];
$claveUnica = base64_decode($_GET['claveUnica']);
$selec = "SELECT consumoMedicamento from consumorealmedicamento where claveMedicamento = '$claveMedicamento' and claveConsumoContrato = '$claveUnica'";
$result = $conexion2->query($selec);
$follow = $result->fetch_assoc();
$total1 = $follow['consumoMedicamento'];

$select = "SELECT cantidad from listamedicamento where CLAVEHRAEI = '$claveMedicamento' and numeroContrato = '$contrato'";
$sql = mysqli_query($conexion2, $select);
$result = mysqli_fetch_assoc($sql);
$total2 = $result['cantidad'];

$total3 = $total2 - $cantidad;

$update ="UPDATE listamedicamento SET cantidad = $total3 WHERE CLAVEHRAEI = '$claveMedicamento' and numeroContrato = '$contrato'";
$result = mysqli_query($conexion2, $update);


$sql = "DELETE from consumorealmedicamento where claveMedicamento = '$claveMedicamento' and claveConsumoContrato = '$claveUnica'";
$result = mysqli_query($conexion2, $sql);

$sql = "DELETE from ordensuministro where claveUnicaOrden = '$claveUnica' and id_ordenSuministro = $id";
$result = mysqli_query($conexion2, $sql);

         

echo "<script>
 alert('GOOD');
window.history.back();</script>";
     
}elseif(isset($_SESSION['usuarioAdmin'])) {
  error_reporting(0);
    
require 'conexion.php';
$clav = base64_decode($_GET['id_proveedor']);
$cantidad = $_GET['cantidad'];
$id = $_GET['id_ordenSuministro'];
$claveUnicaContrato = $_GET['claveUnicaContrato'];
$claveMedicamento = $_GET['claveMedicamento'];
$contrato = $_GET['contrato'];
$claveUnica = base64_decode($_GET['claveUnica']);
$selec = "SELECT consumoMedicamento from consumorealmedicamento where claveMedicamento = '$claveMedicamento' and claveConsumoContrato = '$claveUnica'";
$result = $conexion2->query($selec);
$follow = $result->fetch_assoc();
$total1 = $follow['consumoMedicamento'];

$select = "SELECT cantidad from listamedicamento where CLAVEHRAEI = '$claveMedicamento' and numeroContrato = '$contrato'";
$sql = mysqli_query($conexion2, $select);
$result = mysqli_fetch_assoc($sql);
$total2 = $result['cantidad'];

$total3 = $total2 - $cantidad;

$update ="UPDATE listamedicamento SET cantidad = $total3 WHERE CLAVEHRAEI = '$claveMedicamento' and numeroContrato = '$contrato'";
$result = mysqli_query($conexion2, $update);


$sql = "DELETE from consumorealmedicamento where claveMedicamento = '$claveMedicamento' and claveConsumoContrato = '$claveUnica'";
$result = mysqli_query($conexion2, $sql);

$sql = "DELETE from ordensuministro where claveUnicaOrden = '$claveUnica' and id_ordenSuministro = $id";
$result = mysqli_query($conexion2, $sql);

         

echo "<script>
 alert('GOOD');
window.history.back();</script>";
     
}else{
    header('location: ../index.php');
}

?> 
