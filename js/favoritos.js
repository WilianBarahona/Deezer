function agregarCancion(id){
	var id_usuario = $("#id_usuario").val();
	$.ajax({
		url:"ajax/gestionar-cancion.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"agregar-favorito",
			"id_cancion":id,
			"id_usuario":id_usuario
		},
		success:function(respuesta){
			console.log(respuesta);
			if(respuesta){
				$.alert("Se agregó favorita");
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