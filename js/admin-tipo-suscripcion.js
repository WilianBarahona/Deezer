$(document).ready(function(){
	listarTipoSuscripcion();
});

function listarTipoSuscripcion(){
	$.ajax({
		url: "../ajax/gestionar-tipo-suscripcion.php",
		method:"POST",
		data:{"accion":"listar_tipo_suscripcion"},
		dataType:"JSON",
		success:function(respuesta){
			$("#div-tipo-suscripcion #tbl-tipo-suscripcion tbody").empty();
			for (var i = 0; i < respuesta.length; i++) {
				var tipoSuscripcion = respuesta[i];
				var fila = 
				'<tr id="tbl-tipo-suscripcions-fila-'+tipoSuscripcion.id_tipo_suscripcion+'">'+
				'  <td>'+tipoSuscripcion.tipo_suscripcion+'</td>'+
				'  <td>'+tipoSuscripcion.dias_duracion+'</td>'+
				'  <td><button onclick="editarTipoSuscripcion('+tipoSuscripcion.id_tipo_suscripcion+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
				'  <button onclick="eliminarTipoSuscripcion('+tipoSuscripcion.id_tipo_suscripcion+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
				'</tr>';

				$("#div-tipo-suscripcion #tbl-tipo-suscripcion tbody").append(fila);
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

function seleccionarTipoSuscripcion(idTipoSuscripcion){
	$.ajax({
		data:{
				"accion":"seleccionar_tipo_suscripcion"
			    //"txt-busqueda":parametros
			},
		url:'../ajax/gestionar-tipo-suscripcion.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
				console.log(respuesta);
		},
		error:function(error){
			console.log(error);
		}
	})
};

function editarTipoSuscripcion(idTipoSuscripcion){
	//console.log(idTipoSuscripcion);
	$("#btn-guardar-tipo-suscripcion").hide();
	$("#btn-actualizar-tipo-suscripcion").show();
	$.ajax({
		url: '../ajax/gestionar-tipo-suscripcion.php',
		type: 'POST',
		data: {
			"accion":"seleccionar_tipo_suscripcion", 
			"id_tipo_suscripcion": idTipoSuscripcion
		},
		dataType: 'JSON',
		success: function(respuesta){
			$("#txt-id-tipo-suscripcion").val(respuesta.id_tipo_suscripcion);
			$("#txt-tipo-suscripcion").val(respuesta.tipo_suscripcion);
			$("#txt-dias-duracion").val(respuesta.dias_duracion);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}

	});	
	
};

function eliminarTipoSuscripcion(codigo){
	var tipoSuscripcion = codigo;
	$.ajax({
		data:{
			"accion":"eliminar_tipo_suscripcion",
			"codigo-tipo-suscripcion":tipoSuscripcion
			},
		url:'../ajax/gestionar-tipo-suscripcion.php',
		method:'POST',
		success:function(respuesta){
			$("#div-busqueda #tbl-busquedas tbody").empty();
			listarTipoSuscripcion();
		},
		error:function(error){
			alert(error);
		}
	})
};

$("#btn-guardar-tipo-suscripcion").click(function(){
	var inputNombre = $("#txt-tipo-suscripcion").val();
	var inputDuracion =	$("#txt-dias-duracion").val();
	$.ajax({
		data:{"accion":"guardar_tipo-suscripcion",
			  "inputNombre":inputNombre,
			  "inputDuracion":inputDuracion
			},
		url:'../ajax/gestionar-tipo-suscripcion.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
			listarTipoSuscripcion();
		},
		error:function(error){
			console.log(error);
		}
	})
});

$("#btn-actualizar-tipo-suscripcion").click(function(){
	var idSuscripcion=$("#txt-id-tipo-suscripcion").val();
	var tipoSuscripcion=$("#txt-tipo-suscripcion").val();
	var diasDuracion=$("#txt-dias-duracion").val();
	$.ajax({
		url:"../ajax/gestionar-tipo-suscripcion.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"actualizar_tipo_suscripcion",
			"idSuscripcion": idSuscripcion,
			"tipoSuscripcion": tipoSuscripcion,
			"diasDuracion":diasDuracion
		},
		success:function(respuesta){
			if (respuesta==true) {
				//$("#div-tipo-suscripcions #tbl-tipo-suscripcions tbody").html("");
				listarTipoSuscripcion();
			}

		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			
			$("#btn-actualizar-tipo-suscripcion").hide();
			$("#btn-guardar-tipo-suscripcion").show();
			$("#txt-tipo-suscripcion").val("");
			$("#txt-dias-duracion").val("");
		}
	});
});
function buscarTipoSuscripcion(){
	var parametros = $("#txt-busqueda").val();
	$.ajax({
		data:{
				"accion":"buscar_tipo_suscripcion",
			    "txt-busqueda":parametros
			},
		url:'../ajax/gestionar-tipo-suscripcion.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
				$("#div-busqueda #tbl-busquedas tbody").empty();
				var suscripcion = respuesta;
				var fila = 
				'<tr id="tbl-tipo-suscripcions-fila-'+suscripcion.id_tipo_suscripcion+'">'+
				'  <td>'+suscripcion.tipo_suscripcion+'</td>'+
				'  <td>'+suscripcion.dias_duracion+'</td>';
				if(suscripcion.tipo_suscripcion != 'not founded'){
						fila += '  <td><button onclick="editarTipoSuscripcion('+suscripcion.id_tipo_suscripcion+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
								'  <button onclick="eliminarTipoSuscripcion('+suscripcion.id_tipo_suscripcion+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
								'</tr>';
				}
				$("#div-tipo-suscripcion #tbl-busquedas").append(fila);
		},
		error:function(error){
			console.log(error);
		}
	})
};