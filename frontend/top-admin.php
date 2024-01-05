<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Administracion WEB">


    <title>Administración</title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" href="../favicon.ico" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/css/fontawesome-all.css" crossorigin="anonymous">
    <script defer src="../fonts/js/fontawesome-all.js"></script>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
    
<style>
  /*.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
 /* Set the fixed height of the footer here */
 /* Vertically center the text there 

}*/
.footer {

width: 100%;
position: fixed; /* Fija el contenedor a una posición */
bottom: 0px; /* El div se sitúa abajo */
z-index: 10; /* Lo muestra por encima de otros div */

 }

</style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md " style="background:green">
      <a class="navbar-brand" href="#" style="color:white">Creación de exmanes</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php" style="color:white"> <i class="fas fa-home" style="color:white"></i> Principal<span class="sr-only">(current)</span></a>
          </li>



          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-outline-primary" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white"><i class="fas fa-wrench" style="color:white"></i> Categorias</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="eva_categoria.php" ><i class="fas fa-tag"></i> Crear Categoria</a>
         
            </div>
          </li>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle btn btn-outline-primary" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white"> <i class="far fa-edit" style="color:white"></i>  Evaluaciones</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="eva_nueva.php"><i class="fas fa-pencil-alt"></i> Crear Evaluación</a>
              <a class="dropdown-item" href="index.php"><i class="far fa-file-alt"></i> Ver Evaluaciones</a>
            </div>
          </li>


  


        </ul>

        <form class="form-inline my-2 my-lg-0">
      
      <a class="nav-link btn-danger active" href="../cerrarsesion.php" style="background: blue; border-radius: 10px"><i class="fas fa-sign-out-alt" ></i> Cerrar</a>
    </form>

      </div>
    </nav>
<div class="container">
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


<!--<ul class="dropdown-menu" role="menu">
            <li><a href="eva_categoria.php"><img src="../iconos/add.png"> Crear Categoria</a></li>
            <li><a href="eva_colegio.php"><img src="../iconos/application_home.png"> Añadir Colegio</a></li>
            <li><a href="nuevo.php"><img src="../iconos/icon-16-user-dd.png"> Nuevo Alumno</a></li>
            <li><a href="eva_nueva.php"><img src="../iconos/publish_g.png"> Crear Evaluación</a></li>
            <li><a href="eva_mostrar.php"><img src="../iconos/book_open.png"> Ver Evaluaciones</a></li>  
          <li><a href="ver_registros.php" ><img src="../iconos/icon-16-contacts.png"> Ver Registrados</p></a></li>
        <li><a href="../cerrarsesion.php" ><p class="rojo"> Cerrar Sesión</p></a></li>                     
          </ul>-->