function tipoFarmacia3()
{ 

   let ID_usuario =  $("#tipo4").val();
   let year = $("#year2").val();
      let ob = {ID_usuario:ID_usuario, year:year};

      $.ajax({
                  type: "POST",
                  url:"consultaSuministrosFG.php",
                  data: ob,
                  beforeSend: function(objeto){
                  
                  },
                  success: function(data)
                  { 
                  
                  $("#tabla_resultado2").html(data);
            
                  }
               });
}
function tipoFarmacia4()
{ 

   let ID_usuario =  $("#tipo5").val();
   let year = $("#year3").val();
      let ob = {ID_usuario:ID_usuario, year:year};

      $.ajax({
                  type: "POST",
                  url:"consultaSuministrosFG.php",
                  data: ob,
                  beforeSend: function(objeto){
                  
                  },
                  success: function(data)
                  { 
               
                  $("#tabla_resultado").html(data);
            
                  }
               });
}

  
