<?php session_start();

if (isset($_SESSION['usuario'])) {


    $clave = base64_decode($_GET['Xy']);

    require 'conexion.php';
    $sql = "SELECT proveedores.id_proveedor,
                proveedores.numero_pedido, 
                proveedores.suficiencia_presupuestaria,
                proveedores.requisicion, 
                proveedores.partida_presupuestaria,
                proveedores.fecha_firma,
                proveedores.vigencia_pedido_inicio, 
                proveedores.vigencia_pedido_final,
                proveedores.tipoadjudicacion, proveedores.numero_proveedor, datosproveedor.datoPersonalProveedor, datosproveedor.domicilioPersonal, datosproveedor.rfc, datosproveedor.telefono, datosproveedor.correoElectronico from proveedores inner join datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor where proveedores.id_proveedor = $clave";
    $result = mysqli_query($conexion2, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['id_proveedor'] != false) {
        require 'frontend/editarContrato.php';
    } else {
        echo "<script>
                    alert('Error insesperado intente nuevamente');
                    window.history.back();</script>";
    }
} elseif (isset($_SESSION['usuarioAdmin'])) {


    $clave = base64_decode($_GET['Xy']);

    require 'conexion.php';
    $sql = "SELECT proveedores.id_proveedor,
        proveedores.numero_pedido, 
        proveedores.suficiencia_presupuestaria,
        proveedores.requisicion, 
        proveedores.partida_presupuestaria,
        proveedores.fecha_firma,
        proveedores.vigencia_pedido_inicio, 
        proveedores.vigencia_pedido_final,
        proveedores.tipoadjudicacion, proveedores.numero_proveedor, datosproveedor.datoPersonalProveedor, datosproveedor.domicilioPersonal, datosproveedor.rfc, datosproveedor.telefono, datosproveedor.correoElectronico from proveedores inner join datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor where proveedores.id_proveedor = $clave";
    $result = mysqli_query($conexion2, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['id_proveedor'] != false) {
        require 'frontend/editarContrato.php';
    } else {
        echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
    }
} elseif (isset($_SESSION['usuarioFG'])) {


    $clave = base64_decode($_GET['Xy']);

    require 'conexion.php';
    $sql = "SELECT proveedores.id_proveedor,
        proveedores.numero_pedido, 
        proveedores.suficiencia_presupuestaria,
        proveedores.requisicion, 
        proveedores.partida_presupuestaria,
        proveedores.fecha_firma,
        proveedores.vigencia_pedido_inicio, 
        proveedores.vigencia_pedido_final,
        proveedores.tipoadjudicacion, proveedores.numero_proveedor, datosproveedor.datoPersonalProveedor, datosproveedor.domicilioPersonal, datosproveedor.rfc, datosproveedor.telefono, datosproveedor.correoElectronico from proveedores inner join datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor where proveedores.id_proveedor = $clave";
        $result=mysqli_query($conexion2, $sql);
        $row=mysqli_fetch_assoc($result);

    
        if($row['id_proveedor'] != false){
            require 'frontend/editarContrato.php';
            
        }else{
            echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
         
        }
}
