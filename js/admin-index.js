$(document).ready(function(){
	llenarTablaGeneros();
});


//######################################## GENEROS

// LLENADO TBL-GENEROS
function llenarTablaGeneros(){
	$.ajax({
		url: "../ajax/gestionar-genero.php",
		method:"POST",
		data:{"accion":"listar_generos"},
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
		},
		complete: function(){
			//TO-DO
		}
	});
}

// INSERTAR GENERO
$("#btn-guardar-genero").click(function() {
	var nombreGenero = $("#txt-nombre-genero").val();
	if(nombreGenero!=""){
		$.ajax({
			url:"../ajax/gestionar-genero.php",
			method:"POST",
			dataType:"JSON",
			data:{
				"accion":"insertar_genero",
				"nombre_genero":nombreGenero
			},
			success:function(respuesta){
				if (respuesta==true) {
					$.alert({
						title: '¡Éxito!',
						content: 'Se insertó registro'
					});
					$("#tbl-generos tbody").html("");
					llenarTablaGeneros();
				}else{
					$.alert({
						title: '¡Ocurrió un problema!',
						content: 'No se pudo ingresar registro'
					});
				}
			},
			error: function(error){
				console.log(error);
			},
			complete: function(){
			//TO-DO
			$("#txt-nombre-genero").val("");
			}
		});
	}
});

// EDITAR UN GENERO
function editarGenero(idGenero){
	$("#btn-guardar-genero").hide();
	$("#btn-actualizar-genero").show();
	$.ajax({
		url: '../ajax/gestionar-genero.php',
		type: 'POST',
		data: {
			"accion":"seleccionar_genero", 
			"id_genero": idGenero
		},
		dataType: 'JSON',
		success: function(respuesta){
			$("#txt-nombre-genero").val(respuesta.nombre);
			$("#txt-id-genero").val(respuesta.id);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}

	});	
}

$("#btn-actualizar-genero").click(function(){
	var nombreGenero=$("#txt-nombre-genero").val();
	var idGenero=$("#txt-id-genero").val();
	$.ajax({
		url:"../ajax/gestionar-genero.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"actualizar_genero",
			"id_genero": idGenero,
			"nombre_genero": nombreGenero
		},
		success:function(respuesta){
			if (respuesta==true) {
				$.alert({
					title: '¡Éxito!',
					content: 'Se actualizó registro'
				});
				$("#tbl-generos tbody").html("");
				llenarTablaGeneros();
			}else{
				$.alert({
					title: '¡Ocurrió un problema!',
					content: 'No se pudo actualizar registro'
				});
			}

		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			$("#btn-guardar-genero").show();
			$("#btn-actualizar-genero").hide();
			$("#txt-nombre-genero").val("");
		}
	});
});

function eliminarGenero(idGenero){
	$.confirm({
		title: '¡Alerta!',
		content: '¿Desea eliminar registro?',
		buttons: {
			Aceptar: function(){
				$.ajax({
					url:"../ajax/gestionar-genero.php",
					method:"POST",
					dataType:"JSON",
					data:{
						"accion":"eliminar_genero",
						"id_genero":idGenero,
					},
					success:function(respuesta){
						if (respuesta==true) {
							$.alert({
								title: '¡Éxito!',
								content: 'Se eliminó registro'
							});
							$("#tbl-generos tbody").html("");
							llenarTablaGeneros();
						}
					},
					error: function(error){
						console.log(error);
					},
					complete: function(){
						//TO-DO
					}
				});
			},
			Cancelar: function(){}
		}
	});
}

//######################################## ARTISTAS
// LLENADO TBL-ARTISTAS
function llenarTablaArtistas(idArtista){
	$.ajax({
		url: "../ajax/gestionar-artista.php",
		method: "POST",
		data: {"accion":"listar_artistas"},
		dataType: "JSON",
		success:function(respuesta){
			for(var i = 0; i < respuesta.length; i++){
				var artista = respuesta[i];
				var fila = 
				'<tr id="tbl-artistas-fila-'+artista.id+
				'	<td>'+artista.nombre+'</td>'+
				'	<td><button onclick="editarArtista('+artista.id+')"class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>'+
				'	<td><button onclick="eliminarArtista('+artista.id+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
				'</tr>';

				$("#tbl-artistas tbody").append(fila);
			}
		},
		error:function(error){
			console.log(error);
		},
		complete: function(){

		}
	});
}

// INSERTAR ARTISTA
$("#btn-guardar-artista").click(function(){
	var nombreArtista = $("#txt-nombre-artistas").val();
	var idPais = $("#slc-pais-artista").val();
	var biografia = $().val("#txt-biografia-artista");
	if(nombreArtista!=""){
		$.ajax({
			url: "../ajax/gestionar-artista.php",
			method:"POST",
			dataType:"JSON",
			data:{
				"accion":"insertar_artista",
				"nombre_artista":nombreArtista,
				"id_pais":idPais,
				"biografia_artista":biografia
			},
			success:function(respuesta){
				if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se insertó el registro'
					});
					$("#tbl-artistas tbody").html("");
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


// EDITAR UN ARTISTA
function editarArtista(idArtista){
	$("#btn-guardar-artista").hide();
	$("#btn-actualizar-artista").show();
	$.ajax({
		url: '../ajax/gestionar-artista.php',
		type: "POST",
		data:{
			"accion":"insertar_artista",
			"nombre_artista":nombreArtista,
			"id_pais":idPais,
			"biografia_artista":biografia
		}

	});
}

//ELIMINAR ARTISTA
function eliminarArtista(idArtista){

}

