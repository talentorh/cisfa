<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?=1">
    <link href="css/main.css?n=1" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>HRAEI</title>

    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="orgchart.js"></script>
    <script src="control_usuario.js"></script>
    <script src="orgchart.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">

    <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    
    <script src="peticionBolsaTrabajo.js"></script>
    
        
<script>
    function opener() {
    nwin=window.open("","newWin","toolbar=no,location= no,resizable=no",
    width=200,height=200,left=100,top=100)
    }
    </script>
</head>
<body>

    <header>
        
      <label class="lnr lnr-menu"
            style="font-size: 28px; font-style: italic; float: left; margin-left: 18px; color: white;">Menu</label>

        <strong id="cabecera" style="color: white; float: left; margin-left: 42%;">Recursos Humanos</strong>
   
        
    </header>
    <?php 
            
			if (isset($_SESSION['rh'])){
				$usernameSesion = $_SESSION['rh'];
				require 'conexion.php';
				$query ="SELECT nombre_trabajador from login where correo_electronico = '$usernameSesion' limit 1";
                $res = mysqli_query($conexion2, $query);
                $rw = mysqli_fetch_assoc($res);
			
			}
			  	 
?>
    <div class="menu">
           <input type="text"
            style="width:100%; text-align: center; height:30px; margin-top:5px; font-size:15px; font-style: normal; color: white; background-color: #235279; border-radius:5px"
            disabled value="Hola&nbsp;<?php echo $rw['nombre_trabajador']; ?>">
         <div class="line"><label class="lnr lnr-enter"><input type="submit" data-toggle="modal"
                    data-target="#myModal_contratos"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                value="Postulados"></label></div>

            <div class="line"><label class="lnr lnr-user"><input type="submit" data-toggle="modal"
                    data-target="#myModal_medicamentoEnOrden"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Puestos" ></label></div>
                    
        <div class="line"><label class="lnr lnr-magnifier"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamento"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Vacantes"></label></div>
                    
        <div class="line"><label class="lnr lnr-apartment"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamentoCons"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Organigrama."></label></div>

        <div class="line"><label class=""><a href="close_sesion"
                    style="color: red; font-size:17px; font-style:normal; margin-left: 60px; text-decoration: none;">
                    Cerrar Sesion
                    </a></label></div>
     
    </div>
    <script>
        var chart = new OrgChart(document.getElementById("tabla_resultado3"), {
            nodeBinding: {
                field_0: "name"
            },
            nodes: [
                { id: 1, name: "Amber McKenzie" },
                { id: 2, pid: 1, name: "Ava Field" },
                { id: 3, pid: 1, name: "Peter Stevens" }
            ]
        });
    </script>
   
        <main>
       <div class="imagenCisfa" style="margin-top: -30px; border-radius: 25px; height: 98px;"></div>
      
            <section id="tabla_resultado3" >
                <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
             
                </section>
            </main>
        
 <div style="width:100%; height:700px;" id="orgchart"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="frontend/js/script.js"></script>
 
</body>
</html>