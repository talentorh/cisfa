<?php session_start();

if (isset($_POST['almacenar'])){
    error_reporting(0);
    $proveedor = $_POST['nombre_proveedor'];
    $domicilio_proveedor = $_POST['domicilio_proveedor'];
    $rfc= $_POST['rfc_proveedor'];
    $telefono_proveedor = $_POST['telefono_proveedor'];
    $direccion_proveedor = $_POST['direccion_internet'];
    $email= $_POST['email_proveedor'];
    $numero_pedido = $_POST['numero_pedido'];
    $suf_presupuestaria = $_POST['suficiencia_presupuestaria'];
    $requisicion= $_POST['requisicion'];
    $partida_presupuestaria = $_POST['partida_presupuestaria'];
    $fecha_firma = $_POST['fecha_firma'];
    $fecha_inicio= $_POST['vigencia_pedido_inicio'];
    $fecha_termino = $_POST['vigencia_pedido_final'];
    $submin = $_POST['sub_min'];
    $submax = $_POST['sub_max'];
    $ivamin = $_POST['iva_min'];
    $ivamax = $_POST['iva_max'];
    $totalmin = $_POST['total_min'];
    $totalmax = $_POST['total_max'];
       
        require "conexion.php";

        $statement = $conexion5->prepare('INSERT INTO proveedores (id_proveedor,
        nombre_proveedor,
        domicilio_proveedor,
        rfc_proveedor,
        telefono_proveedor, 
        direccion_internet, 
        email_proveedor,
        numero_pedido, 
        suficiencia_presupuestaria,
        requisicion, 
        partida_presupuestaria,
        fecha_firma,
        vigencia_pedido_inicio, 
        vigencia_pedido_final,
        sub_minimo,
        sub_maximo,
        iva_minimo,
        iva_maximo,
        total_minimo,
        total_maximo)
        VALUES (null, 
        :nombre_proveedor,
        :domicilio_proveedor,
        :rfc_proveedor,
        :telefono_proveedor, 
        :direccion_internet, 
        :email_proveedor,
        :numero_pedido, 
        :suficiencia_presupuestaria,
        :requisicion, 
        :partida_presupuestaria,
        :fecha_firma,
        :vigencia_pedido_inicio, 
        :vigencia_pedido_final,
        :sub_min,
        :sub_max,
        :iva_min,
        :iva_max,
        :total_min,
        :total_max)');
        $statement->execute(array(
            
            ':nombre_proveedor' => $proveedor,
            ':domicilio_proveedor' => $domicilio_proveedor,
            ':rfc_proveedor' => $rfc,
            ':telefono_proveedor' => $telefono_proveedor,
            ':direccion_internet' => $direccion_proveedor,
            ':email_proveedor' => $email,
            ':numero_pedido' => $numero_pedido,
            ':suficiencia_presupuestaria' => $suf_presupuestaria,
            ':requisicion' => $requisicion,
            ':partida_presupuestaria' => $partida_presupuestaria,
            ':fecha_firma' => $fecha_firma,
            ':vigencia_pedido_inicio' => $fecha_inicio,
            ':vigencia_pedido_final' => $fecha_termino,
            ':sub_min' => $submin,      
            ':sub_max' => $submax,
            ':iva_min' => $ivamin,
            ':iva_max' => $ivamax,
            ':total_min' => $totalmin,
            ':total_max' => $totalmax
        
          
        ));
       if($statement != false) {
    
       echo "<script>alert('Informacion guardada exitosamente');</script>";
       }else{
           echo "<script>alert('Error inesperado, intente nuevamente');</script>";
       }
}
    echo "<script languaje='javascript' type='text/javascript'>window.history.back();</script>";

?>