<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
	<link rel="stylesheet" href="iconos/css/all.css?n=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <title>Medicamento por contrato</title>
    
</head>
<body>
<script>
$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
</script>
<style>
     #ghatable{
     width: 99%;
     padding: 20px;
     margin-left: 12px;
     font-size: 13px;
     cursor: pointer;
     }
 </style>
<header>
  
    <strong id="cabecera"  style="margin-right: 36%; color: white;">Hospital Regional de Alta Especialidad de Ixtapaluca</strong>
        
    
    </header>
     
                  
<div class="contrato-nuevo">
        
        
        <script>
            function myFunction(o) {
          
            let _tr = $(o);
            let _1 = _tr.find("td").eq(8).html();
            let _2 = _tr.find("td").eq(9).html();
            let _3 = _tr.find("td").eq(10).html();
            let _11=parseFloat(_1);
            let _22=parseFloat(_2);
            let _33=parseFloat(_3);
            let total= _11 * _22 ;
            let total2= _11 * _33 ;
            console.log(total);
            console.log(total2);
            let _total = _tr.find("td").eq(11);
            let _total2 = _tr.find("td").eq(12);

            if( isNaN(total) || isNaN(total2) ){
                _total.html(0) ;
                _total2.html(0) ;
            }else{
                _total.html(total) ;
                _total2.html(total2) ;
            }
    
        }
       </script>
       <script>
    
        $(document).on("blur", "#consumomin", function(){

              let id= $(this).data("id_consumomin");
              let nombre = $(this).text();
             actualizar_datos(id, nombre, "MINIMOCONSUMO");
        });

        $(document).on("blur", "#consumomax", function(){

            let id= $(this).data("id_consumomax");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "MAXIMOCONSUMO");
        });


        $(document).on("blur", "#minimo", function(){

            let id= $(this).data("id_minimo");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "MINIMOPRECIO");
        });
        
        $(document).on("blur", "#maximo", function(){

            let id= $(this).data("id_maximo");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "MAXIMOPRECIO");
        });
        $(document).on("blur", "#precio", function(){

            let id= $(this).data("id_precio");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "PRECIOUNITARIO");
        });

            function actualizar_datos(id, texto, columna){
         
             
                $.ajax({
                url: 'actualizaContrato.php',
                method: 'POST',
                data: {id:id, texto:texto, columna:columna},
                succes: function(data){

                }

            })

            }         
    </script>
 
    <?php
    $clave = base64_decode($_GET['Xy']);
    $clave2 = base64_encode($clave);
    ?>

    
    <a href="principal"><i class="fas fa-list-ol" style="margin-top: 65px; float: left;  margin-left: 5%; font-size: 25px;"></a></i>
    <a href="exportExcelMedic?clave=<?php echo $clave2; ?>" ><i class="fas fa-cloud-download-alt" style="font-size: 25px; float: left; margin-left: 30px; margin-top: 65px;"></a></i></strong>
        <table id="ghatable" class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
		<tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic;">
		
            <td>Proveedor</td>
			<td>Clave HRAEI</td>
			<td>Descripción</td>
			<td>Consumo real</td>
			<td>Diferiencias</td>
			<td>CNIS</td>
			<td>CUCOP</td>
			<td>UDM</td>
			<td>P.U</td>
            <td>Minimo consumo</td>
            <td>Maximo consumo</td>
            <td>Minimo precio</td>
            <td>Maximo precio</td>
            
			
        </tr>
        <style>
            .titulo {
            
            font-size:13px;
            color : red;
            text-align : center;
        }
        .titulo2 {
            
            font-size:13px;
            color : red;
            text-align : center;
        }
        </style>
<?php

function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
    if (is_numeric($number)) { // a number
      if (!$number) { // zero
        $money = ($cents == 2 ? '0.00' : '0'); // output zero
      } else { // value
        if (floor($number) == $number) { // whole number
          $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
        } else { // cents
          $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
        } // integer or decimal
      } // value
      return '$'.$money;
    } // numeric
  } // formatMoney
$tabla="";
$clave = base64_decode($_GET['Xy']);
$clave2 = base64_encode($clave);
require 'conexion.php';
$sql= $conexion2->query("SELECT * from listamedicamento where numeroContrato = '$clave'");

while($result= $sql->fetch_assoc())

	{
	
       
	$max = formatMoney($result['MAXIMOPRECIO']);
	$min = formatMoney($result['MINIMOPRECIO']);
	$contrato = $result['claveUnicaOrden'];
	$cantidad = $result['cantidad'];
	$cantidad2 = $result['cantidad'];
	$maximoConsumo = $result['MAXIMOCONSUMO'];
    $porCubrir = $cantidad - $maximoConsumo;
    $porCubrir2 = $cantidad - $maximoConsumo;
	
	if($cantidad > $maximoConsumo){
	    $totalMax = "<span class='titulo'> $cantidad2";
	}else{
	    $totalMax = $result['cantidad'];
	}
	if($porCubrir >= 0){
	    $faltante = "<span class='titulo2'> $porCubrir2";
	}else{
	    $faltante = $porCubrir;
	}
	
	echo
        '<tr onkeyup="myFunction(this)">
            <td>'.$result['PROVEEDOR'].'</td>
			 <td id="clave" data-id_clave='.$result['CLAVEHRAEI'].' contenteditable>'.$result['CLAVEHRAEI'].' </td>
			<td>'.$result['DESCRIPCION'].'</td>
			<td>'.$totalMax.'</td>
			<td>'.$faltante.'</td>
			<td>'.$result['CLAVEDECUADROBASICO'].'</td>
            <td>'.$result['CUCOP'].'</td>
            <td>'.$result['UNIDADDEMEDIDA'].'</td>
            <td id="precio" data-id_precio='.$result['id_medicamento'].' contenteditable>'.$result['PRECIOUNITARIO'].' </td>
            <td id="consumomin" data-id_consumomin='.$result['id_medicamento'].' contenteditable>'.$result['MINIMOCONSUMO'].' </td>
            <td id="consumomax" data-id_consumomax='.$result['id_medicamento'].' contenteditable>'.$result['MAXIMOCONSUMO'].' </td>
            <td id="minimo"  data-id_minimo='.$result['id_medicamento'].' contenteditable>'.$min.' </td>
            <td id="maximo"  data-id_maximo='.$result['id_medicamento'].' contenteditable>'.$max.' </td>
            
            
			
			
         </tr>';
		
        }

   
	$conexion2->close();

?>
<input type="text" id="contrato" value="<?php echo $contrato; ?>" style="margin-left: 45%;">
 <script src="frontend/js/script.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>

