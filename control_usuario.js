
function btn_guardar_dato()
{
	 var nombre = $("#nombre").val();
	 var datos = $("#apellido").val();
	 var domicilio = $("#edad").val();

	 //alert(nombre+" - "+apellido+" - "+edad);

	 var ob = {nombre:nombre, datos:datos, domicilio:domicilio};

	 $.ajax({
                type: "POST",
                url:"modelo/modelo_registrar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_respuesta").html(data);
                 btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_respuesta").html("");
                 },2000);
                

                }
             });
}

function btn_listar_datos()
{
   var nombre = $("#nombre").val();
	 var ob = {nombre:nombre};

	 $.ajax({
                type: "POST",
                url:"modelo/modelo_objeto_contratacion.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_listado").html(data);

                }
             });
}

function btn_editar(ID_usuario)
{
	 var ob = {ID_usuario:ID_usuario};

	 $.ajax({
                type: "POST",
                url:"../vista/vista_editar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_editar").html(data);   

                }
             });
}
function btn_guardar_proveedor(){

   var nombre = $("#datoPersonalProveedor").val();
   var datos = $("#domicilioPersonal").val();
   var domicilio = $("#telefono").val();
   var email = $("#correoElectronico").val();
  
   var procedimiento = $("#numeroDeProcedimiento").val();
   var rfc = $("#rfc").val();
   var direccionInternet = $("#direccionInternet").val();

   //alert(nombre+" - "+apellido+" - "+edad);

   var ob = {nombre:nombre, datos:datos, domicilio:domicilio, email:email, procedimiento:procedimiento, rfc:rfc, direccionInternet:direccionInternet};

   $.ajax({
               type: "POST",
               url:"../registrarProveedor.php",
               data: ob,
               beforeSend: function(objeto){
               
               },
               success: function(data)
               { 
                
                $("#my_Modal_proveedor").html(data);
                //btn_listar_datos();

                setTimeout(function(){
                 $("#panel_respuesta_edicion").html("");
                },2000);

                setTimeout(function(){
                 $("#myModal_proveedor").modal("hide").fadeIn("slow");
                },2500);

                setTimeout(function(){
                 btn_listar_datos();
                },3000);
               

               }
            });
}

function btn_guardar_edicion()
{    
    var ID_usuario = $("#ID_usuario").val();
	 var nombre = $("#nombre_ed").val();
	 var datos = $("#apellido").val();
	 var domicilio = $("#edad").val();

	 //alert(nombre+" - "+apellido+" - "+edad);

	 var ob = {nombre:nombre, datos:datos, domicilio:domicilio,ID_usuario:ID_usuario};

	 $.ajax({
                type: "POST",
                url:"modelo/modelo_guardar_datos.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_respuesta_edicion").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_respuesta_edicion").html("");
                 },2000);

                 setTimeout(function(){
                  $("#myModal_editar").modal("hide").fadeIn("slow");
                 },2500);

                 setTimeout(function(){
                  btn_listar_datos();
                 },3000);
                

                }
             });
}


function btn_eliminar_dato(cucop)
{
	 var ob = {cucop:cucop};

	 $.ajax({
                type: "POST",
                url:"modelo/model_vista_eliminar_objeto.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_eliminar").html(data);

                }
             });
}



function btn_eliminar_dato(cucop)
{    
   

	 var ob = {cucop:cucop};

	 $.ajax({
                type: "POST",
                url:"frontend/eliminaRegistr.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_eliminar").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_eliminar").html("");
                 },600);

                 setTimeout(function(){
                  $("#myModal_eliminar").modal("hide").fadeIn("slow");
                 },600);

                 setTimeout(function(){
                  btn_listar_datos();
                 },800);
                

                }
             });
}


function select_datos_medicamento()
{ //id="select_usuario"
  
 var ID_usuario =  $("#select_usuario").val();
 
// alert("Hola select = "+ID_usuario);

    var ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"modelo/modelo_mostar_descripcion.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_selector").html(data);
            
                }
             });
}
function select_medic()
{ //id="select_usuario"
  
 var ID_usuario =  $("#select_medic").val();
 
// alert("Hola select = "+ID_usuario);

    var ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_listaMedicamento.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}