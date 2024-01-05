<?php session_start();
include 'funciones/funcionEliminaRegistr.php';
    if(isset($_SESSION['usuario'])) {
        
    error_reporting(0);
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

echo "<script>setTimeout('window.history.back();',1000);</script>";
        
    }elseif(isset($_SESSION['usuarioFG'])){
        error_reporting(0);
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

echo "<script>setTimeout('window.history.back();',1000);</script>";
    }else{
        header('location: login.php');
    }

?>