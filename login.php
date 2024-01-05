<?php session_start();

if(isset($_SESSION['usuario'])) {
    header('location: index');
}
if(isset($_SESSION['usuarioAdmin'])) {
    header('location: index');
}
if(isset($_SESSION['usuarioFG'])) {
    header('location: indexFG');
}
if(isset($_SESSION['externo'])) {
    header('location: index2');
}
if(isset($_SESSION['rh'])) {
    header('location: indexRh');
}
if(isset($_SESSION['controlados'])) {
    header('location: indexControlados');
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $correo = $_POST['usuario'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);
    
    
  include("conexion.php");

    
    $statement = $conexion->prepare('SELECT correo_electronico, clave_acceso, rol_acceso FROM login WHERE correo_electronico= :usuario AND clave_acceso = :password and rol_acceso = 1'
    );
   
    $statement->execute(array(
        
        ':usuario' => $correo,
        ':password' => $password
    ));
   
    $resultado = $statement->fetch();
    if ($resultado != false){
        $_SESSION['usuario'] = $correo ;
        header('location: principal');
    
   
    }else{
    $statement2 = $conexion->prepare('SELECT correo_electronico, clave_acceso, rol_acceso FROM login WHERE correo_electronico= :usuario AND clave_acceso = :password and rol_acceso = 3');
    $statement2->execute(array(
        
        ':usuario' => $correo,
        ':password' => $password
    ));
   
    $resultado2 = $statement2->fetch();
    
        if ($resultado2 != false){
        $_SESSION['externo'] = $correo ;
        
        header('location: vista-user');
    
    
    }else{
        $statement3 = $conexion->prepare('SELECT correo_electronico, clave_acceso, rol_acceso from login where correo_electronico = :usuario  AND clave_acceso = :password and rol_acceso = 2');
        $statement3->execute(array(
            
            ':usuario' => $correo,
            ':password' => $password
        ));
       
        $resultado3 = $statement3->fetch();
        
            if ($resultado3 != false){
            $_SESSION['rh'] = $correo;
        header('location: moduloRh');
    }else{
         $statement4 = $conexion->prepare('SELECT correo_electronico, clave_acceso, rol_acceso from login where correo_electronico = :usuario  AND clave_acceso = :password and rol_acceso = 4');
        $statement4->execute(array(
            
            ':usuario' => $correo,
            ':password' => $password
        ));
       
        $resultado4 = $statement4->fetch();
        
            if ($resultado4 != false){
            $_SESSION['controlados'] = $correo;
        header('location: controlados');
            
    }else{
         $statement4 = $conexion->prepare('SELECT correo_electronico, clave_acceso, rol_acceso from login where correo_electronico = :usuario  AND clave_acceso = :password and rol_acceso = 6');
        $statement4->execute(array(
            
            ':usuario' => $correo,
            ':password' => $password
        ));
       
        $resultado4 = $statement4->fetch();
        
            if ($resultado4 != false){
            $_SESSION['usuarioFG'] = $correo;
        header('location: principalFG');
            
    
    }else{
         $statement4 = $conexion->prepare('SELECT correo_electronico, clave_acceso, rol_acceso from login where correo_electronico = :usuario  AND clave_acceso = :password and rol_acceso = 5');
        $statement4->execute(array(
            
            ':usuario' => $correo,
            ':password' => $password
        ));
       
        $resultado4 = $statement4->fetch();
        
            if ($resultado4 != false){
            $_SESSION['usuarioAdmin'] = $correo;
        header('location: principal');
            
    }else{
        
    
    }
    
        echo "<script>alert('Error de usuario o contraseña');</script>";
                
             }
    
            }
        }
    }
}
}
require 'frontend/login-vista.html';

?>