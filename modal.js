$(document).ready(function(){  
    $('.btn-danger').click(function(e){   
    e.preventDefault();   
    var id = $(this).attr('data-emp-id');
    var parent = $(this).parent("td").parent("tr");   
    bootbox.dialog({
    message: "Estas seguro que quieres borrarlo ?",
    title: "<i class='glyphicon glyphicon-trash'</i> Borrar !",
    buttons: {
    success: {
          label: "No",
          className: "btn-success",
          callback: function() {
            $('.modal-backdrop').remove();
            location.reload();
      }
   
    },
    danger: {
      label: "Borrar!",
      className: "btn-danger",
      callback: function() {       
       $.ajax({        
            type: 'POST',
            url: 'modelo/eliminar_contrato_Proveedor.php',
            data: 'eliminar='+id        
       })
       .done(function(response){        
            bootbox.alert(response);
            parent.fadeOut('slow');        
       })
       .fail(function(){        
            bootbox.alert('Error....');               
       })              
      }
                    }
               }
          });   
     });  
});