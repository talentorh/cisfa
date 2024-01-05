<!DOCTYPE html>
<html>
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css?n=1">


    <title>Ordenes de suministro</title>

</style>

<body>
     <script>
          $(document).on("blur", "#caducidad", function(){

            let id= $(this).data("id_caducidad");
            let nombre = $(this).text();
            actualizar_datos(id, nombre, "caducidad");
        });
        function actualizar_datos(id, texto, columna){

                $.ajax({
                url: 'consultaActualizaFactura.php',
                method: 'POST',
                data: {id:id, texto:texto, columna:columna},
                succes: function(data){

                }

            })

            }
     </script>         
<?php 

  require'conexion.php';
  $factura = $_POST['clavehraei'];
  $query2="SELECT sum(total) as total2 from facturas where clavehraei = '$factura'";
    $resul = mysqli_query($conexion2, $query2);
    $result2 = mysqli_fetch_assoc($resul);
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
    $query="SELECT *
     from facturas where clavehraei = '$factura' ";
     
    
    
    

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
        <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total facturas<input type="text" value='.formatMoney($result2['total2']).'></label>
       <a href="exportExcelFacturasClave?factura='.$factura.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>Numero factura</td>
                <td>Numero contrato</td>
                <td>Fecha factura</td>
                <td>Nombre proveedor</td>
                <td>CLAVE HRAEI</td>
                <td>Descripcion</td>
                <td>Caducidad</td>
                <td>Cantidad</td>
                <td>Costo unitario</td>
                <td>Total</td>
                
    
             
                
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         
            
            
            $tabla.=
            '
            <tr>
            <td>'.$row['num_factura'].'</td>
            <td>'.$row['numeroContrato'].'</td>
            <td>'.$row['fecha_factura'].'</td>
            <td>'.$row['nombre_laboratorio'].'</td>
            <td>'.$row['clavehraei'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td id="caducidad" name="valor1" data-id_caducidad='.$row['id_factura'].' contenteditable>'.$row['caducidad'].' </td>
            <td>'.$row['cantidad'].'</td>
            <td>'.formatMoney($row['costounitario']).'</td>
            <td>'.formatMoney($row['total']).'</td>
            
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
   </body>
   </html>