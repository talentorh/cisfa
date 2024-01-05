<?php   

    $factura = $_POST['factura'];
    $fechaFactura = $_POST['fechaFactura'];
    $clave = $_POST['clave'];
    
    require'conexion.php';
    $sql = $conexion2->query("SELECT DISTINCT DESCRIPCION, CLAVEDECUADROBASICO, UNIDADDEMEDIDA FROM listamedicamento where CLAVEHRAEI ='$clave'");
$result = mysqli_fetch_assoc($sql);

$descripcion = $result['DESCRIPCION'];
$cuadrobasico = $result['CLAVEDECUADROBASICO'];
$unidadmedida = $result['UNIDADDEMEDIDA'];

    $sql = $conexion2->query("INSERT INTO donaciones(id_donacion, clavehraei, cuadrobasico, descripcion, unidadmedida, numerodonacion)
    values(null, '$clave', '$cuadrobasico', '$descripcion', '$unidadmedida', '$factura')");
 
    
    ?>
<!DOCTYPE html>
<html>
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
	<script src="iconos/js/all.min.js"></script>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
	<link rel="stylesheet" href="iconos/css/all.css?n=1">
	<link rel="stylesheet" href="css/style.css?n=1">
	<script src="iconos/js/all.min.js"></script>
    
    <title>Ordenes de suministro</title>

</style>

<body>
<script>
 $(document).on("blur", "#cuadrobasico", function(){

            let id= $(this).data("id_cuadrobasico");
            let nombre = $(this).text();
            actualizar_datos(id, nombre, "cuadrobasico");
        });
    

        $(document).on("blur", "#descripcion", function(){

            let id= $(this).data("id_descripcion");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "descripcion");
        });
        $(document).on("blur", "#unidadmedida", function(){

            let id= $(this).data("id_unidadmedida");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "unidadmedida");
        });
         $(document).on("blur", "#cantidadrecibida", function(){

            let id= $(this).data("id_cantidadrecibida");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "cantidadrecibida");
        });
         $(document).on("blur", "#lote", function(){

            let id= $(this).data("id_lote");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "lote");
        });
         $(document).on("blur", "#caducidad", function(){

            let id= $(this).data("id_caducidad");
            let nombre = $(this).text();

            actualizar_datos(id, nombre, "caducidad");
        });




            function actualizar_datos(id, texto, columna){

                $.ajax({
                url: 'consultaActualizaDonaciones.php',
                method: 'POST',
                data: {id:id, texto:texto, columna:columna},
                succes: function(data){

                }

            })

            }
    </script>
      
<?php 
error_reporting(0);

  
    $tabla="";
    $query="SELECT *
     from donaciones where numerodonacion = '$factura'  limit 1000";
     

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>Clave HRAEI</td>
                <td>Cuadro Basico</td>
                <td>Descripcion</td>
                <td>U.D.M</td>
                <td>Cantidad Recibida</td>
                <td>Lote</td>
                <td>Caducidad</td>
                <td>Folio Donacion</td>
   
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         
            
            
            $tabla.=
            '
            <tr onkeyup="myFunction(this)">
            <td>'.$row['clavehraei'].'</td>
            <td id="cuadrobasico" data-id_cuadrobasico='.$row['id_donacion'].' contenteditable>'.$row['cuadrobasico'].'</td>
            <td id="descripcion" name="valor4" data-id_descripcion='.$row['id_donacion'].' contenteditable>'.$row['descripcion'].'</td>
            <td id="unidadmedida" data-id_unidadmedida='.$row['id_donacion'].' contenteditable>'.$row['unidadmedida'].'</td>
            <td id="cantidadrecibida" data-id_cantidadrecibida='.$row['id_donacion'].' contenteditable>'.$row['cantidadrecibida'].'</td>
            <td id="lote" data-id_lote='.$row['id_donacion'].' contenteditable>'.$row['lote'].' </td>
            <td id="caducidad" data-id_caducidad='.$row['id_donacion'].' contenteditable>'.$row['caducidad'].' </td>
            <td>'.$row['numerodonacion'].'</td>
            
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