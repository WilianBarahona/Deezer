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

	$.ajax({
		url:"../ajax/gestionar-genero.php",
		method:"POST",
		dataType: "JSON",
		data:{
			"accion":"listar_generos"
		},
		success: function(respuesta){
			for(var i = 0; i < respuesta.length; i++)
			{
				var generos = respuesta[i];
				$("#slc-genero").append(
					'<option value="'+generos.id+'">'+generos.nombre+'</option>'
				);
			}
		},
		error:function(error){
			console.log(error);
		}
	});
});


	$("#slc-artista").change(function(){
		var codigoArtista = $("#slc-artista").val();
		limpiarSelect();
		$.ajax({
			url: "../ajax/gestionar-album.php",
			method: "POST",
			dataType:"JSON",
			data: {
				"accion":"listar_albumes_por_codigo",
				"codigo_artista":codigoArtista
			},
			success: function(respuesta){
				for(var i = 0; i < respuesta.length; i++)
				{
					var albumes = respuesta[i];
					$("#slc-album").append(
						'<option value="'+albumes.id+'">'+ albumes.nombreAlbum +'</option>'
					);
				}
			},
			error:function(error){
				console.log(error);
			}
		});
	});

$("btn-guardar-cancion").click(function(){
	var idArtista = $("#slc-artista").val();
	var idAlbum = $("#slc-album").val();
	var idGenero = $("#slc-genero").val();
	var nombre = $("#txt-nombre-cancion").val();
	var url = $("#txt-nombre-cancion").val();
	if(nombre!=""){
		$.ajax({
			url: "../ajax/gestionar-cancion.php",
			method:"POST",
			dataType: "JSON",
			data:{
				"accion":"insertar_cancion",
				"id_artista":idArtista,
				"id_album":idAlbum,
				"id_genero":idgenero,
				"nombre":nombre,
				"url":url
			},
			success:function(respuesta){
				if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se insertó el registro'
					});
					$("#tbl-artistas tbody").html("");
					llenarTablaArtistas();
				}
				else
				{
					$.alert({
						title: '¡Ocurrió un problema!',
						content: 'No se pudo ingresar el registro'
					});
				}
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){

			}
		});
	}
});





function limpiarSelect(){
	$('#slc-album')
    .find('option')
    .remove()
    .end()
	;
}