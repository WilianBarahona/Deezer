function cargarGeneros(){
	$.ajax({
		url:"ajax/get-info.php",
		method:"POST",
		data:{"accion":"get_albumes"},
		
		error:function(error){
			alert("hubo un Error")
			console.log(error);
		},
		success:function(respuesta){
			alert("All is very Perfect");
			$("#float-bar-content").html(respuesta);
		}
		
	});
}