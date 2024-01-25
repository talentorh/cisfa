<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">

  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/style.css?n=1">
  <script src="iconos/js/all.min.js"></script>
  <title>Orden de suministro</title>

</head>

<body>
  <?php
  $claveUnica3 = base64_decode($_GET['Wz']);
  $id_unico3 = base64_decode($_GET['id_proveedor']);
  $contrato = base64_decode($_GET['tr']);
  $claveUnica = base64_encode($claveUnica3);
  $id_unico = base64_encode($id_unico3);

  //$claveUnica2=base64_decode($claveUnica);
  // $id_unico2=base64_decode($id_unico);

  ?>


  <div class="contrato-nuevo">
    <script>
      function cambiar_estado() {

        //Añadimos la imagen de carga en el contenedor
        $('#tabla_resultados').html('<div id="tabla_resultados" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/>Un momento, generando orden...</div>');


        return false;
      };
    </script>
    <div class="imagen1"></div>





    <div class="signup-form-container" style="margin-top: 0px; width: 99%; height: auto; background: none; margin-left: auto; margin-right: auto; padding: .10%;">

      <center>
        <input type="hidden" id="claveContrato" value="<?php echo $id_unico3; ?>">
        <input type="hidden" id="claveUnicaContrato" value="<?php echo $claveUnica3; ?>" requerided="requireded" style="width: 200px; border: none; height: 35px; color: black; border-radius: 10px;">
        <input type="hidden" id="contrato" value="<?php echo $contrato; ?>" requerided="requireded" style="width: 200px; border: none; height: 35px; color: black; border-radius: 10px;"><br>
      </center>

    </div>

    <input list="medicamentoEnContrato" class="form-control" id="select_suministro" style="width: 550px; height: 40px; margin-left: auto; margin-right: auto;" onchange="select_orden();" placeholder="Clave o Nombre del Medicamento">

    <datalist id="medicamentoEnContrato">
      <?php
      require 'conexion.php';
      $sql_s = $conexion2->query("SELECT id_medicamento, OFICIODEINFORMEDENOTIFICACION, FECHADEOFICIO, GRUPO, FUENTE, DEASIGNACION, PROVEEDOR, CLAVEHRAEI, LEFT(DESCRIPCION, 200) AS DESCRIPCION, CLAVEDECUADROBASICO, CUCOP, UNIDADDEMEDIDA, PRECIOUNITARIO, MINIMOCONSUMO, MAXIMOCONSUMO, MINIMOPRECIO, MAXIMOPRECIO, otroLaboratorio FROM listamedicamento where id_contrato = $id_unico3 ORDER BY CLAVEHRAEI ASC");
      while ($row_s = mysqli_fetch_array($sql_s)) {
        $ID_usuario = $row_s['id_medicamento'];
        $nombre = $row_s['CLAVEHRAEI'];
        $descripcion = $row_s['DESCRIPCION'];

        $nombrecompleto = $nombre . ' ' . $descripcion;
      ?>
        <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombrecompleto; ?></option>

      <?php
      }


      ?>

    </datalist><br>
    <script>
      // var fired_button2= $("#claveUnicaContrato").val();  
      //var fired_button2=document.getElementById('claveUnicaContrato').value;
      $('#select_suministro').change(function() {

        let fired_button = $(this).val();
        let fired_button2 = $("#claveUnicaContrato").val();
        let fired_button3 = $("#claveContrato").val();

        window.location.href = 'modelo_add_order_suministro?valor=' + fired_button + '&valor2=' + fired_button2 + '&valor3=' + fired_button3;

      });

      function select_orden() {

        let fired_button = $(this).val();
        let fired_button2 = $("#claveUnicaContrato").val();
        let fired_button3 = $("#claveContrato").val();

        window.location.href = 'modelo_add_order_suministro?valor=' + fired_button + '&valor2=' + fired_button2 + '&valor3=' + fired_button3;
      }

      $('#select_suministro2').change(function() {

        let fired_button = $(this).val();
        let fired_button2 = $("#claveUnicaContrato").val();
        let fired_button3 = $("#claveContrato").val();
        window.location.href = 'modelo_add_order_suministro?valor=' + fired_button + '&valor2=' + fired_button2 + '&valor3=' + fired_button3;

      });
    </script>


    <script>
      function myFunction(o) {

        let _tr = $(o);
        let _1 = _tr.find("td").eq(10).html();
        let _2 = _tr.find("td").eq(11).html();
        let _11 = parseFloat(_1);
        let _22 = parseFloat(_2);
        let total = _11 * _22;
        let _total = _tr.find("td").eq(12);

        if (isNaN(total)) {
          _total.html(0);
        } else {
          _total.html(total);
        }

      }
    </script>
    <script>
      $(document).on("blur", "#partidaPresupuestal", function() {

        let id = $(this).data("id_usuario");
        let nombre = $(this).text();

        actualizar_datos(id, nombre, "partidaPresupuestal");
      });

      $(document).on("blur", "#claveHraei", function() {

        let id = $(this).data("id_usuario");
        let nombre = $(this).text();

        actualizar_datos(id, nombre, "partidaPresupuestal");
      });


      $(document).on("blur", "#cantidadOrden", function() {

        let id = $(this).data("id_orden");
        let nombre = $(this).text();

        actualizar_datos(id, nombre, "cantidad");
      });
      $(document).on("blur", "#cantidad", function() {

        let id = $(this).data("id_cantidad");
        let nombre = $(this).text();
        let fired = $("#claveUnicaContrato").val();
        let fired2 = $("#claveContrato").val();
        let fired3 = $("#contrato").val();
        actualizar_consumo(id, nombre, fired, fired2, fired3, "consumoMedicamento");
      });


      $(document).on("blur", "#totalOrden", function() {

        let id = $(this).data("id_total");
        let nombre = $(this).text();

        actualizar_datos(id, nombre, "importe");
      });
    </script>
    <script>
      function actualizar_datos(id, texto, columna) {

        $.ajax({
          url: 'modelo/modelo_actualizar_orden.php',
          method: 'POST',
          data: {
            id: id,
            texto: texto,
            columna: columna
          },
          succes: function(data) {

          }

        })

      }

      function actualizar_consumo(id, texto, fired, fired2, fired3, columna) {

        $.ajax({
          url: 'modelo/modelo_actualizar_consumo_real.php',
          method: 'POST',
          data: {
            id: id,
            texto: texto,
            fired: fired,
            fired2: fired2,
            fired3: fired3,
            columna: columna
          },
          succes: function(data) {

          }

        })

      }
    </script>


    <div class="table-responsive">
      <div id="tabla_resultados"></div>

      <table class="table table-bordered table-striped" style="width: 95%; float: left; margin-left: 50px; margin-top: 0px;">

        <thead>
          <style>
            td {
              font-size: 12px;
            }

            th {
              font-size: 12px;
            }
          </style>
          <tr>
            <!-- definimos cabeceras de la tabla -->

            <th>Partida presupuestal</th>
            <th>Clave HRAEI</th>
            <th>Cuadro basico</th>
            <th>CUCOP</th>
            <th>Descripcion del bien</th>
            <th>Unidad de medida</th>
            <th>Minimo</th>
            <th>Maximo</th>
            <th>Consumido</th>
            <th>Cantidad a solicitar</th>
            <th>Calcular monto</th>
            <th>Precio unitario</th>
            <th>Importe</th>
            <th>Eliminar</th>

          </tr>

        </thead>


        <tbody>

          <?php
          $var = 0;
          $var2 = 0;
          function formatMoney($number, $cents = 1)
          { // cents: 0=never, 1=if needed, 2=always
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
              return '$' . $money;
            } // numeric
          } // formatMoney
          require 'conexion.php';

          $sql = $conexion2->query("SELECT * from ordensuministro where claveUnicaOrden='$claveUnica3' group by claveHraei");


          while ($row = $sql->fetch_assoc()) {
            $partida = '25301';
            $consumo = $row['consumoReal'];
            echo '

<tr onkeyup="myFunction(this)">
<td>' . $partida . '</td>
<td>' . $row['claveHraei'] . '</td>
<td>' . $row['cuadroBasico'] . '</td>
<td>' . $row['cucop'] . '</td>
<td>' . $row['descripcionDelBien'] . '</td>
<td>' . $row['unidadMedida'] . '</td>
<td>' . $row['minimo'] . '</td>
<td>' . $row['maximo'] . '</td>
<td>' . $consumo . '</td>
<td id="cantidad" name="valor1" data-id_cantidad=' . $row['claveHraei'] . ' contenteditable> </td>
<td id="cantidadOrden" name="valor1" data-id_orden=' . $row['id_ordenSuministro'] . ' contenteditable>' . $row['cantidad'] . '</td>
<td id="" name="valor2"> ' . $row['precioUnitario'] . '</td>
<td class="total" name="total" id="totalOrden"  data-id_total=' . $row['id_ordenSuministro'] . ' contenteditable>' . $row['importe'] . '</td>
<td class="col-lg-1" style=""> 
     		 <a href="eliminaRegistr?id_ordenSuministro=' . $row['id_ordenSuministro'] . '&claveMedicamento=' . $row['claveHraei'] . '&id_proveedor=' . $id_unico . '&contrato=' . $contrato . '&claveUnica=' . $claveUnica . '&cantidad=' . $row['cantidad'] . '" class="btn-danger" style="width: 80px; height: 25px; margin-top: 1%; border-radius: 4px; outline:none;" >Eliminar</button>
</td>
</tr>';
            $clave2 = $row['claveUnicaOrden'];
            $var += $row['importe'];
          }
          $var2 = base64_encode($var);



          ?>
          <script type="text/javascript">
            $("button").click(function() {
              let fired_button = $(this).val();

              let mensaje = confirm("el registro se eliminara")

              if (mensaje == true) {
                window.location.href = "frontend/eliminaRegistr.php?cucop=" + fired_button;
              } else {
                swal({
                  title: '¡CANCELADO!',
                  text: '',
                  type: 'error',
                  timer: 1000,
                  showConfirmButton: false
                });


              }
            });
          </script>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>SUBTOTAL</td>
          <td><input type="text" value="<?php echo formatMoney($var); ?>" readonly="readonly"></td>
          <td></td>
          <tr></tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>IVA</td>
          <td></td>
          <td></td>
          <tr></tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>TOTAL</td>
          <td><input type="text" value="<?php echo formatMoney($var); ?>" onclick="actualiza();"></td>
          <td></td>



        </tbody>

      </table>
    </div>
  </div>
  
  <?php

  echo '<a href="Orden?var=' . $id_unico . '&valor2=' . $claveUnica . '&total=' . $var2 . '&id_unico=' . $id_unico . '&claveContrato=' . $claveUnica . '&birmex=' . $claveUnica . '" class="btn btn-success" style=" width: 150px; float: right; margin-right: 2.5%; margin-top: 0px;" onclick="cambiar_estado(this);" id="seagregabirmex">GENERAR ORDEN</a>';
  echo '<a href="Orden?var=' . $id_unico . '&valor2=' . $claveUnica . '&total=' . $var2 . '&id_unico=' . $id_unico . '&claveContrato=' . $claveUnica . '&birmex=" class="btn btn-warning" style=" width: 150px; float: right; margin-right: 2.5%; margin-top: 0px;" onclick="cambiar_estado(this);" id="sinbirmex">GENERAR ORDEN</a>';
  ?>

  <?php
  echo '<a href="cancelarOrden?var=' . $id_unico . '&valor2=' . $claveUnica . '" class="btn btn-danger" style=" width: 150px; float: left; margin-left: 50px; margin-top: 0px;">Eliminar orden</a>';
  ?>
  <a href="" class="btn btn-info" onclick="actualiza();" style=" width: 150px; float: left; margin-left: 50px; margin-top: 0px;">Finalizar</a>
  <div class="col-md-2">
<select name="agregarbirmex" id="agregarbirmex" class="form-control" required style="height: 32px;">
            <option value="" selected disabled>Se incluye dirección de Birmex</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
</select>
  </div>
  <script>
    function actualiza() {
      window.close();

    };
    $(document).ready(function () {
      $('#seagregabirmex').prop("hidden", true);
      $('#sinbirmex').prop("hidden", true);
$('#agregarbirmex').change(function (e) {
    if ($(this).val() === "Si") {

      $('#seagregabirmex').prop("hidden", false);
      $('#sinbirmex').prop("hidden", true);
    } else if($(this).val() === "No"){
      $('#sinbirmex').prop("hidden", false);
      $('#seagregabirmex').prop("hidden", true);

    }
})


});
  </script>
  </div>
</body>

</html>