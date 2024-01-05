<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/main.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Ordenes de suministro</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="scripts/consultaSuministro.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden2.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/cancelarOrdenOs.js"></script>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>

<body>
    <style>

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #ACAEAD;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-thumb {
            background: #fff;
            border-radius: 50px;
        }
    </style>
    <header>


        <strong class="strong">ORDENES DE SUMINISTRO</strong>

        <script type="text/javascript">
            $('.nav-item dropdown').hover(function() {
                $('#navbarDropdown').trigger('click')

            })
        </script>

    </header>
            <?php
            require 'menuCisfa/menuSuministros.php';

            ?>
        <div class="box3">
            <div id="tabla_resultado" class="table table-responsive table-striped table-darkgray table-hover" style="cursor: pointer; font-size: 12px;">
            </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="script/scripts.js"></script>
    <script src="frontend/js/script.js"></script>
</body>

</html>
<?php
require 'modals/entradasCisfa.php';
require 'modals/salidasCisfa.php';
require 'modals/salidasCisfa2022.php';
//require 'modals/medicamentoEnOrden2.php';
require 'modals/buscarMedicamento.php';
require 'modals/cancelarOrdenSuministro.php';
require 'modals/editarOrden.php';
?>