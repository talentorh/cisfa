<div id="myModal_contratosFG" class="modal fade in" role="dialog">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: green; color: white;">
                <h4 class="modal-title">Contratos FG</h4>
            </div>
            <div class="modal-body">


                <div class="cabecera-contrato">
                    <div class="imagen1"></div>


                </div>
                <style>
                    label {
                        color: black;
                    }
                </style>


                <div class="modal-body">
                    <label>Filtrar por nombre de proveedor</label>
                    <select class="form-control" id="select_proveedor" style="height: 40px; cursor: pointer;" onchange="select_proveedor();">
                        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                        <option value="">Nombre de proveedor</option>
                        <meta charset="UTF-8">
                        <?php
                        require 'conexion.php';
                        $sql_s = $conexion2->query("SELECT datoPersonalProveedor FROM datosproveedor order by datoPersonalProveedor asc");
                        while ($row_s = mysqli_fetch_array($sql_s)) {
                            $ID_usuario = $row_s['datoPersonalProveedor'];
                            $nombre = $row_s['datoPersonalProveedor'];
                        ?>
                            <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                        <?php
                        }


                        ?>
                    </select>
                    <label>Filtrar por nùmero de contrato</label>
                    <select class="form-control" id="select_numerocontrato" style="height: 40px; cursor: pointer;" onchange="select_numerocontrato();">
                        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                        <option value="">Numero de contrato</option>
                        <meta charset="UTF-8">
                        <?php
                        require 'conexion.php';
                        $sql_s = $conexion2->query("SELECT DISTINCT numero_pedido FROM proveedores where year = '2023' and tipoFarmacia = 'gratuita 2023' order by numero_pedido asc");
                        while ($row_s = mysqli_fetch_array($sql_s)) {
                            $ID_usuario = $row_s['numero_pedido'];
                            $nombre = $row_s['numero_pedido'];
                        ?>
                            <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

                        <?php
                        }


                        ?>
                    </select>

                    <label>Fitar por tipo de contratos</label>
                    <select class="form-control" id="select_tipoFarm" style="height: 40px; cursor: pointer;" onchange="select_tipoFarm();">
                        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                        <option value="">Tipo de contrato</option>
                        <meta charset="UTF-8">
                        <?php
                        require 'conexion.php';
                        $sql_s = $conexion2->query("SELECT DISTINCT tipoFarmacia FROM proveedores where year = '2023' and tipoFarmacia = 'gratuita 2023'");
                        while ($row_s = mysqli_fetch_array($sql_s)) {
                            $ID_usuario = $row_s['tipoFarmacia'];
                            $nombre = $row_s['tipoFarmacia'];
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