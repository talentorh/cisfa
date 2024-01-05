<?php session_start();
    $usernameSesion = $_SESSION['usuarioFG'];
                
if(isset($_SESSION['usuarioFG'])) {
 error_reporting(0);

    require '../conexion.php';
    include '../funciones/funcionEliminaRegistr.php';

$clav = $_GET['id_datoProveedor'];
$id = base64_decode($_GET['id_proveedor']);
$name = base64_decode($_GET['nombre']);
delete('datosproveedor','id_datoProveedor',$clav);  
delete('proveedores', 'id_proveedor', $id);  
delete('ordensuministro', 'claveContrato', $id);
delete('objetocontratacion', 'clave_objeto_contratacion', $id);

$sql = "INSERT INTO controldelete(id_usuarioDelete, usuario, detalleDelete) values(null, '$usernameSesion', '$name')";
        $result = mysqli_query($conexion2, $sql);
          /*  $path = "frontend/cartaLaboralPrivado1/".$numAleatorio47;
							if(file_exists($path)){
								$directorio = opendir($path);
								while ($archivo = readdir($directorio))
								{
									if (is_dir($archivo)){
                                        unlink($archivo);
									}
								}
                            }
                            */
                            /*
                            $path2 = "../SysteamHRAEI/frontend/hojaDeServicio1/".$numAleatorio48;
							if(file_exists($path2)){
								$directorio2 = opendir($path2);
								while ($archivo2 = readdir($directorio2))
								{
									if (is_dir($archivo2)){
                                        unlink($archivo2);
									}
								}
							}
            
            
                            $dir = "../SystemHRAEI/frontend/cartaLaboralPrivado1/".$numAleatorio47;     
                            $files = opendir($dir); // Devuelve un vector con todos los archivos y directorios
                            $ficherosEliminados = 0;
                            foreach($files as $f){
                               if (is_file($dir.$f)) {
                                  if (unlink($dir.$file) ){
                                     $ficherosEliminados++;
                                   }
                                }
                            }
                            
            deleteDirectory('hojaDeServicio1');
*/

echo "<script>
alert('Información eliminada');
window.history.back();</script>";
        
}else{
    header('location: ../index.php');
}

?> 