function btn_buscar_medicamentocons()
{ 
  
 let ID_usuario =  $("#buscardorcons").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_ListaMedicamentoConsol.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
         
                }
             });
}
function select_mediccons()
{ 
  
 let ID_usuario =  $("#select_mediccons").val();


    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_ListaMedicamentoCons.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

function select_contcons()
{ 
  
 let ID_usuario =  $("#select_contratcons").val();

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_contratoProveedorCons.php",
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

