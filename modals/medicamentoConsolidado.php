<div id="myModal_listarMedicamentoCons" class="modal fade" role="dialog">
    <script src="control_usuario.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ver Medicamento </h4>
            </div>
            <div class="modal-body">

                <div id="panel_editar">

                    <div class="cabecera-contrato">
                        <div class="imagen1"></div>


                    </div>
                    <style>
                        label {
                            color: black;
                        }
                    </style>



                    <div class="modal-body">
                        <label>NOMBRE O CLAVE DEL MEDICAMENTO</label>
                        <input list="consult_medicacons" class="form-control" id="buscardorcons" name="" type="text" onchange="btn_buscar_medicamentocons();">

                        <datalist id="consult_medicacons">
                            <?php
                            require 'conexion.php';
                            $sql_s = $conexion2->query("SELECT DISTINCT DESCRIPCIONDELBIEN, CLAVEHRAEI FROM consolidados");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario = $row_s['CLAVEHRAEI'];
                                $nombre = $row_s['DESCRIPCIONDELBIEN'];
                            ?>
                                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                            <?php
                            }


                            ?>

                        </datalist>

                        <label>FILTRAR MEDICAMENTO POR CONTRATO</label>
                        <select class="form-control" id="select_contratcons" onchange="select_contcons();">

                            <option value=""> Seleccione </option>
                            <meta charset="UTF-8">
                            <?php

                            $sql_s = $conexion2->query("SELECT DISTINCT NUMERODECONTRATO FROM consolidados ");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario = $row_s['NUMERODECONTRATO'];
                                $nombre = $row_s['NUMERODECONTRATO'];

                            ?>
                                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                            <?php
                            }


                            ?>

                        </select>
                        <label>FILTRAR PROVEEDOR</label>
                        <select class="list-group-item list-group-item-action bg-ligh" style="height: 40px; cursor: pointer; " id="select_mediccons" onchange="select_mediccons();">
                            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                            <option value="">Filtrar por proveedor</option>
                            <meta charset="UTF-8">
                            <?php

                            $sql_s = $conexion2->query("SELECT DISTINCT PROVEEDOR FROM consolidados WHERE DEMANDA = 'FARMACIA INTRAHOSPITALARIA' order by PROVEEDOR asc");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario = $row_s['PROVEEDOR'];
                                $nombre = $row_s['PROVEEDOR'];
                            ?>
                                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                            <?php
                            }


                            ?>
                        </select>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>