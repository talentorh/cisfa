<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>

<?php session_start();
if(isset($_POST['almacenarProveedor'])){

   //error_reporting(0);
    
    $nombre_proveedor = $_POST['datoPersonalProveedor'];
    $domicilio= $_POST['domicilioPersonal'];
    $telefono_proveedor = $_POST['telefono'];
    $direccion_proveedor = $_POST['correoElectronico'];
    $numero_pedido = $_POST['numeroDeProcedimiento'];
    $rfc = $_POST['rfc'];
    $direccionInternet = $_POST['direccionInternet'];
    
        require "conexion.php";
        $statement = $conexion->prepare('INSERT INTO datosproveedor (id_datoProveedor,
        datoPersonalProveedor,
        domicilioPersonal,
        telefono, 
        correoElectronico, 
        numeroDeProcedimiento,
        rfc,
        direccionInternet)
        VALUES (null, 
        :datoPersonalProveedor,
        :domicilioPersonal,
        :telefono, 
        :correoElectronico, 
        :numeroDeProcedimiento,
        :rfc,
        :direccionInternet)');
        $statement->execute(array(
            
            ':datoPersonalProveedor' => $nombre_proveedor,
            ':domicilioPersonal' => $domicilio,
            ':telefono' => $telefono_proveedor,
            ':correoElectronico' => $direccion_proveedor,
            ':numeroDeProcedimiento' => $numero_pedido,
            ':rfc' => $rfc,
            ':direccionInternet' => $direccionInternet
        
        
        ));
        
    if($statement != false) {
    
        echo "<script>alert('Proveedor cargado correctamente.');window.history.back();</script>";
    }else{
        echo "<script>alert('Error inesperado, intente nuevamente');</script>";
    }
}

?>
    
    </body>
</html>