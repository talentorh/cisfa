<?php session_start();

if(isset($_SESSION['usuario'])) {

  if (isset ($_POST['editar'])){
    error_reporting(0);
  require 'conexion.php';
  $id_proveedor = $_POST['id_proveedor'];
  $numero_pedido = $_POST['numero_pedido'];
  $suf_presupuestaria = $_POST['suficiencia_presupuestaria'];
  $requisicion= $_POST['requisicion'];
  $partida_presupuestaria = $_POST['partida_presupuestaria'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio= $_POST['vigencia_pedido_inicio'];
  $fecha_termino = $_POST['vigencia_pedido_final'];
  

  
  $querY = "UPDATE proveedores set numero_pedido= '$numero_pedido', suficiencia_presupuestaria= '$suf_presupuestaria', requisicion= '$requisicion', partida_presupuestaria= '$partida_presupuestaria',fecha_firma= '$fecha_firma', vigencia_pedido_inicio= '$fecha_inicio',
  vigencia_pedido_final= '$fecha_termino',
  tipoadjudicacion = '$tipoadjudicacion'
   where id_proveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
}else{
  header('location: login');
}
}elseif(isset($_SESSION['usuarioFG'])) {

  if (isset ($_POST['editar'])){
    error_reporting(0);
  require 'conexion.php';
    $id_proveedor = $_POST['id_proveedor'];
  $numero_pedido = $_POST['numero_pedido'];
  $suf_presupuestaria = $_POST['suficiencia_presupuestaria'];
  $requisicion= $_POST['requisicion'];
  $partida_presupuestaria = $_POST['partida_presupuestaria'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio= $_POST['vigencia_pedido_inicio'];
  $fecha_termino = $_POST['vigencia_pedido_final'];

  $querY = "UPDATE proveedores set numero_pedido= '$numero_pedido', suficiencia_presupuestaria= '$suf_presupuestaria', requisicion= '$requisicion', partida_presupuestaria= '$partida_presupuestaria',fecha_firma= '$fecha_firma', vigencia_pedido_inicio= '$fecha_inicio',
  vigencia_pedido_final= '$fecha_termino',
  tipoadjudicacion = '$tipoadjudicacion'
   where id_proveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
}else{
  header('location: login');
}
}elseif(isset($_SESSION['usuarioAdmin'])) {

  if (isset ($_POST['editar'])){
    error_reporting(0);
  require 'conexion.php';
    $id_proveedor = $_POST['id_proveedor'];
  $numero_pedido = $_POST['numero_pedido'];
  $suf_presupuestaria = $_POST['suficiencia_presupuestaria'];
  $requisicion= $_POST['requisicion'];
  $partida_presupuestaria = $_POST['partida_presupuestaria'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio= $_POST['vigencia_pedido_inicio'];
  $fecha_termino = $_POST['vigencia_pedido_final'];

  $querY = "UPDATE proveedores set numero_pedido= '$numero_pedido', suficiencia_presupuestaria= '$suf_presupuestaria', requisicion= '$requisicion', partida_presupuestaria= '$partida_presupuestaria',fecha_firma= '$fecha_firma', vigencia_pedido_inicio= '$fecha_inicio',
  vigencia_pedido_final= '$fecha_termino',
  tipoadjudicacion = '$tipoadjudicacion'
   where id_proveedor = $id_proveedor limit 1";
 $edita= mysqli_query($conexion2, $querY);  
  
  if( $edita != false){
  
   echo "<script>
              alert('Tus datos hasn sido enviados con exito.');
              history.back()</script>";
              
  }else{
     echo "<script>
              alert('Hubo un error inesperado, favor de volver a rellenar el fromulario.');
              </script>";
  }
}else{
  header('location: login');
}
}
$conexion2->close();
?>