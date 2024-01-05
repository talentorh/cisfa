<div id="myModal_contratoProveedor" class="modal fade in" role="dialog" >

<meta charset="UTF-8">
    <div class="modal-dialog">

        <!--Modal content-->
        <div class="modal-content" >
            <div class="modal-header" style="background: green; color:white; ">
                <h4 class="modal-title"> Cargar contrato </h4>
            </div>
            <div class="modal-body">
            <script>
                function select_usuario()
                    { 

                    let ID_usuario =  $("#select_usuario").val();

                        let ob = {ID_usuario:ID_usuario};

                            $.ajax({
                                type: "POST",
                                url:"modelo/modelo_mostrar_datosFG.php",
                                data: ob,
                                beforeSend: function(objeto){
                
                                        },
                                success: function(data)
                                { 
                
                                    $("#panel_selector").html(data);
            
                                }
                            });
                        }
            </script>
            <select class="form-control" id="select_usuario" style="height: 40px;" onchange="select_usuario();">
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value=""> Seleccione </option>
                    <meta charset="UTF-8">
                    <?php
                        require 'conexion.php';
                        $sql_s = $conexion2->query("SELECT * FROM datosproveedor order by datoPersonalProveedor ASC");
                            while ($row_s = mysqli_fetch_array($sql_s)) {
                                $ID_usuario = $row_s['id_datoProveedor'];
                                $nombre = $row_s['datoPersonalProveedor'];
                    ?>
                <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            <?php
                }
            ?>
                </select>
                <div id="panel_selector"></div>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>