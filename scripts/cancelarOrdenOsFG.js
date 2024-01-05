function select(val)
{
    
    
    $.ajax({
        type: "POST",
        url: 'consultaContratoResFG.php',
        data: 'id_datoProveedor='+val,
        success: function(resp){
            $('#tabla_rest').html(resp);
           
        }
        
    });
    
}
function cancela(val)
{
    let valor = $("#tabla_rest").val();
    
    $.ajax({
        type: "POST",
        url: 'consultaContratoClave.php',
        data: 'id_datoProveedor='+valor,
        success: function(resp){
          
            $('#tabla_rests').html(resp);
        }
        
    });
    
}

function btn_buscar_orden()
{ 
  
 let ID_usuario =  $("#buscar").val();
 

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"cancelaOrden.php",
                data: ob,
                success: function(data)
                { 
                 
            
                }
             });
}
  