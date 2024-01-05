function btn_buscar_medicamentoconsExterno()
{ 
  
 let ID_usuario =  $("#buscardorconsExterno").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_ListaMedicamentoConsolExterno.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
         
                }
             });
}
function select_medicconsExterno()
{ 
  
 let ID_usuario =  $("#select_medicconsExterno").val();


    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_ListaMedicamentoConsExterno.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

function select_medicconsExterno()
{ 
  
 let ID_usuario =  $("#select_medicconsExterno").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_contratoProveedorConsExterno.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}
function select_medicar()
{ 
  
 let ID_usuario = $("#select_medica").val();


    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_ListaMedicamentoGra.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

function consultaFarmGratuita()
{ 
  
     $.ajax({
                type: "POST",
                url:"consulta_ContratosFarmGratuita.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}
