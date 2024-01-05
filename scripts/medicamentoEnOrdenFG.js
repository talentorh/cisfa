function medicamento_enorden2()
{ 
 
  
 let ID_usuario =  $("#medicamento_orden2").val();
 let year = $("#year").val();

    let ob = {ID_usuario:ID_usuario, year:year};

     $.ajax({
                type: "POST",
                url:"consulta_listaMedicamentoEnOrdenFG.php",
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