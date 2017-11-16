$(document).ready(function(){
	listarArtistas();
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
				'	<td>'+albumes.album_cover_url + '</td>'+
				'	<td>'+albumes.nombre_album +'</td>'+
				'	<td>'+albumes.nombre_artista+'</td>'+
				'	<td>'+albumes.anio + '</td>'+
				'  	<td><button onclick="editarIdioma('+albumes.id_album+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
				'  	<button onclick="eliminarIdioma('+albumes.id_album+') class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
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
					$("#tbl-artistas tbody").html("");
					limpiar();
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
