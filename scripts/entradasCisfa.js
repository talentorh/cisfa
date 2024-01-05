function selectClaveEntradas(val)
{
    let clave = $("#claveEntradasCisfa").val();
    let dateFrom3 = $("#dateFrom3Entradas").val();
    let dateTo3 = $("#dateTo3Entradas").val();
    let ob = {clave:clave, dateFrom3:dateFrom3, dateTo3:dateTo3};
    $.ajax({
        type: "POST",
        url: 'consultaEntradasClaveParticular.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}                 
function selectDateEntradas(val)
{
    let dateFrom = $("#dateFromEntradas").val();
    let dateTo = $("#dateToEntradas").val();
    let ob = {dateFrom:dateFrom, dateTo:dateTo}
    $.ajax({
        type: "POST",
        url: 'consultaFechaEntradas.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
        
        }
        
    });
    
}




