<?php session_start();

        if(isset($_SESSION['usuario'])) {
            
            error_reporting(0);

        $clave = base64_decode($_GET['clave']);

        require 'conexion.php';
        $sql = "SELECT id_medicamento, 
        OFICIODEINFORMEDENOTIFICACION, 
        FECHADEOFICIO, 
        GRUPO, 
        FUENTE, 
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
        otroLaboratorio
        from listamedicamento where id_medicamento = $clave";
        $result=mysqli_query($conexion2, $sql);
        $row=mysqli_fetch_assoc($result);

    
        if($row['id_medicamento'] != false){
            require 'frontend/verMedicamento.php';
            
        }else{
            echo "<script>
            alert('Error insesperado intente nuevamente');
            window.history.back();</script>";
         
        }
    }
?>