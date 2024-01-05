<style>
    a {
        font-size: 15px;
        font-style: normal;
        color: black;
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: 0px;
    }
</style>
<script>
    function select_contrato2023(){
    let ID_usuario=$("#contrato2023").val();
    let tipo=$("#tipo2023").val();
    let ob={ID_usuario:ID_usuario, tipo:tipo};
        $.ajax({
            type:"POST",
            url:"consultaFG.php",
            data:ob,
            beforeSend:function(objeto){
                /* swal({title:'¡Seleccionado!',
                text:'',
                type:'success',
                timer:1000,
                showConfirmButton:false
                }
            )*/},
            success:function(data){
                $("#tabla_resultado").html(data)
            }
        }
    )
}
function select_contrato2024(){
    let ID_usuario=$("#contrato2024").val();
    let tipo=$("#tipo2024").val();
    let ob={ID_usuario:ID_usuario, tipo:tipo};
        $.ajax({
            type:"POST",
            url:"consultaFG.php",
            data:ob,
            beforeSend:function(objeto){
                /* swal({title:'¡Seleccionado!',
                text:'',
                type:'success',
                timer:1000,
                showConfirmButton:false
                }
            )*/},
            success:function(data){
                $("#tabla_resultado").html(data)
            }
        }
    )
}
</script>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">FARMACIA GRATUITA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Ver contratos »
        </a>
        <div class="dropdown-menu" style="margin: 0px; font-size: 14px; padding: 0px; background: #F8F8F8;">
          <input type="hidden" value="2023" id="contrato2023"><input type="hidden" value="gratuita 2023" id="tipo2023">
          <a class="dropdown-item" href="#" style="font-size: 13px;" onclick="select_contrato2023();">2023</a>
          <input type="hidden" value="2024" id="contrato2024"><input type="hidden" value="gratuita 2024" id="tipo2024">
          <a class="dropdown-item" href="#" style="font-size: 13px;" onclick="select_contrato2024();">2024</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: #09456A;" data-toggle="modal" data-target="#myModal_contratoProveedor">Cargar contrato</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="medicamentos" style="color: #09456A;" target="_blank" >Medicamentos F.G</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Proveedores »
        </a>
        <div class="dropdown-menu" style="margin: 0px; font-size: 14px; padding: 0px; background: #F8F8F8;">
          <a class="dropdown-item" href="#" style="font-size: 13px;" data-toggle="modal" data-target="#myModal_proveedor">Cargar proveedor</a>
          <a class="dropdown-item" href="listaProveedores" target="_blank" style="font-size: 13px;">Listar proveedores</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Ordenes de suministro »
        </a>
        <div class="dropdown-menu" style="margin: 0px; font-size: 14px; padding: 0px; background: #F8F8F8;">
          <a class="dropdown-item" href="suministrosFG" style="font-size: 13px;">Orden de suministro</a>
          <a class="dropdown-item" href="#" target="_blank" style="font-size: 13px;" data-toggle="modal"
                            data-target="#myModal_editarOrden">Editar orden de suministro</a>
        <a class="dropdown-item" href="#" target="_blank" style="font-size: 13px;" data-toggle="modal"
                            data-target="#myModal_cancelarOrden">Cancelar orden de suministro</a>
        </div>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="close_sesion" style="color: red;">Cerrar sesión</a>
      </li>
      
    </ul>
  </div>
</nav>
</div>