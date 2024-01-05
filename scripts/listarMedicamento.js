function listarMedicamento(){
$.ajax({
                type: "POST",
                url:"consultaVerListaMedicamento.php",
          
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}