<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css?n=1" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>HRAEI</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   
    <script src="control_usuario.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="scripts/listarMedicamento.js"></script>
    <script src="scripts/selectContratoFg.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/cancelarOrdenOsFG.js"></script>
    <script src="scripts/mult.js"></script>
    <script src="scripts/consultaFG.js"></script>

</head>

<body>

<header>
        <strong class="strong">FARMACIA GRATUITA</strong>
    </header>
    <?php
        require 'menuCisfa/menuFG.php';
    ?>
        <div class="box3">
            <div id="tabla_resultado" style="font-size: 12px;">
    
            </div>
        
<style>

::-webkit-scrollbar{
    width: 10px;
}
::-webkit-scrollbar-track{
    background: #ACAEAD;
    border-radius: 50px;
}
::-webkit-scrollbar-thumb{
    background: #fff;
    border-radius: 50px;
}
</style>
    </div>

</body>
</html>
<?php
require 'modals/contratosFG.php';
require 'modals/cargarContratoFG.php';
require 'modals/registrarProveedor.php';
require 'modals/salidasCisfa.php';
require 'modals/cancelarOrdenSuministroFG.php';
require 'modals/entradasCisfa.php';
require 'modals/editarOrdenFG.php';
?>


