$(obtener_registros());

function obtener_registros(alumno)
{
	$.ajax({
		url : 'consultaCargaFG.php',
		type : 'POST',
		dataType : 'html',
		data : { alumnos: alumno },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});