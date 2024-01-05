<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registrar usuario</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="icono/icono.ico" rel="shortcut icon">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    
<link rel="stylesheet" href="frontend/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="frontend/css/signup-form.css" type="text/css" />

</head>

<body>

<div class="container">

<div class="signup-form-container">

     <!-- form start -->
     
<form role="form" id="register-form" action="registraUsuario" method="post" class="form" autocomplete="off">
     
     <div class="form-header">
      <h3 class="form-title"><i class="fa fa-user"></i> Registrar Usuario</h3>
                  
     <div class="pull-right">
         <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
     </div>
                  
     </div>
     
     <div class="form-body">
    
        <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
               <input name="name" type="text" class="form-control" placeholder="Nombre" required="required">
               </div>
               <span class="help-block" id="error"></span>
          </div>

          <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
               <input name="primerApellido" type="text" class="form-control" placeholder="Apellido paterno" required="requiered">
               </div>
               <span class="help-block" id="error"></span>
          </div>

          <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
               <input name="segundoApellido" type="text" class="form-control" placeholder="Apellido materno">
               </div>
               <span class="help-block" id="error"></span>
          </div>
                    
          <div class="form-group">
               <div class="input-group">
               <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
               <input name="correo" type="email" class="form-control" required="required" placeholder="Correo electronico">
               </div> 
               <span class="help-block" id="error"></span>                     
          </div>
          
                    
          <div class="row">
                    
               <div class="form-group col-lg-6">
                    <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" required="required">
                    </div>  
                    <span class="help-block" id="error"></span>                    
               </div>
                        
               <div class="form-group col-lg-6">
                    <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <input name="cpassword" type="password" class="form-control" placeholder="Retype Password" required="required">
                    </div>  
                    <span class="help-block" id="error"></span>                    
               </div>
</div>  
<div align="center"> 
<p>Seleccione el rol del nuevo usuario:</p>
<select name="id_rol" id="rol" class="form-control" style="height: 37px;" required="required">
<option value="">-Seleccione-</option>
        <option  value="1">Todos los privilegios</option>
        <option  value="2">Cargar, Editar y Consultar</option>
        <option  value="3">Consultar y Editar</option>
    </select>
</div> 
                
</div>
        
        <div class="form-footer">
        
             <input type="submit" class="btn btn-info" name="almacenar" value="Registrar">
             <input type="submit"  value="Cerrar" name="submit" class="btn btn-danger" onclick="window.close()"/>
             
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
<script src="frontend/bootstrap/js/bootstrap.min.js"></script>

        </form>
       </div>
</div>
    
 
</body>
</html>