function selectClave(val)
{
    let clave = $("#clave").val();
    let dateFrom3 = $("#dateFrom3").val();
    let dateTo3 = $("#dateTo3").val();
    let ob = {clave:clave, dateFrom3:dateFrom3, dateTo3:dateTo3};
    $.ajax({
        type: "POST",
        url: 'consultaClaveParticularPromedio.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}
                    function selectCisfa(val)
{
    let lab = $("#selectCis").val();
    let dateFrom1 = $("#dateFrom1").val();
    let dateTo1 = $("#dateTo1").val();
    let ob = {lab:lab, dateFrom1:dateFrom1, dateTo1:dateTo1};
    $.ajax({
        type: "POST",
        url: 'consultaSalidaUnidadCisfa.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}
function selectDate(val)
{
    let dateFrom = $("#dateFrom").val();
    let dateTo = $("#dateTo").val();
    let ob = {dateFrom:dateFrom, dateTo:dateTo}
    $.ajax({
        type: "POST",
        url: 'consultaFechaSalidas.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}


function selectDateCovid(val)
{
    let dateFromCovid = $("#dateFromCovid").val();
    let dateToCovid = $("#dateToCovid").val();
    let ob = {dateFromCovid:dateFromCovid, dateToCovid:dateToCovid}
    $.ajax({
        type: "POST",
        url: 'consultaFechaSalidasCovid.php',
        data: ob,
        success: function(resp){
            $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}

