<!doctype html>
<html>
<head>
  
<title>Oficios de penalizacion</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>
<style>
.navbar {
	position: relative;
	min-height: 50px;
	margin-bottom: 5px;
}
</style>
</head>
<body>
  
<div role="navigation" class="navbar navbar-inverse navbar-static-top" style="background: green;">
  <div class="container">
    <div class="navbar-header">
      <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a href="#" class="navbar-brand" style="color: white;">OFICIOS DE PENALIZACIONES CISFA</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>

<div class="container">
  <div class="row">
    <h4>Agregar Nuevo Oficio</h4>
    <hr style="margin-top:5px;margin-bottom: 5px;">
    <div class="content"> </div>
    <div class="panel panel-primary" >
      <div class="panel-heading" style="background: green;">
        <h3 class="panel-title">Cargar Pdf</h3>
      </div>
      <div class="panel-body">
        <div class="col-lg-6">
          <form method="POST" action="CargarFicheros.php" enctype="multipart/form-data">
<div class="form-group">
              <label class="btn btn-primary" for="my-file-selector" style="background: green;">
                <input required="" type="file" name="file" id="exampleInputFile" style="color: white; background: green;">
              </label>
              
</div>
          <button class="btn btn-primary" type="submit" style="background: green;">Cargar Fichero</button>
          </form>
        </div>
        <div class="col-lg-6"> </div>
      </div>
    </div>
  
<!--tabla-->
    <div class="panel panel-primary">
      <div class="panel-heading" style="background: green;">
        <h3 class="panel-title">Oficios de penalizaciones para descargar</h3>
      </div>
      <div class="panel-body">
   
<table class="table">
  <thead>
    <tr>
      <th width="7%">#</th>
      <th width="70%">Nombre del Archivo</th>
      <th width="13%">Ver Archivo</th>
      <th width="13%">Descargar</th>
      <th width="10%">Eliminar</th>
    </tr>
  </thead>
  <tbody>
<?php
$archivos = scandir("subidas");
$num=0;
for ($i=2; $i<count($archivos); $i++)
{$num++;
?>
<p>  
 </p>
         
    <tr>
      <th scope="row"><?php echo $num;?></th>
      <td><?php echo $archivos[$i]; ?></td>
      
      <td><a title="Ver Archivo" href="subidas/<?php echo $archivos[$i]; ?>" readfile="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px; margin-left: 18px; hideme: withe;"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span> </a></td>
      <td><a title="Descargar Archivo" href="subidas/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px; margin-left: 18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
      <td><a title="Eliminar Archivo" href="Eliminar.php?name=subidas/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px; margin-left: 18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
    </tr>
 <?php }?> 

  </tbody>
</table>
</div>
</div>
<!-- Fin tabla--> 
<a href="../suministros.php" class="btn btn-warning"  style=" width: 150px; float: left; margin-left: 0%; margin-top: 5px;">Regresar</a>

  </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
