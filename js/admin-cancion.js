$(document).ready(function(){
	$.ajax({
		url:"../ajax/gestionar-artista.php",
		method:"POST",
		dataType: "JSON",
		data:{
			"accion":"listar_artistas"
		},
		success: function(respuesta){
			for(var i = 0; i < respuesta.length; i++)
			{
				var artistas = respuesta[i];
				$("#slc-artista").append(
					'<option value="'+artistas.id+'">'+artistas.nombre+'</option>'
				);
			}
		},
		error:function(error){
			console.log(error);
		}
	});
});