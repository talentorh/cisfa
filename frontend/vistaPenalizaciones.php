<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="icono/icono.ico" rel="shortcut icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Detalle penalizaciones</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="consultaSuministro.js"></script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <link rel="stylesheet" href="../css/style.css?n=1">
    <script src="iconos/js/all.min.js"></script>
 
</head>
<body>

    <header> 
    <strong id="cabecera"  style="margin-right: 36%; color: white;">Hospital Regional de Alta Especialidad de Ixtapaluca</strong>
        <strong id="cabecera2">HRAEI Ixtapaluca</strong>
      
    </header>

<div class="table-responsive"> 
  
<a href="suministros" class="btn btn-warning" onclick="window.history.back();"style=" width: 150px; float: left; margin-left: 15%; margin-top: 60px; color: white;">Finalizar</a>
                                        
                 <table class="table table-bordered table-striped" style="width: 70%; float: left; margin-left: 15%; margin-top: 10px;">
                  
                 <thead> 
                  
                 <tr>
                               <!-- definimos cabeceras de la tabla --> 
                 
                 <th>N° oficio penalizacion</th>
                 <th>Numero orden suministro</th>
                 <th>Fecha de creación orden de suminstro</th>
                 <th>Fecha de creacion oficio penalizacion</th> 
                 <th>Monto de penalizacion</th>
                 <th>Ver oficio</th>
                 
                 
                 
                 </tr>
                  
                 </thead>
                  
                  
                 <tbody>
                <script>
                    /*
                    function myFunction(o) {
          
          var _tr = $(o);
          var _1 = _tr.find("td").eq(4).html();
          var _2 = _tr.find("td").eq(6).html();
          var _11=parseFloat(_1);
          var _22=parseFloat(_2);
          var total= (_11 * _22) / 10;
          console.log(total);
          var _total = _tr.find("td").eq(7);

          if( isNaN(total) ){
              _total.html(0) ;
          }else{
              _total.html(total.toFixed(3) / 10) ;
          }
  
      }
*/
                    $(document).on("blur", "#fechaEntrego", function(){

                        var id= $(this).data("id_entrega");
                        var nombre = $(this).text();
                        //alert(id);
                        actualizar_datos(id, nombre, "fechaEntrego");
                    });
                   
                </script>
                <script>

                    function actualizar_datos(id, texto, columna){

                        $.ajax({
                        url: 'modelo/modelo_actualiza_ordenes.php',
                        method: 'POST',
                        data: {id:id, texto:texto, columna:columna},
                        succes: function(data){

                        }

                    })

                    }

                </script>
                 
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
error_reporting(0);
//valor=CISFA/HRAEI/0111/2020&valor2=LA-006001003-E4-2020&var=34&fecha=2020-12-14%2010:55:56&claveEntrega=LA-006001003-E4-2020&fechaLimite=16-12-2020
                 $var = base64_decode($_GET['var']);
                 $nombre = $_GET['nombre'];
                 $valor2 = base64_decode($_GET['valor2']);
                 $var3 = base64_encode($var);
                 $var2 = 0;
                 
                 require 'conexion.php';
                     $sql = "SELECT DISTINCT oficiospenalizcion.numOficioPenalizacion, oficiospenalizcion.claveContrato, oficiospenalizcion.fechaRegistroPenalizacion, oficiospenalizcion.montoIncumplimiento, numeroorden.fechaRegistro, numeroorden.claveUnicaContrato from oficiospenalizcion inner join numeroorden on numeroorden.claveUnicaContrato = '$valor2' where claveContrato= '$valor2'";
                     $result=mysqli_query($conexion2, $sql);
                     
                           while($row=$result->fetch_assoc())
                       
                        {
                            $claveContrato = base64_encode($row['claveContrato']);
                            $claveUnicaContrato = base64_encode($row['claveUnicaContrato']);
                            $numOficioPenalizacion = base64_encode($row['numOficioPenalizacion']);
                        
                         echo '
                 
                 <tr onclick="myFunction(this)">
                    <td>'.$row['numOficioPenalizacion'].'</td>
                    <td>'.$row['claveContrato'].'</td>
                    <td>'.$row['fechaRegistro'].'</td>
                    <td>'.$row['fechaRegistroPenalizacion'].'</td>
                    <td>'.formatMoney($row['montoIncumplimiento']).'</td>
                <td><a href="verOficioPenalizacion?claveContrato='.$claveContrato.'&numOficio='.$numOficioPenalizacion.'&var='.$var3.' target="_blank"><i id="pdf" class="fas fa-file-pdf"  style="width: 50px; height: 20px; font-size: 22px; text-align: center;"></a></i></td>
                 </tr>';
               
                        }
                      
                        ?>
                        
                </tbody>
                
            </table>
            
        </div>
        <a href="oficiosPenalizacion/index" class="btn btn-warning" style=" width: 300px; float: right; margin-right: 470px; color: white; margin-top: 30px;">Cargar y ver hojas de penalización</a> 
    </div>
    <script>
    $("button").click(function () {
                var fired_button = $(this).val();

                    window.location.href = "registrarEntrega?claveEntrega="+ fired_button;
                
            });
    </script>