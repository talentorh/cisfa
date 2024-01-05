function medicamento_enorden()
{ 
  
 let ID_usuario =  $("#medicamento_orden").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_listaMedicamentoEnOrden.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultados").html(data);
            
                }
             });
}

function medicamento_enordenClave()
{ 
  
 let ID_usuario =  $("#medicamento_ordenClave").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_listaMedicamentoEnOrdenClave.php",
                data: ob,
                beforeSend: function(objeto){
               
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultados").html(data);
            
                }
             });
}