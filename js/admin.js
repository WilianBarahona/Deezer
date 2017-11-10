$(document).ready(function(){
	setTblGeneros();
});


//######################################## GENEROS

// LLENADO tbl-generos
function setTblGeneros(){
	$.ajax({
		url: "../ajax/get-info.php",
		method:"POST",
		data:{"accion":"get_generos"},
		dataType:"JSON",
		success:function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
				var genero = respuesta[i];
				var fila = 
				'<tr id="tbl-generos-fila-'+genero.id+'">'+
				'  <td>'+genero.nombre+'</td>'+
				'  <td><button onclick="editarGenero('+genero.id+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>'+
				'  <td><button onclick="eliminarGenero('+genero.id+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
				'</tr>';

				$("#tbl-generos tbody").append(fila);
			}
		},
		error:function(error){
			console.log(error);
		}
	});
}

// INSERTAR GENERO
$("#btn-guardar-genero").click(function() {
	var nombreGenero = $("#txt-nombre-genero").val()
	alert(nombreGenero);
	if(nombreGenero!=""){
		$.ajax({
			url:"../ajax/post-info.php",
			method:"POST",
			dataType:"JSON",
			data:{
				"accion":"insertar_genero",
				"nombre_genero":nombreGenero
			},
			success:function(respuesta){
				if (respuesta==true) {
					$.alert({title: '¡Éxito!',content: 'Se insertó registro',});
					$("#tbl-generos tbody").html("");
					setTblGeneros();
				}else{
					$.alert({title: '¡Ocurrión un problema!',content: 'No se pudo ingresar registro',});
				}
			},
			error: function(error){
				console.log(error);
			}
		});
	}
});

// EDITAR UN GENERO
function editarGenero(idGenero){
	$("#btn-guardar-genero").hide();
	$("#btn-actualizar-genero").show();
	$.ajax({
		url: '../ajax/get-info.php',
		type: 'POST',
		data: {
			"accion":"get_genero", 
			"id_genero": idGenero
		},
		dataType: 'JSON',
		success: function(respuesta){
			$("#txt-nombre-genero").val(respuesta.nombre);
			$("#txt-id-genero").val(respuesta.id);
		},
		error: function(error){
			console.log(error);
		}
	});	
}

$("#btn-actualizar-genero").click(function(){
	var nombreGenero=$("#txt-nombre-genero").val();
	var idGenero=$("#txt-id-genero").val();

});


//######################################## ARTISTAS

