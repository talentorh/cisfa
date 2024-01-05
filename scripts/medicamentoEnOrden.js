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
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}
  
