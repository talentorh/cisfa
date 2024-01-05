<?php session_start();

error_reporting(0);

$designacion = $_POST['designacion'];
$proveedor = $_POST['proveedor'];
$clave_hraei = $_POST['clave_hraei'];
$descripcion = $_POST['descripcion'];
$clave_cuadro_basico = $_POST['clave_cuadro_basico'];
$cucop = $_POST['cucop'];
$unidad_medida = $_POST['unidad_medida'];
$precio_unitario_sin_iva = $_POST['precio_unitario_sin_iva'];
$hraei_minimo = $_POST['hraei_minimo'];
$hraei_maximo = $_POST['hraei_maximo'];
$hraei_minimo_costo = $_POST['hraei_minimo_costo'];
$hraei_maximo_costo = $_POST['hraei_maximo_costo'];
$otroLaboratorio = $_POST['otroLaboratorio'];
$year = $_POST['year'];
$numeroContrato = $_POST['numeroContrato'];
$tipofarmacia = $_POST['tipofarmacia'];
$id_proveedor = $_POST['id_proveedor'];
$id_datoProveedor = rand(1, 9000);

require "conexion.php";

$statement = $conexion->prepare("INSERT INTO listamedicamento (id_medicamento,
        DEASIGNACION,
        PROVEEDOR,
        CLAVEHRAEI,
        DESCRIPCION,
        CLAVEDECUADROBASICO,
        CUCOP,
        UNIDADDEMEDIDA,
        PRECIOUNITARIO,
        MINIMOCONSUMO,
        MAXIMOCONSUMO,
        MINIMOPRECIO,
        MAXIMOPRECIO,
        id_datoProveedor,
        otroLaboratorio,
        fechaContrato,
        numeroContrato,
        farmacia,
        id_contrato)
        VALUES (null, 
        :designacion, 
        :proveedor,
        :clave_hraei, 
        :descripcion,
        :clave_cuadro_basico, 
        :cucop,
        :unidad_medida,
        :precio_unitario_sin_iva, 
        :hraei_minimo,
        :hraei_maximo,
        :hraei_minimo_costo,
        :hraei_maximo_costo,
        :id_datoProveedor,
        :otroLaboratorio,
        :fechaContrato,
        :numeroContrato,
        :farmacia,
        :id_contrato)");
$statement->execute(array(

    ':designacion' => $designacion,
    ':proveedor' => $proveedor,
    ':clave_hraei' => $clave_hraei,
    ':descripcion' => $descripcion,
    ':clave_cuadro_basico' => $clave_cuadro_basico,
    ':cucop' => $cucop,
    ':unidad_medida' => $unidad_medida,
    ':precio_unitario_sin_iva' => $precio_unitario_sin_iva,
    ':hraei_minimo' => $hraei_minimo,
    ':hraei_maximo' => $hraei_maximo,
    ':hraei_minimo_costo' => $hraei_minimo_costo,
    ':hraei_maximo_costo' => $hraei_maximo_costo,
    ':id_datoProveedor'=>$id_datoProveedor,
    ':otroLaboratorio' => $otroLaboratorio,
    ':fechaContrato' => $year,
    ':numeroContrato' => $numeroContrato,
    ':farmacia' => $tipofarmacia,
    ':id_contrato' => $id_proveedor

));
if ($statement != false) {
    echo "<script>swal({
    title: 'Good',
    timer: 1000,
    showConfirmButton: false
  
    });
    </script>";
} else {
    echo "<script>swal({
    title: 'Error al eliminar',
    timer: 1000,
    showConfirmButton: false
  
    });
    </script>";
}
/*$sql = $conexion2->query("UPDATE listamedicamento 
INNER JOIN proveedores ON listamedicamento.numeroContrato = proveedores.numero_pedido
SET listamedicamento.id_contrato = proveedores.id_proveedor 
WHERE proveedores.numero_pedido = listamedicamento.numeroContrato and listamedicamento.id_contrato is null");*/
