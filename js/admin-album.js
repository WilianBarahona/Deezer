$(document).ready(function(){
	listarArtistas();
});

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
