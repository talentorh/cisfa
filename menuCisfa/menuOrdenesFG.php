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
    <li class="nav-item">
        <a class="nav-link" href="principal" style="color: #09456A;" >Vista principal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="medicamentos" style="color: #09456A;" target="_blank" >Medicamentos F.G</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="suministrosFG" role="button" data-toggle="dropdown" aria-expanded="false">
        Ordenes de suministro »
        </a>
        
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="close_sesion" style="color: red;">Cerrar sesión</a>
      </li>
      
    </ul>
  </div>
</nav>
</div>