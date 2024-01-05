<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="scripts/tablamedicamento.js"></script>
    <title>HRAEI</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>



    <script>
    function opener() {
        nwin = window.open("", "newWin", "toolbar=no,location= no,resizable=no",
            width = 200, height = 200, left = 100, top = 100)
    }
    </script>


</head>

<body>


    <header>


        <strong class="strong">Medicamentos CISFA </strong>

    </header>


    <div id="box1">

        <div class="autoheight">
        <input type="submit" data-toggle="modal" data-target="#myModal_cargamedicamento" class="btn btn-success"
            value="  +  Cargar Medicamento" style="margin-top: 35px;"><br><br>
            <div id="tabla_resultado" class="adaptar">

            </div>
        </div>
    </div>
    <script>
    var setElementHeight = function() {
        var height = $(window).height();
        $('.autoheight').css('min-height', (height));
    };

    $(window).on("resize", function() {
        setElementHeight();
    }).resize();
    </script>
<?php
    require 'modals/buscarMedicamentobus.php';
    require 'modals/cargarMedicamento.php';
    ?>
    <script src="frontend/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>

</html>