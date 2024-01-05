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
  <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
  <link rel="stylesheet" href="iconos/css/all.css?n=1">
  <link rel="stylesheet" href="css/style.css?n=1">
  <script src="iconos/js/all.min.js"></script>
  <title>Editar de suministro</title>

</head>

<body>
  <?php
  require 'conexion.php';
  $claveUnica3 = $_GET['Wz'];
  // $id_unico3=base64_decode($_GET['Zw']);
  // $contrato=base64_decode($_GET['tr']);
  $claveUnica = $claveUnica3;
  $claveUnica5 = base64_encode($claveUnica3);


  //$id_unico=base64_encode($id_unico3);

  //$claveUnica2=base64_decode($claveUnica);
  // $id_unico2=base64_decode($id_unico);
  $sql_r = $conexion2->query("SELECT id_contrato from numeroorden where claveUnicaContrato='$claveUnica3'");
  $rl = mysqli_fetch_assoc($sql_r);

  $id_unico = $rl['id_contrato'];
  $id_unico3 = $id_unico;
  $id_unico5 = base64_encode($id_unico);

  $sql_d = $conexion2->query("SELECT numeroContrato from listamedicamento where id_contrato =$id_unico");
  $rk = mysqli_fetch_assoc($sql_d);

  $contrato = $rk['numeroContrato'];

  ?>


  <div class="contrato-nuevo">

    <div class="imagen1"></div>





    <div class="signup-form-container" style="margin-top: 0px; width: 99%; height: auto; background: none; margin-left: auto; margin-right: auto; padding: .10%;">

      <center>
        <input type="hidden" id="claveContrato" value="<?php echo $id_unico3; ?>">
        <input type="hidden" id="claveUnicaContrato" value="<?php echo $claveUnica3; ?>" requerided="requireded" style="width: 200px; border: none; height: 35px; color: black; border-radius: 10px;">
        <input type="hidden" id="contrato" value="<?php echo $contrato; ?>" requerided="requireded" style="width: 200px; border: none; height: 35px; color: black; border-radius: 10px;"><br>
      </center>

    </div>

    <!--<form action="modelo/modelo_add_order_suministro.php" method="POST">-->

    <!--    <center><select class="form-control" id="select_suministro" name="descripcion" style=" width: 550px; height: 40px;" onchange="select_orden();" >
                    <option value=""> Seleccionar por CLAVE HRAEI </option>

                    <?php
                    require 'conexion.php';
                    $sql_s = "SELECT id_medicamento, OFICIODEINFORMEDENOTIFICACION, FECHADEOFICIO, GRUPO, FUENTE, DEASIGNACION, PROVEEDOR, CLAVEHRAEI, LEFT(DESCRIPCION, 200) AS DESCRIPCION, CLAVEDECUADROBASICO, CUCOP, UNIDADDEMEDIDA, PRECIOUNITARIO, MINIMOCONSUMO, MAXIMOCONSUMO, MINIMOPRECIO, MAXIMOPRECIO, otroLaboratorio FROM listamedicamento where numeroContrato = '$contrato' ORDER BY CLAVEHRAEI ASC";
                    $result = mysqli_query($conexion2, $sql_s);
                    while ($row_s = mysqli_fetch_array($result)) {
                      $ID_usuario = $row_s['id_medicamento'];
                      $nombre = $row_s['CLAVEHRAEI'];
                    ?>
                       <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
          
                       <?php
                      }


                        ?>

                </select></center><br>-->
    <input list="medicamentoEnContrato" class="form-control" id="select_suministro" style="width: 550px; height: 40px; margin-left: auto; margin-right: auto;" onchange="select_orden();" placeholder="Clave o Nombre del Medicamento">

    <datalist id="medicamentoEnContrato">
      <?php
      require 'conexion.php';
      $sql_s = $conexion2->query("SELECT id_medicamento, OFICIODEINFORMEDENOTIFICACION, FECHADEOFICIO, GRUPO, FUENTE, DEASIGNACION, PROVEEDOR, CLAVEHRAEI, LEFT(DESCRIPCION, 200) AS DESCRIPCION, CLAVEDECUADROBASICO, CUCOP, UNIDADDEMEDIDA, PRECIOUNITARIO, MINIMOCONSUMO, MAXIMOCONSUMO, MINIMOPRECIO, MAXIMOPRECIO, otroLaboratorio FROM listamedicamento where numeroContrato = '$contrato' ORDER BY CLAVEHRAEI ASC");
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
    <!--
                <center><select class="form-control" id="select_suministro2" name="descripcion" style=" width: 550px; height: 40px;" onchange="select_orden2();" >
                    <option value=""> Seleccionar por descripcion </option>

                    <?php
                    require 'conexion.php';
                    $sql_s = "SELECT id_medicamento, OFICIODEINFORMEDENOTIFICACION, FECHADEOFICIO, GRUPO, FUENTE, DEASIGNACION, PROVEEDOR, CLAVEHRAEI, LEFT(DESCRIPCION, 400) AS DESCRIPCION, CLAVEDECUADROBASICO, CUCOP, UNIDADDEMEDIDA, PRECIOUNITARIO, MINIMOCONSUMO, MAXIMOCONSUMO, MINIMOPRECIO, MAXIMOPRECIO, otroLaboratorio FROM listamedicamento where numeroContrato = '$contrato' ORDER BY CLAVEHRAEI ASC";
                    $result = mysqli_query($conexion2, $sql_s);
                    while ($row_s = mysqli_fetch_array($result)) {
                      $ID_usuario = $row_s['id_medicamento'];
                      $nombre = $row_s['DESCRIPCION'];
                    ?>
                       <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
          
                       <?php
                      }


                        ?>

                </select></center><br>-->


    <script>
      // var fired_button2= $("#claveUnicaContrato").val();  
      //var fired_button2=document.getElementById('claveUnicaContrato').value;
      $('#select_suministro').change(function() {

        let fired_button = $(this).val();
        let fired_button2 = $("#claveUnicaContrato").val();
        let fired_button3 = $("#claveContrato").val();

        window.location.href = 'modelo/modelo_add_order_suministro?valor=' + fired_button + '&valor2=' + fired_button2 + '&valor3=' + fired_button3;

      });

      function select_orden() {

        let fired_button = $(this).val();
        let fired_button2 = $("#claveUnicaContrato").val();
        let fired_button3 = $("#claveContrato").val();

        window.location.href = 'modelo/modelo_add_order_suministro?valor=' + fired_button + '&valor2=' + fired_button2 + '&valor3=' + fired_button3;
      }

      $('#select_suministro2').change(function() {

        let fired_button = $(this).val();
        let fired_button2 = $("#claveUnicaContrato").val();
        let fired_button3 = $("#claveContrato").val();
        window.location.href = 'modelo/modelo_add_order_suministro?valor=' + fired_button + '&valor2=' + fired_button2 + '&valor3=' + fired_button3;

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

          $sql = $conexion2->query("SELECT * from ordensuministro where claveUnicaOrden='$claveUnica3'  group by claveHraei");


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
     		 <a href="eliminaRegistr?id_ordenSuministro=' . $row['id_ordenSuministro'] . '&claveMedicamento=' . $row['claveHraei'] . '&id_proveedor=' . $id_unico5 . '&contrato=' . $contrato . '&claveUnica=' . $claveUnica5 . '&cantidad=' . $row['cantidad'] . '" class="btn-danger" style="width: 80px; height: 25px; margin-top: 1%; border-radius: 4px; outline:none;" >Eliminar</button>
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



  <a href="principal" class="btn btn-info" style="width: 170px; margin-left: 50px; margin-top: 0px;">Finalizar edición</a>
  <?php

  $claveUnicaEncriptada = base64_encode($claveUnica3);
  $montoEncriptado = base64_encode($var);
  echo '<a href="editarMontoOrden?claveContrato=' . $claveUnicaEncriptada . '&total=' . $montoEncriptado . '" class="btn btn-success" style="width: 170px; float: right; margin-right: 50px; margin-top: 0px;">Aplicar cambios</a>';
  ?>
  <?php
  /*
                            echo '<a href="listar_Medicamento" target="blank" <i class="btn btn-warning" style=" width: 150px; float: left; margin-left: 50px; margin-top: 0px;">Estado Min y Max</i></a>';
                       */
  ?>
  <script>
    function actualiza() {
      location.reload();

    };
  </script>
  </div>
</body>

</html>