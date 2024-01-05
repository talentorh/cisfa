<html>
<div class="menu" id="submenu">
    <input type="text"
        style="width:100%; text-align: center; height:30px; margin-top:5px; font-size:15px; font-style: normal; color: white;  background-color:#5fa2db; border-radius:5px"
        disabled value="Hola&nbsp;<?php echo $rw['nombre_trabajador']; ?>">

    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-enter">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 12px;" value="Contratos CISFA">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%; padding: 0px;">
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_contratos"
                                style="margin-left: 8px; background: none; color: black; font-size: 12px;"
                                value="Contratos CISFA"></div>
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_contratoProveedor"
                                style="margin-left: 8px; background: none; color: black; font-size: 12px;"
                                value="Cargar contrato"></label></div>


                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">
    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-unlink">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;" value="Medicamentos">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%; padding: 0px;">
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('medicamentos');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Medicamento FI"></label></div>
                    

                </div>
            </label>
        </li>
    </div>

    <hr style="margin: 0px 0px;">
    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-user">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;" value="Proveedores">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%; padding: 0px;">
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_proveedor"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Cargar proveedor"></div>
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('listaProveedores');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Listar proveedores"></label></div>


                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">
    
    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-book">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Orden de suministro">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%; padding: 0px;">
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.location.href='suministros'"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Orden de suministro"></div>
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_editarOrden"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Editar orden suministro"></label></div>
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_cancelarOrden"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Cancelar orden suministro"></label></div>



                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">

    <div class="line"><label class="lnr lnr-database"><input type="submit" data-toggle="modal"
                data-target="#myModal_salidasCisfa"
                style="margin-left: 20px; background: none; color: black; font-size: 13px;"
                value="Salidas CISFA"></label></div>
    <hr style="margin: 0px 0px;">
    <div class="line"><label class="lnr lnr-database"><input type="submit" data-toggle="modal"
                data-target="#myModal_entradasCisfa"
                style="margin-left: 20px; background: none; color: black; font-size: 13px;"
                value="Entradas CISFA"></label></div>
    <hr style="margin: 0px 0px;">

    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-unlink">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;" value="Minimos/Maximos">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%; padding: 0px;">
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('minimos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Minimos no alcanzados"></div>
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('minimosCubiertos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Minimos alcanzados"></label></div>
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('maximosCubiertos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Maximos alcanzados"></label></div>


                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">
    <div class="line"><label class=""><a href="close_sesion"
                style="color: red; font-size:15px; font-style:normal; margin-left: 60px; margin-top: 30px; text-decoration: none;">
                Cerrar Sesion
            </a></label></div>
    <hr style="margin: 0px 0px;">


    <style>
    .logout {
        position: fixed;
        left: 0;
        bottom: 0;
    }
    </style>
    <br><br><br><br>
</div>

</html>