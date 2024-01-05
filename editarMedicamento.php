<?php session_start();

if (isset($_POST['editarMedicamento'])){
    error_reporting(0);
    $id_medicamento =$_POST['id_medicamento'];
    $grupo=$_POST['grupo'];
    $designacion=$_POST['designacion'];
    $proveedor=$_POST['proveedor'];
    $clave_hraei=$_POST['clave_hraei'];
    $descripcion=$_POST['descripcion'];
    $clave_cuadro_basico=$_POST['clave_cuadro_basico'];
    $cucop=$_POST['cucop'];
    $unidad_medida=$_POST['unidad_medida'];
    $precio_unitario_sin_iva=$_POST['precio_unitario_sin_iva'];
    $hraei_minimo=$_POST['hraei_minimo'];
    $hraei_maximo=$_POST['hraei_maximo'];
    $hraei_minimo_costo=$_POST['hraei_minimo_costo'];
    $hraei_maximo_costo=$_POST['hraei_maximo_costo'];
    $otroLaboratorio=$_POST['OtroProveedor'];
    $numeroContrato =$_POST['numeroContrato'];
    $financiamiento = $_POST['financiamiento'];
    
    
        require "conexion.php";

$sql = $conexion2->query("UPDATE listamedicamento set GRUPO = '$grupo',
DEASIGNACION = '$designacion', PROVEEDOR = '$proveedor', CLAVEHRAEI= '$clave_hraei', DESCRIPCION= '$descripcion', CLAVEDECUADROBASICO = '$clave_cuadro_basico', CUCOP = '$cucop',
UNIDADDEMEDIDA = '$unidad_medida', PRECIOUNITARIO = '$precio_unitario_sin_iva', MINIMOCONSUMO = '$hraei_minimo', MAXIMOCONSUMO = '$hraei_maximo', MINIMOPRECIO = '$hraei_minimo_costo', MAXIMOPRECIO = '$hraei_maximo_costo', otroLaboratorio = '$otroLaboratorio', numeroContrato= '$numeroContrato', tipoAdjudicacion = '$financiamiento'
where id_medicamento = $id_medicamento limit 1");

}
if($sql != false){
    echo "<script>alert('Datos actualizados exitosamente');</script>";
}else{
    echo "<script>alert('Error inseperado, intente nuevamente'); </script>";
}

echo "<script>window.history.back();</script>";

?>
