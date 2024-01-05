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

    <title>Orden de suministro</title>

</head>

<body>
    <?php

    $ID_usuario = $_GET['oficio_informe'];
    $ID_usuario2 = base64_encode($_GET['oficio_informe']);


    ?>

    <div class="contrato-nuevo">
        <div class="cabecera-contrato">
            <div class="imagen1"></div>

        </div>
        <p style="text-align: center; color: red; font-size: 16px;">Para cancelar una orden de suministro, primero elimine cada una de las claves mostradas en la orden.</p>


        <input type="hidden" id="claveUnicaContrato" value="<?php echo $ID_usuario; ?>" requerided="requireded" style="width: 200px; border: none; height: 35px; color: black; border-radius: 10px;">


        <table class="table table-bordered table-striped" style="width: 95%; float: left; margin-left: 50px; margin-top: 0px; font-size: 13px; cursor: pointer;">

            <thead>

                <tr>


                    <th>Partida presupuestal</th>
                    <th>Clave HRAEI</th>
                    <th>Cuadro basico</th>
                    <th>CUCOP</th>
                    <th>Descripcion del bien</th>
                    <th>Unidad de medida</th>
                    <th>Minimo</th>
                    <th>Maximo</th>
                    <th>Cantidad a eliminar</th>
                    <th>Precio unitario</th>
                    <th>Importe</th>
                    <th>Eliminar</th>

                </tr>

            </thead>


            <tbody>
                <?php
                $var = 0;
                $var2 = 0;

                require 'conexion.php';

                $sql = "SELECT * from ordensuministro where claveUnicaOrden='$ID_usuario' group by claveHraei";
                $result = mysqli_query($conexion2, $sql);

                while ($row = $result->fetch_assoc()) {

                    echo '

<tr onkeyup="myFunction(this)">
<td>' . $row['partidaPresupuestal'] . '</td>
<td>' . $row['claveHraei'] . '</td>
<td>' . $row['cuadroBasico'] . '</td>
<td>' . $row['cucop'] . '</td>
<td>' . $row['descripcionDelBien'] . '</td>
<td>' . $row['unidadMedida'] . '</td>
<td>' . $row['minimo'] . '</td>
<td>' . $row['maximo'] . '</td>
<td>' . $row['cantidad'] . '</td>
<td>' . $row['precioUnitario'] . '</td>
<td>' . $row['importe'] . '</td>
<td class="col-lg-1" style=""> 
        <a href="eliminaRegistr?id_ordenSuministro=' . $row['id_ordenSuministro'] . '&claveMedicamento=' . $row['claveHraei'] . '&claveUnica=' . $ID_usuario2 . '&cantidad=' . $row['cantidad'] . '" class="btn-danger" style="width: 80px; height: 25px; margin-top: 1%; border-radius: 4px; outline:none;" >Eliminar</button>
       
</td>
</tr>';
                    $clave2 = $row['claveUnicaOrden'];
                    $var += $row['importe'];
                }
                $var2 = base64_encode($var);



                ?>

                <script>
                    $('.elimina').click(function() {
                        let id_ordenSuministro = $(this).val();
                        let claveMedicamento = $("#claveMedicamento").val();
                        let claveUnica = $("#claveUnica").val();
                        let id_proveedor = $("#id_proveedor").val();
                        let contrato = $("#contrato").val();
                        let cantidad = $("#cantidad").val();

                        ob = {
                            id_ordenSuministro: id_ordenSuministro
                        };
                        $.ajax({
                            type: "POST",
                            url: "eliminaRegistr.php",
                            data: ob,
                            beforeSend: function() {
                                swal({
                                    title: '¡Seleccionado!',
                                    text: '',
                                    type: 'success',
                                    timer: 1000,
                                    showConfirmButton: false
                                });
                            },
                            success: function(data) {

                                $("#tabla_resultado").load('cancelaOrden.php?');

                            }
                        });

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
                <td>SUBTOTAL</td>
                <td><input type="text" value="<?php echo '$', $var; ?>" readonly="readonly"></td>
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
                <td>TOTAL</td>
                <td><input type="text" value="<?php echo '$', $var; ?>" readonly="readonly"></td>
                <td></td>

            </tbody>

        </table>
    </div>
    <div style="width: 100%; height: auto; display: flex; justify-content: center; align-items: center;">
        <?php
        if ($var == '') {
            $ID_usuario2 = base64_encode($ID_usuario);
            echo '<a href="cancelarOrden?valor2=' . $ID_usuario2 . '" class="btn btn-danger" style=" width: auto; margin-top: 0px;">Cancelar O.S</a>';
        } else {
        }
        ?>
    </div>
    <script>
        function actualiza() {
            location.reload();

        };
    </script>
    </div>
</body>

</html>