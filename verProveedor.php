<?php session_start();

        if(isset($_SESSION['usuario'])) {
            
            error_reporting(0);

        $clave = base64_decode($_GET['clave']);

        require 'conexion.php';
        $sql = "SELECT id_datoProveedor,
        numeroProveedor, 
        datoPersonalProveedor, 
        domicilioPersonal, 
        telefono, 
        correoElectronico, 
        rfc,
        numeroDeProcedimiento,
        direccionInternet from datosproveedor where id_datoProveedor = $clave";
        $result=mysqli_query($conexion2, $sql);
        $row=mysqli_fetch_assoc($result);

    
        if($row['id_datoProveedor'] != false){
            require 'frontend/verProveedor.php';
            
        }else{
            echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
         
        }
    }elseif(isset($_SESSION['usuarioAdmin'])) {
            
            error_reporting(0);

        $clave = base64_decode($_GET['clave']);

        require 'conexion.php';
        $sql = "SELECT id_datoProveedor,
        numeroProveedor, 
        datoPersonalProveedor, 
        domicilioPersonal, 
        telefono, 
        correoElectronico, 
        rfc,
        numeroDeProcedimiento,
        direccionInternet from datosproveedor where id_datoProveedor = $clave";
        $result=mysqli_query($conexion2, $sql);
        $row=mysqli_fetch_assoc($result);

    
        if($row['id_datoProveedor'] != false){
            require 'frontend/verProveedor.php';
            
        }else{
            echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
         
        }
    }
?>