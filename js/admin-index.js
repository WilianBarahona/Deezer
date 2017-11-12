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
	var nombreGenero = $("#txt-nombre-genero").val()
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
// LLENADO TBL-GENEROS
function llenarTablaArtistas(idArtista){
	
}

// INSERTAR ARTISTA

// EDITAR UN ARTISTA
function editarArtista(idArtista){

}

//ELIMINAR ARTISTA
function eliminarArtista(idArtista){

}

