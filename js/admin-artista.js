//CARGAR TABLA DE ARTISTAS

$(document).ready(function(){
	$.ajax({
		url:"../ajax/get-info.php",
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
})