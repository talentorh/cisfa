<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css?=1">
    <link href="css/main.css?n=1" rel="stylesheet">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <title>HRAEI</title>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="control_usuario.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="graficoConsumosMedicamentos.js"></script>
    <script src="scripts/listarMedicamento.js"></script>
    <script src="scripts/selectContrato.js"></script>
    <script src="consolidadas.js"></script>
    <script src="consolidadasExterno.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/cancelarOrdenOs.js"></script>
    <script src="scripts/mult.js"></script>
    <script src="scripts/consulta.js"></script>
    <script src="scripts/cerrarMenu.js"></script>
    <!--<script src="scripts/iconoCarga.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>



</head>

<body>
    <header>
        <strong id="cabecera" style="color: white; float: left; margin-left: 42%; font-size: 18px;">CONTRATOS
            CISFA</strong>
        <script>
        //	window.onload = function(){killerSession();}
        //	function killerSession(){
        //	setTimeout("window.open('confirmCloseSession.php','_top');", 2.4e+6);
        //	}
        </script>
        <script type="text/javascript">
        $('.nav-item dropdown').hover(function() {
            $('#navbarDropdown').trigger('click')

        })
        </script>
    </header>
    <div class="box2">
        <div class="box1">
            <?php
        require 'menuCisfa/menuPrueba.php';
    ?>
        </div>

        <div class="box03">
            <!-- <div class="imagenCisfa" style="margin-top: 34px; border-radius: 25px; height: 94px;"></div>-->
            <!--<div id="tabla_resultados" style="font-size: 12px;"></div>-->
            <div id="tabla_resultado" style="font-size: 12px;">

            </div>

            <style>
            ::-webkit-scrollbar {
                width: 10px;
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
        </div>

    </div>


    <script src="frontend/js/script.js"></script>

</body>

</html>
<?php

require_once 'modals/contratosAdmin.php';
require_once 'modals/cargarContrato.php';
require_once 'modals/registrarProveedor.php';
require_once 'modals/salidasCisfa.php';
require_once 'modals/cancelarOrdenSuministro.php';
require_once 'modals/entradasCisfa.php';
require_once 'modals/promedioCisfa.php';
require_once 'modals/editarOrdenAdmin.php';
?>