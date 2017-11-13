$(document).ready(function(){
	listarArtistas();
	listarGeneros();
	listarIdiomas();
});

	function listarArtistas(){
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
	}

	function listarGeneros(){
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
	}

	function listarIdiomas(){
		$.ajax({
			url:"../ajax/gestionar-idioma.php",
			method:"POST",
			dataType: "JSON",
			data:{
				"accion":"listar_idiomas"
			},
			success: function(respuesta){
				for(var i = 0; i < respuesta.length; i++)
				{
					var idioma = respuesta[i];
					$("#slc-idioma").append(
						'<option value="'+idioma.id_idioma+'">'+idioma.nombre_idioma+'</option>'
					);
				}
			},
			error:function(error){
				console.log(error);
			}
		});
	}

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
						'<option value="'+albumes.id_album+'">'+ albumes.nombre_album +'</option>'
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


/*EXAMINAR-CHANGE*/
$("#file-cancion").change(function(){
	var formData = new FormData($("form-cancion")[0]);
	$("#lista-carga-cancion").hide();
	$("#carga-foto-cancion").show();
	$.ajax({
		url: "../ajax/subir-cancion.php",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		dataType: "JSON",
		success:function(respuesta){
			if(respuesta.status){
				$("#txt-url-cancion").val("music/"+respuesta.ruta);
				$("#lista-carga-cancion").show();
			}
			else{
				$.alert(respuesta.mensaje);
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){			
			$("#carga-foto-cancion").hide();
		}
	});
});


function limpiarSelect(){
	$('#slc-album')
    .find('option')
    .remove()
    .end()
	;
}