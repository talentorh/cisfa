<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php

    error_reporting(0);
    include 'funciones/funcionEliminaRegistr.php';
$clav = base64_decode($_POST['fired_button']);
$sql = delete('listamedicamento','id_medicamento',$clav);        
        
if($sql != false){
echo "<script>swal({
    title: 'Good',
    timer: 1000,
    showConfirmButton: false

    });
    </script>";
}else{
    echo "<script>alert('Error inesperado, intente nuevamente');</script>";
}

echo "<script>setTimeout('window.history.back();',1000);</script>"

?> 
</body>
</html>