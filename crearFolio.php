<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
<header class="header8">
        
    <strong id="cabecera"  style="margin-right: 36%; color: white;">Hospital Regional de Alta Especialidad de Ixtapaluca</strong>
        <strong id="cabecera2">HRAEI Ixtapaluca</strong>
        <input type="text" name="busqueda" id="busqueda" placeholder="    Search"/>
      
    </header>
    <div class="imagenCisfa" style="margin-top: 30px; border-radius: 10px; height: 120px;"></div>
<?php

$ID_usuario = base64_decode($_GET['val']);


    ?>
    
<strong style="color: black;">SELECCIONA</strong>

<select class="form-control" id="folio" name="ejeUno" style="margin-top: 150px; width: 50%; margin-left: auto; margin-right: auto;" onchange="select_folio(this.value);" style="height: 35px;">
            <option>-Selecciona el folio a activar-</option>
            <?php
            require('conexion.php');
           
        $sql_s = $conexion2->query ("SELECT claveUnicaContrato, referenciaCorta FROM numeroorden where referenciaCorta = '$ID_usuario' AND activarFolio = 0");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['claveUnicaContrato'];
  $nombre = $row_s['claveUnicaContrato'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

                </select><br><br>
<script>
function select_folio()
{ //id="select_usuario"
  
 var val =  $("#folio").val();
 var encodedString = btoa(val);

    window.location.href = "activarFolio?val="+encodedString;
}

     </script> 
 
</body>
