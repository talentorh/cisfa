<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
  
        <!-- Core theme CSS (includes Bootstrap)-->
    <link href="menu/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Ordenes de suministro</title>

   <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="scripts/consultaSuministro.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden2.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/cancelarOrdenOs.js"></script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>
<style>
/**
           .imagenCisfa2{
                width: 100%;
                height: 120px;
                background: white;
                float: left;
                margin-left: 0%;
                background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbNIGjQwMRYhvjMiXYRxAO7XiFrk9pcpd1hA&usqp=CAU);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                margin-top: 25px;
}
**/
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
<header style="background-color: #0C98DE;">

   

        <strong id="cabecera" style="color: white; float: left; margin-left: 42%; font-size: 18px;">ORDENES DE SUMINISTRO</strong>

        <script>
        
		//	window.onload = function(){killerSession();}
		//	function killerSession(){
		//	setTimeout("window.open('confirmCloseSession.php','_top');", 2.4e+6);
		//	}
</script>
<script type="text/javascript">


$('.nav-item dropdown').hover(function(){
	$('#navbarDropdown').trigger('click')

})

</script>

    </header>
      <div class="box2">
        <div class="box1">
    <?php
       require 'menuCisfa/menuSuministrosAdmin.php';
       
       ?>
       </div>
 <div class="box03">     
  <div class="imagenCisfa" style="margin-top: 7px; border-radius: 25px; height: 85px;"></div>
  <input list="medicamentoEnOrden" class="form-control" id="medicamento_orden" style="margin-left: 5px; margin-top: 45px; width: 450px; height: 40px;"  onchange="medicamento_enorden();" placeholder="Clave, Nombre o CNIS del Medicamento">
           
        <datalist id="medicamentoEnOrden" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query("SELECT DISTINCT claveHraei, descripcionDelBien FROM ordensuministro where fechacontrato = '2022'");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['claveHraei'];
              $nombre = $row_s['descripcionDelBien'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            <!--
  <label class="lnr lnr-magnifier"  data-toggle="modal"
                    data-target="#myModal_medicamentoEnOrden2" style="color: blue; font-size: 20px; cursor: pointer; margin-left: 30px; margin-top: 80px;"></label>-->
        <div id="tabla_resultado" class="table table-responsive table-striped table-darkgray table-hover" style="cursor: pointer; font-size: 12px;">
                <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
        </div>
        <div id="tabla_resultados" class="table table-responsive table-striped table-darkgray table-hover" style="cursor: pointer; font-size: 12px;">
                <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
        </div>
          
         <div id="tabla_resultado2" class="table table-responsive table-striped table-darkgray table-hover" style="cursor: pointer; font-size: 12px;"></div>
    </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="script/scripts.js"></script>
        <script src="frontend/js/script.js"></script>
</body>
</html>
<?php
require 'modals/entradasCisfa.php';
require 'modals/salidasCisfa.php';
require 'modals/salidasCisfa2022.php';
require 'modals/medicamentoEnOrden2.php';
require 'modals/buscarMedicamento.php';
require 'modals/cancelarOrdenSuministro.php';
require 'modals/editarOrden.php';
?>

