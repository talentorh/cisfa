function btn_buscar_medicamentobus()
{ 
  
 let ID_usuario =  $("#buscardor").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_listaMedicamentobusFG.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultadobus").html(data);
         
                }
             });
}
function select_medica()
{ 
  
 let ID_usuario =  $("#select_medicam").val();

    let ob = {ID_usuario:ID_usuario};

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

function select_cont()
{ 
  
 let ID_usuario =  $("#select_contrat").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_contratoProveedor.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

function select_grupo()
{ 
  
 let ID_usuario =  $("#select_grupo").val();

    let ob = {ID_usuario:ID_usuario};

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
function select_year()
{ 
  
 let ID_usuario =  $("#select_year").val();

    let ob = {ID_usuario:ID_usuario};

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
