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
  function select_contrato2022(){
    let ID_usuario=$("#contrato2022").val();
    let tipo=$("#tipo2022").val();
    let ob={ID_usuario:ID_usuario, tipo:tipo};
        $.ajax({
            type:"POST",
            url:"consulta.php",
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
    function select_contrato2023(){
    let ID_usuario=$("#contrato2023").val();
    let tipo=$("#tipo2023").val();
    let ob={ID_usuario:ID_usuario, tipo:tipo};
        $.ajax({
            type:"POST",
            url:"consulta.php",
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
            url:"consulta.php",
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
    <li class="nav-item">
        <a class="nav-link" href="principal" style="color: #09456A;" >Vista principal</a>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Ver contratos »
        </a>
        <div class="dropdown-menu" style="margin: 0px; font-size: 14px; padding: 0px; background: #F8F8F8;">
        <input type="hidden" value="2022" id="contrato2022"><input type="hidden" value="gratuita 2022" id="tipo2022">
          <a class="dropdown-item" href="#" style="font-size: 13px;" onclick="select_contrato2022();">2022</a>
          <input type="hidden" value="2023" id="contrato2023"><input type="hidden" value="gratuita 2023" id="tipo2023">
          <a class="dropdown-item" href="#" style="font-size: 13px;" onclick="select_contrato2023();">2023</a>
          <input type="hidden" value="2024" id="contrato2024"><input type="hidden" value="gratuita 2024" id="tipo2024">
          <a class="dropdown-item" href="#" style="font-size: 13px;" onclick="select_contrato2024();">2024</a>
        </div>
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
        Reporte entregas »
        </a>
        <div class="dropdown-menu" style="margin: 0px; font-size: 14px; padding: 0px; background: #F8F8F8;">
            <a class="dropdown-item" href="reporteEntregasOsFG" target="_blank" style="font-size: 13px;">Faltante de entregas 2023</a>
            <a class="dropdown-item" href="reporteEntregadoFG" target="_blank" style="font-size: 13px;">Entregado 2023</a>
            <a class="dropdown-item" href="reporteEntregasOsFG2024" target="_blank" style="font-size: 13px;">Faltante de entregas 2024</a>
            <a class="dropdown-item" href="reporteEntregadoFG2024" target="_blank" style="font-size: 13px;">Entregado 2024</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Tipo de O.S »
        </a>
        <div class="dropdown-menu" style="margin: 0px; font-size: 14px; padding: 0px; background: #F8F8F8;">
                <input type="hidden" value="gratuita 2023" id="tipo5">
                <input type="hidden" value="2023" id="year3">
          <a class="dropdown-item" href="#" onclick="tipoFarmaciafg2022();" style="font-size: 13px;">2022</a>
          <a class="dropdown-item" href="#"  onclick="tipoFarmacia4();" style="font-size: 13px;">2023</a>
                <input type="hidden" value="gratuita 2024" id="tipo6">
                <input type="hidden" value="2024" id="year4">
                <input type="hidden" value="gratutita 2022" id="tipo22">
                <input type="hidden" value="2022" id="year22">
                <script>
                function tipoFarmaciafg2024()
{ 
   let ID_usuario =  $("#tipo6").val();
   let year = $("#year4").val();
      let ob = {ID_usuario:ID_usuario, year:year};

      $.ajax({
                  type: "POST",
                  url:"consultaSuministrosFG.php",
                  data: ob,
                  beforeSend: function(objeto){
                  
                  },
                  success: function(data)
                  { 
               
                  $("#tabla_resultado").html(data);
            
                  }
               });
}
function tipoFarmaciafg2022()
{ 
   let ID_usuario =  $("#tipo22").val();
   let year = $("#year22").val();
      let ob = {ID_usuario:ID_usuario, year:year};

      $.ajax({
                  type: "POST",
                  url:"consultaSuministrosFG.php",
                  data: ob,
                  beforeSend: function(objeto){
                  
                  },
                  success: function(data)
                  { 
               
                  $("#tabla_resultado").html(data);
            
                  }
               });
}
            </script>
        <a class="dropdown-item" href="#" onclick="tipoFarmaciafg2024();" style="font-size: 13px;">2024</a>
        <a class="dropdown-item" href="#" target="_blank" style="font-size: 13px;" data-toggle="modal" data-target="#myModal_editarOrden">Editar orden de suministro</a>
        <a class="dropdown-item" href="#" target="_blank" style="font-size: 13px;"  data-toggle="modal" data-target="#myModal_cancelarOrden">Cancelar orden de suministro</a>
        </div>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="close_sesion" style="color: red;">Cerrar sesión</a>
      </li>
      
    </ul>
  </div>
</nav>
</div>