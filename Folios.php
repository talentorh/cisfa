<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>FOLIOS ORDENES SUMINISTRO</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
</head>


<body>
    
<header class="header7">
   
    <strong id="cabecera"  style="margin-right: 36%; color: white;">Hospital Regional de Alta Especialidad de Ixtapaluca</strong>
        <strong id="cabecera2">HRAEI Ixtapaluca</strong>
        <input type="text" name="busqueda" id="busqueda" placeholder="    Search"/>
      
    </header>
<?php 

$ID_usuario = base64_decode($_GET['val']);

require 'conexion.php';

$sql = $conexion2->query("SELECT * FROM numeroorden where referenciaCorta = '$ID_usuario' and activarFolio = 1");
$rows = mysqli_fetch_assoc($sql);

$folio = base64_encode($rows['referenciaCorta']);


    ?>
    <div class="table-responsive"> 
                   <?php
include("menu.php");
echo "<a href='activarFol?val=$folio' class='btn btn-warning' style='width: 150px; float: right; margin-right: 15%; margin-top: 50px; color: blue; '>Activar folio</a>";

  ?>                                                         
                 <table class="table table-bordered table-striped" style="width: 70%; float: left; margin-left: 15%; margin-top: 90px;">
                  
                 <thead> 
                  
                 <tr>
                <!-- definimos cabeceras de la tabla --> 
                 
                 <th style="background-color: #36F7AB; color: white;">Id orden</th>
                 <th style="background-color: #36F7AB; color: white;">Folio</th>
                 <th style="background-color: #36F7AB; color: white;">Referencia</th>
                 <th style="background-color: #36F7AB; color: white;">Estatus</th>
                
                 </tr>
                 </thead>
            <tbody>
        <?php
                if($sql != false){ 
                     while($row=$sql->fetch_assoc()){
                        if($row['estatus'] == 1){
                             $result = "ocupado";
                        }else{
                             $result = "libre";
                        }
                       ?>
                        
                      <?php
                         echo '
                 
                            <tr>
                                <td>'.$row['id_orden'].'</td>
                                <td>'.$row['claveUnicaContrato'].'</td>
                                <td>'.$row['referenciaCorta'].'</td>
                                <td>'.$result.'</td>
                               
                
                            </tr>';
                           }
                        }
                     
                       ?>    
                </tbody>  
            </table>
        </div>
    </div>
</body>
</html>  
 