$(document).ready(function(){
	listarArtistas();
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
				$("#txt-url-foto-album").val("img/"+respuesta.mensaje);
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