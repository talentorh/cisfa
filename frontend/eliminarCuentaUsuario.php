<?php session_start();

if(isset($_SESSION['usuario'])) {
    error_reporting(0);
    include '../funciones/funcionEliminaRegistr.php';
//mysql_connect("localhost","root","serverlocal");

//selección de la base de datos con la que vamos a trabajar 
//mysql_select_db("farmacia");

//Creamos la sentencia SQL y la ejecutamos
//$sSQL="Delete From medicamento Where clave='{$_GET["clave"]}'";
//mysql_query($sSQL);
$clav = $_GET['id_trabajador'];
delete('login','id_trabajador',$clav);  
   
          
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