<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="menu/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Ordenes de suministro</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>

<body>


    <!--  
    <strong id="cabecera"  style="margin-right: 36%; color: white;">Hospital Regional de Alta Especialidad de Ixtapaluca</strong>
        <strong id="cabecera2">HRAEI Ixtapaluca</strong>
      -->

    <div class="d-flex" id="wrapper" style="margin-top: 3px;">
        <!-- Sidebar-->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading" style="background: green; color: white;">Menu General</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action bg-light" href="controlados">Inicio</a>
                <a class="list-group-item list-group-item-action bg-light" href="inventario">Inventario</a>
                <a class="list-group-item list-group-item-action bg-light" style="cursor: pointer" data-toggle="modal" data-target="#myModal_listarMedicamento">Cargar medicamento</a>
                <a class="list-group-item list-group-item-action bg-light" style="cursor: pointer" data-toggle="modal" data-target="#myModal_medicamentoEnOrden">Medic. en orden de suministro</a>
                <a class="list-group-item list-group-item-action bg-light" href="close_sesion">Cerrar sesion</a>
            </div>
        </div>
        <!-- Page Content-->
        <div id="page-content-wrapper" style="background: white;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <input type="submit" class="btn btn-primary" value="Menu" id="menu-toggle" style="width: 150px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">


                        </li>

                    </ul>


                    <main>

                        <?php
                        require 'conexion.php';

                        ?>



                        <script>
                            function select_contrato() {

                                let ID_usuario = $("#select_contrato").val();

                                let ob = {
                                    ID_usuario: ID_usuario
                                };

                                $.ajax({
                                    type: "POST",
                                    url: "consultaSuministros.php",
                                    data: ob,
                                    beforeSend: function(objeto) {

                                    },
                                    success: function(data) {

                                        $("#tabla_resultado").html(data);

                                    }
                                });
                            }
                        </script>

                        <section id="tabla_resultado" style="margin-top: 0px;  width: 100%; float:left; margin-left: -20px;">

                            <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

                        </section>
                    </main>
                </div>
            </nav>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="script/scripts.js"></script>
            <script src="frontend/js/script.js"></script>
</body>

</html>

<div id="myModal_listarMedicamento" class="modal fade" role="dialog">
    <script src="control_usuario.js"></script>
    <script src="consultaControlados.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 1200px; height: auto; color: white; float: right; margin-right: -450px;">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                            <div class="descripcion">
                                <h5>Hospital Regional de Alta Especialidad de Ixtapaluca </h5><br>
                                <h6>Dirección de Administración y Finanzas</h6><br>
                                <h6>Subdirección de Recursos Materiales</h6>
                            </div>
                        </div>

                        <div class="container" style="margin-top: -25px;">
                            <?php
                            include("consultaControlados.php");

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div id="myModal_medicamentoEnOrden" class="modal fade" role="dialog">


    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 1200px; height: auto; color: white; float: right; margin-right: -450px;">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                            <div class="descripcion">
                                <h5>Hospital Regional de Alta Especialidad de Ixtapaluca </h5><br>
                                <h6>Dirección de Administración y Finanzas</h6><br>
                                <h6>Subdirección de Recursos Materiales</h6>
                            </div>
                        </div>

                        <div class="container" style="margin-top: -25px;">

                            <strong style="color: black; margin-top: 10px; float: left; margin-left: 13px;">FILTRAR POR CLAVE DE MEDICAMENTO</strong>
                            <div class="input-group" style="float:left; margin-top: 5px; width: 97.5%; margin-left: 16px;">
                                <div class="input-group">
                                </div>
                                <input type="text" id="localizar" class="form-control" required="required" value="HRAEI-MD" onkeyup="mayus(this);">

                            </div>
                            <input type="submit" name="guarda" class="btn btn-warning" value="Buscar Medicamento" onclick="btn_localizar();" style="width: 97.5%; margin-left: 16px; margin-top: 2px;">



                            <!-- form start -->

                            <div class="modal-body">



                                <script>
                                    function btn_localizar() {

                                        let ID_usuario = $("#localizar").val();

                                        let ob = {
                                            ID_usuario: ID_usuario
                                        };

                                        $.ajax({
                                            type: "POST",
                                            url: "consulta_listaMedicamentoEnOrden.php",
                                            data: ob,
                                            beforeSend: function(objeto) {

                                            },
                                            success: function(data) {

                                                $("#tabla_resultado").html(data);

                                            }
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>