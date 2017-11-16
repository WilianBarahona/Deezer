$(document).ready(function(){
	listarTodos();
	cargarVisibilidad();
	cargarUsuarios();
});

function cargarVisibilidad(){
	$.ajax({
		url: "../ajax/gestionar-tipo-visibilidad.php",
		method:"POST",
		data:{"accion":"seleccionar"},
		dataType:"JSON",
		success:function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
				var visibilidad = respuesta[i];
				var fila = 
							'<option value = "'+visibilidad.id_tipo_visibilidad+'">'+visibilidad.tipo_visibilidad+'</option>';
				$("#slc-tipo-visibilidad").append(fila);
			}
		},
		error:function(error){
			console.log(error);
		}
	});
};

function cargarUsuarios(){
	$.ajax({
		url: "../ajax/gestionar-usuario.php",
		method:"POST",
		data:{"accion":"listar-todos"},
		dataType:"JSON",
		success:function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
				var usuario = respuesta[i];
				var fila = 
							'<option value = "'+usuario.id_usuario+'">'+usuario.usuario+ '</option>';
				$("#slc-nombre-usuario").append(fila);
			}
		},
		error:function(error){
			console.log(error);
		}
	});
};

function listarTodos(){
	$.ajax({
		url: "../ajax/gestionar-playlist.php",
		method:"POST",
		data:{"accion":"listar-todos"},
		dataType:"JSON",
		success:function(respuesta){
			$("#div-playlists #tbl-playlists tbody").empty();
			for (var i = 0; i < respuesta.length; i++) {
				var playlist = respuesta[i];
				var fila = 
				'<tr id="tbl-playlists-fila-'+playlist.id_playlist+'">'+
				'	<td><img class="img img-circle img-responsive" src="../'+playlist.url_foto_playlist+'" title="'+playlist.nombre_playlist+'"></td>'+
				'  <td>'+playlist.tipo_visibilidad+'</td>'+
				'  <td>'+playlist.nombre_playlist+'</td>'+
				'  <td>'+playlist.nombre_usuario+'</td>'+
				'  <td><button onclick="editarPlaylist('+playlist.id_playlist+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
				'  <button onclick="eliminarPlaylist('+playlist.id_playlist+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
				'</tr>';

				$("#div-playlists #tbl-playlists tbody").append(fila);
			}
		},
		error:function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
}

function seleccionarPlaylist(idplaylist){
	$.ajax({
		data:{
				"accion":"seleccionar"
			},
		url:'../ajax/gestionar-playlist.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
				console.log(respuesta);
		},
		error:function(error){
			console.log(error);
		}
	});
	
};

function editarPlaylist(idplaylist){
	$("#btn-guardar-playlist").hide();
	$("#btn-actualizar-playlist").show();
	$.ajax({
		url: '../ajax/gestionar-playlist.php',
		type: 'POST',
		data: {
			"accion":"seleccionar", 
			"id_playlist": idplaylist
		},
		dataType: 'JSON',
		success: function(respuesta){
			$("#txt-id-playlist").val(respuesta.id_playlist);
			//$("#slc-tipo-visibilidad").val(respuesta.tipo_visibilidad);
			$("#txt-nombre-playlist").val(respuesta.nombre_playlist);
			//$("#slc-nombre-usuario").val(respuesta.nombre_usuario);
			$("#txt-url-foto-playlist").val(respuesta.url_foto_playlist);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}

	});	
	
};

$("#btn-actualizar-playlist").click(function(){
	var id = $("#txt-id-playlist").val();
	var visibilidad=$("#slc-tipo-visibilidad").val();
	var nombre=$("#txt-nombre-playlist").val();
	var usuario=$("#slc-nombre-usuario").val();
	var url=$("#txt-url-foto-playlist").val();
	$.ajax({
		url:"../ajax/gestionar-playlist.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"actualizar-registro",
			"id_playlist": id,
			"id_tipo_visibilidad": visibilidad,
			"nombre_playlist": nombre,
			"id_usuario": usuario,
			"url_foto_playlist":url
		},
		success:function(respuesta){
			if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se actualizo el registro'
					});
					listarTodos();
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
			//TO-DO
			
			$("#btn-actualizar-playlist").hide();
			$("#btn-guardar-playlist").show();
			$("#txt-id-playlist").val("");
			$("#txt-nombre-playlist").val("");
			$("#txt-url-foto-playlist").val("");
		}
	});
});

