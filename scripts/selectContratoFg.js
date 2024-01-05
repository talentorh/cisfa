function select_numerocontrato(){
    let ID_usuario=$("#select_numerocontrato").val();
    let ob={ID_usuario:ID_usuario};
        $.ajax({
            type:"POST",
            url:"consultaNumeroContratoFG.php",
            data:ob,
            beforeSend:function(objeto){
                swal({
                    title:'¡Seleccionado!',
                    text:'',
                    type:'success',
                    timer:1000,
                    showConfirmButton:false})},
                success:function(data){
                    $("#tabla_resultado").html(data)
                }
        }
    )
}
function select_contrato(){
    let ID_usuario=$("#select_contrato").val();
    let ob={ID_usuario:ID_usuario};
        $.ajax({
            type:"POST",
            url:"consultaFG.php",
            data:ob,
            beforeSend:function(objeto){
                swal({title:'¡Seleccionado!',
                text:'',
                type:'success',
                timer:1000,
                showConfirmButton:false
                }
            )},
            success:function(data){
                $("#tabla_resultado").html(data)
            }
        }
    )
}
function select_tipoFarm(){
    let ID_usuario=$("#select_tipoFarm").val();
    let ob={ID_usuario:ID_usuario};
    $.ajax({
        type:"POST",
        url:"consultaTipoContratoFG.php",
        data:ob,
        beforeSend:function(objeto){
            swal({
                title:'¡Seleccionados!',
                text:'',
                type:'success',
                timer:1000,
                showConfirmButton:false
            }
        )
    },
    success:function(data){
        $("#tabla_resultado").html(data)
    }
    }
    )}
    function select_proveedor(){
        let ID_usuario=$("#select_proveedor").val();
        let ob={ID_usuario:ID_usuario};
        $.ajax({
            type:"POST",
            url:"consultaProveedorFG.php",
            data:ob,
            beforeSend:function(objeto){
                swal({
                    title:'¡Seleccionado!',
                    text:'',type:'success',
                    timer:1000,
                    showConfirmButton:false
                }
            )},
            success:function(data){
                $("#tabla_resultado").html(data)
            }
        })
    }