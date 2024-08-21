<?php session_start();

    if(isset($_SESSION['usuario'])){
       $usernameSesion = $_SESSION['usuario'];
            require 'conexion.php';
			$statement = $conexion->prepare("SELECT correo_electronico, nombre_trabajador, rol_acceso FROM login WHERE correo_electronico= :correo_electronico AND rol_acceso = 1");
                 $statement->execute(array(
                        ':correo_electronico' => $usernameSesion
                    ));
                    $rw = $statement->fetch();
                    if($rw != false){
                         $_SESSION['usuario'] = $usernameSesion;
                            require 'frontend/principal.php';
                    }else{
                        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
                         require 'close_sesion.php';
                    }
    }else if(isset($_SESSION['usuarioAdmin'])){
         $usernameSesion = $_SESSION['usuarioAdmin'];
         require 'conexion.php';
			$statement = $conexion->prepare("SELECT correo_electronico, nombre_trabajador, rol_acceso FROM login WHERE correo_electronico= :correo_electronico AND rol_acceso = 5");
                 $statement->execute(array(
                        ':correo_electronico' => $usernameSesion
                    ));
                    $rw = $statement->fetch();
                    if($rw != false){
                         $_SESSION['usuarioAdmin'] = $usernameSesion;
                            require 'frontend/principalAdmin.php';
                    }else{
                        echo "<script>alert('No tienes acceso a este apartado');
                        </script>;";
                         require 'close_sesion.php';
                    }
    }else{
        header ('location: index');
    }
        
?>