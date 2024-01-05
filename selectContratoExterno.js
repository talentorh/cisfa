function select_numerocontratoExterno()
{ 
  
 let ID_usuario =  $("#select_numerocontratoExterno").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaNumeroContratoExterno.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}
function select_contratoExterno()
{ 
  
 let ID_usuario =  $("#select_contratoExterno").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaExterno.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}
function select_tipoFarmExterno()
{
let ID_usuario =  $("#select_tipoFarmExterno").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaTipoContratoExterno.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
    
}
function select_proveedorExterno()
{
let ID_usuario =  $("#select_proveedorExterno").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaContratoProveedorExterno.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
    
}