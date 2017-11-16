$(document).ready(function(){
	listarArtistas();
	listarAlbumes();
	$("#btn-actualizar-album").hide();
});

function listarAlbumes(){
	$.ajax({
		url:"../ajax/gestionar-album.php",
		method:"POST",
		dataType: "JSON",
		data:{
			"accion":"listar-todos"
		},
		success: function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
				var albumes = respuesta[i];
				var fila = 
				'<tr id="tbl-albumes-fila-'+albumes.id_album+'">'+
				'	<td><img class="img img-circle img-responsive" src="../'+albumes.album_cover_url+'" title="'+albumes.nombre_album+'"></td>'+
				'	<td>'+albumes.nombre_album +'</td>'+
				'	<td>'+albumes.nombre_artista+'</td>'+
				'	<td>'+albumes.anio + '</td>'+
				'  	<td><button onclick="editarAlbum('+albumes.id_album+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
				'  	<button onclick="eliminarAlbum('+albumes.id_album+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
				'	</tr>';
				$("#div-albumes #tbl-albumes tbody").append(fila);
			}
		},
		error: function(e)
		{

		}
	});
}

function listarArtistas(){
		$.ajax({
		url:"../ajax/gestionar-artista.php",
		method:"POST",
		dataType: "JSON",
		data:{
			"accion":"listar-todos"
		},
		success: function(respuesta){
			for(var i = 0; i < respuesta.length; i++)
			{
				var artistas = respuesta[i];
				var fila = 
				'<option value="'+artistas.id_artista+'">'+artistas.nombre_artista+'</option>';
				$("#slc-artista").append(fila);
			}
		},
		error:function(error){
			console.log(error);
		}
		});
	}


	$("#file-foto-album").change(function(){
	var formData = new FormData($("#form-foto-album")[0]);
	$("#lista-carga-foto-album").hide();
	$("#carga-foto-album").show();
	$.ajax({
	    url: "../ajax/subir-imagen.php",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,
	    dataType:"JSON",
	    success:function(respuesta){
			if(respuesta.status){
				$("#txt-url-foto-album").val("img/"+respuesta.ruta);
				$("#lista-carga-foto-album").show();
			}else{
				$.alert(respuesta.mensaje);
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			$("#carga-foto-album").hide();
		}
	});
});

$("#btn-guardar-album").click(function(){
	var idArtista = $("#slc-artista").val();
	var nombreAlbum = $("#txt-nombre-album").val();
	var fecha = $("#txt-fecha").val();
	var url = $("#txt-url-foto-album").val();
	if(nombreAlbum!="")
	{
		$.ajax({
			url: "../ajax/gestionar-album.php",
			method: "POST",
			dataType: "JSON",
			data:{
				"accion":"insertar-registro",
				"id_artista":idArtista,
				"nombre_album":nombreAlbum,
				"anio":fecha,
				"album_cover_url":url
			},
			success:function(respuesta){
				if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se insertó el registro'
					});
					$("#lista-carga-foto-album").hide();
					$("#tbl-artistas tbody").html("");
					limpiar();
					listarAlbumes();
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

$("#btn-actualizar-album").click(function(){
	var idAlbum = $("#txt-id-album").val();
	var idArtista = $("#slc-artista").val();
	var nombreAlbum = $("#txt-nombre-album").val();
	var fecha = $("#txt-fecha").val();
	var url = $("#txt-url-foto-album").val();
	if(nombreAlbum!="")
	{
		$.ajax({
			url: "../ajax/gestionar-album.php",
			method:"POST",
			data:{
				"accion":"actualizar-registro",
				"id_album":idAlbum,
				"id_artista":idArtista,
				"nombre_album":nombreAlbum,
				"anio":fecha,
				"album_cover_url":url
			},
			dataType: "JSON",
			success: function(respuesta){
				if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se actualizo el registro'
					});
				}
				else
				{
					$.alert({
						title: '¡Ocurrió un problema!',
						content: 'No se pudo actualizar el registro'
					});
				}
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){
				$("#lista-carga-foto-album").hide();
				$("#btn-actualizar-album").hide();
				$("#btn-guardar-album").show();
				limpiar();
				$("#tbl-albumes tbody").html("");
				listarAlbumes();
			}
		});
	}
});

function editarAlbum(idAlbum)
{
	$("#lista-carga-foto-album").hide();
	$("#btn-guardar-album").hide();
	$("#btn-actualizar-album").show();
	$.ajax({
		url:'../ajax/gestionar-album.php',
		type: 'POST',
		data:{
			"accion":"seleccionar",
			"id_album":idAlbum
		},
		dataType: "JSON",
		success:function(respuesta){
			if(respuesta)
			{
				$.alert({
					title: 'Editar registro',
					content: 'Modifica los campos que lo necesiten'
				});
				$("#txt-url-foto-album").val(respuesta.album_cover_url);
				$("#slc-artista").val(respuesta.id_artista);
				$("#txt-nombre-album").val(respuesta.nombre_album);
				$("#txt-fecha").val(respuesta.anio);
				$("#txt-id-album").val(idAlbum);
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
}

function eliminarAlbum(idAlbum){
	$.ajax({
		url:"../ajax/gestionar-album.php",
		method: "POST",
		data: {
			"accion":"eliminar-registro",
			"id_album":idAlbum
		},
		dataType: "JSON",
		success: function(resultado){
			if(resultado)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se elimino el registro'
					});
					$("#tbl-albumes tbody").html("");
					listarAlbumes();
				}
				else
				{
					$.alert({
						title: '¡Ocurrió un problema!',
						content: 'No se pudo eliminar el registro'
					});
					$("#tbl-albumes tbody").html("");
					listarAlbumes();
				}
			},
			error:function(e){
				console.log(e);
			},
			complete: function(respuesta){
			}
	});
}

function limpiar(){
	$("#txt-nombre-album").val('');
	$("#txt-fecha").val('');
	$("#slc-artista").val('');
}