// CARGAR PAISES
$(document).ready(function(){
	$.ajax({
		url:"../ajax/gestionar-pais.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"listar_paises"
		},
		success:function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
				var pais=respuesta[i];
				$("#slc-pais-artista").append(
					'<option value="'+pais.id+'">'+pais.pais+'</option>'
				);
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
});

//CARGAR TABLA DE ARTISTAS

$(document).ready(function(){
	$.ajax({
		url:"../ajax/gestionar-artista.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"listar_artistas"
		},
		success:function(respuesta){
			console.log(respuesta);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
});

$("#file-foto-artista").change(function(){
	var formData = new FormData($("#form-foto-artista")[0]);
	$("#lista-carga-foto-artista").hide();
	$("#carga-foto-artista").show();
	$.ajax({
	    url: "../ajax/subir-imagen.php",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,
	    dataType:"JSON",
	    success:function(respuesta){
			if(respuesta.status){
				$("#txt-url-foto-artista").val("img/"+respuesta.mensaje);
				$("#lista-carga-foto-artista").show();
			}else{
				$.alert(respuesta.mensaje);
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			$("#carga-foto-artista").hide();
		}
	});
});