function eliminarPlaylist(codigo){
	var codigoPlaylist = codigo;
	$.ajax({
		data:{
			"accion":"eliminar-registro",
			"id_playlist":codigoPlaylist
			},
		url:'../ajax/gestionar-playlist.php',
		method:'POST',
		success:function(respuesta){
			if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se elimino el registro'
					});
					$("#div-busqueda #tbl-busquedas tbody").empty();
					listarTodos();
				}
				else
				{
					$.alert({
						title: '¡Ocurrió un problema!',
						content: 'No se pudo eliminar el registro'
					});
				}
		},
		error:function(error){
			alert(error);
		}
	})
};

$("#file-foto-playlist").change(function(){
	var formData = new FormData($("#form-foto-playlist")[0]);
	$("#lista-carga-foto-playlist").hide();
	$("#carga-foto-playlist").show();
	$.ajax({
	    url: "../ajax/subir-imagen.php",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,
	    dataType:"JSON",
	    success:function(respuesta){
			if(respuesta.status){
				$("#txt-url-foto-playlist").val("img/"+respuesta.ruta);
				$("#lista-carga-foto-playlist").show();
			}else{
				$.alert(respuesta.mensaje);
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			$("#carga-foto-playlist").hide();
		}
	});
});

$("#btn-guardar-playlist").click(function(){
	var visibilidad=$("#slc-tipo-visibilidad").val();
	var nombre=$("#txt-nombre-playlist").val();
	var usuario=$("#slc-nombre-usuario").val();
	var url=$("#txt-url-foto-playlist").val();
	$.ajax({
		data:{"accion":"insertar-registro",
			  "id_tipo_visibilidad":visibilidad,
			  "nombre_playlist":nombre,
			  "id_usuario":usuario,
			  "url_foto_playlist":url
			},
		url:'../ajax/gestionar-playlist.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
				if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se insertó el registro'
					});
					$("#tbl-artistas tbody").html("");
					listarTodos();
				}
				else
				{
					$.alert({
						title: '¡Ocurrió un problema!',
						content: 'No se pudo ingresar el registro'
					});
				}
		},
		error:function(error){
			console.log(error);
		}
	})
});


function buscarPlaylist(){
	var parametros = $("#txt-busqueda").val();
	if(parametros != ''){
		$.ajax({
			data:{
				"accion":"buscar-registro",
			    "txt-busqueda":parametros
			},
			url:'../ajax/gestionar-playlist.php',
			method:'POST',
			dataType:'JSON',
			success:function(respuesta){
				$("#div-busqueda #tbl-busquedas tbody").empty();
				var playlist = respuesta;
				var fila = 
				'<tr id="tbl-playlists-fila-'+playlist.id_playlist+'">'+
				'  <td>'+playlist.tipo_visibilidad+'</td>'+
				'  <td>'+playlist.nombre_playlist+'</td>'+
				'  <td>'+playlist.nombre_usuario+'</td>'+
				'  <td>'+playlist.url_foto_playlist+'</td>';
				if(playlist.nombre_playlist != 'not founded'){
						fila += '  <td><button onclick="editarPlaylist('+playlist.id_playlist+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
								'  <button onclick="eliminarPlaylist('+playlist.id_playlist+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
								'</tr>';
				}
				$("#div-playlists #tbl-busquedas").append(fila);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	
};