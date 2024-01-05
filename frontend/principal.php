<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css?n=1" rel="stylesheet">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <title>HRAEI</title>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="control_usuario.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="scripts/listarMedicamento.js"></script>
    <script src="scripts/selectContrato.js"></script>
    <script src="consolidadas.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden.js"></script>
    <script src="scripts/cancelarOrdenOs.js"></script>
    <script src="scripts/mult.js"></script>
    <script src="scripts/consulta.js"></script>

</head>

<body>
    <header>
        <strong class="strong">CONTRATOS
            CISFA</strong>
    
    </header>
    <?php
    require 'menuCisfa/munuPueba2.php';
    ?>
    <div class="box3">
        <div id="tabla_resultado" style="font-size: 12px;">
        </div>
        <style>
            ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-track {
                background: #ACAEAD;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb {
                background: #fff;
                border-radius: 5px;
            }
        </style>
    </div>
    <script src="frontend/js/script.js"></script>
</body>

</html>
<?php
require_once 'modals/contratos.php';
require_once 'modals/cargarContrato.php';
require_once 'modals/registrarProveedor.php';
require_once 'modals/salidasCisfa.php';
require_once 'modals/cancelarOrdenSuministro.php';
require_once 'modals/entradasCisfa.php';
require_once 'modals/editarOrden.php';
?>