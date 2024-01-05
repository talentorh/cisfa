<?php   
    $proveedor = $_POST['proveedor'];
    $factura = $_POST['factura'];
    $fechaFactura = $_POST['fechaFactura'];
    $clave = $_POST['clave'];
    $contrato = $_POST['contrato'];
    
    require'conexion.php';
    $sql = $conexion2->query("SELECT DISTINCT DESCRIPCION FROM listamedicamento where CLAVEHRAEI ='$clave' and fechaContrato = 2022");
$result = mysqli_fetch_assoc($sql);

$descripcion = $result['DESCRIPCION'];

    $sql = $conexion2->query("INSERT INTO facturas(id_factura, num_factura, fecha_factura, nombre_laboratorio, clavehraei,descripcion,numeroContrato)
    values(null, '$factura', '$fechaFactura', '$proveedor','$clave','$descripcion','$contrato')");
    

    
    ?>
<!DOCTYPE html>
<html>
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css?n=1">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Ordenes de suministro</title>

</style>

<body>
<script>
 $(document).on("blur", "#cantidad", function(){

            let id= $(this).data("id_cantidad");
            let nombre = $(this).text();
            actualizar_datos(id, nombre, "cantidad");
        });
 $(document).on("blur", "#caducidad", function(){

            let id= $(this).data("id_caducidad");
            let nombre = $(this).text();
            actualizar_datos(id, nombre, "caducidad");
        });
    

        $(document).on("blur", "#costounitario", function(){

            let id= $(this).data("id_costounitario");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "costounitario");
        });
        $(document).on("blur", "#total", function(){

            let id= $(this).data("id_total");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "total");
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
       <script>
            function myFunction(o) {
          
            let _tr = $(o);
            let _1 = _tr.find("td").eq(7).html();
            let _2 = _tr.find("td").eq(8).html();
            let _11=parseFloat(_1);
            let _22=parseFloat(_2);
            let total= _11 * _22 ;
            console.log(total);
            let _total = _tr.find("td").eq(9);

            if( isNaN(total) ){
                _total.html(0) ;
            }else{
                _total.html(total) ;
            }
    
        }
    </script>
<?php 
error_reporting(0);

  
    $tabla="";
    $query="SELECT *
     from facturas where num_factura = '$factura'";
     

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
        <table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"   >
       
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
            <tr onkeyup="myFunction(this)">
            <td>'.$row['num_factura'].'</td>
            <td>'.$row['numeroContrato'].'</td>
            <td>'.$row['fecha_factura'].'</td>
            <td>'.$row['nombre_laboratorio'].'</td>
            <td>'.$row['clavehraei'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td id="caducidad" name="valor1" data-id_caducidad='.$row['id_factura'].' contenteditable> </td>
            <td id="cantidad" name="valor1" data-id_cantidad='.$row['id_factura'].' contenteditable> </td>
            <td id="costounitario" name="valor1" data-id_costounitario='.$row['id_factura'].' contenteditable> </td>
            <td id="total" name="valor1" data-id_total='.$row['id_factura'].' contenteditable> </td>
            
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    mysqli_close($conexion2);
    ?>
       
    </main>
</body>
</html>