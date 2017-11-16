$(document).ready(function(){
	listarIdiomas();
});

function listarIdiomas(){
	$.ajax({
		url: "../ajax/gestionar-idioma.php",
		method:"POST",
		data:{"accion":"listar-todos"},
		dataType:"JSON",
		success:function(respuesta){
			$("#div-idiomas #tbl-idiomas tbody").empty();
			for (var i = 0; i < respuesta.length; i++) {
				var idioma = respuesta[i];
				var fila = 
				'<tr id="tbl-idiomas-fila-'+idioma.id_idioma+'">'+
				'  <td>'+idioma.nombre_idioma+'</td>'+
				'  <td>'+idioma.abreviatura_idioma+'</td>'+
				'  <td><button onclick="editarIdioma('+idioma.id_idioma+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
				'  <button onclick="eliminarIdioma('+idioma.id_idioma+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
				'</tr>';

				$("#div-idiomas #tbl-idiomas tbody").append(fila);
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

function seleccionarIdioma(idIdioma){
	$.ajax({
		data:{
				"accion":"seleccionar"
			    //"txt-busqueda":parametros
			},
		url:'../ajax/gestionar-idioma.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
				$("#div-busqueda #tbl-busquedas tbody").empty();
				var idioma = respuesta;
				var fila = 
				'<tr id="tbl-idiomas-fila-'+idioma.id_idioma+'">'+
				'  <td>'+idioma.nombre_idioma+'</td>'+
				'  <td>'+idioma.abreviatura_idioma+'</td>';
				if(idioma.nombre_idioma != 'not founded'){
						fila += '  <td><button onclick="editarIdioma('+idioma.id_idioma+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
								'  <button onclick="eliminarIdioma('+idioma.id_idioma+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
								'</tr>';
				}
				$("#div-idiomas #tbl-busquedas").append(fila);
		},
		error:function(error){
			console.log(error);
		}
	})
};

function editarIdioma(idIdioma){
	$("#btn-guardar-idioma").hide();
	$("#btn-actualizar-idioma").show();
	$.ajax({
		url: '../ajax/gestionar-idioma.php',
		type: 'POST',
		data: {
			"accion":"seleccionar", 
			"id_idioma": idIdioma
		},
		dataType: 'JSON',
		success: function(respuesta){
			$("#txt-nombre-idioma").val(respuesta.nombre_idioma);
			$("#txt-id-idioma").val(respuesta.id_idioma);
			$("#txt-abreviatura-idioma").val(respuesta.abreviatura_idioma);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}

	});	
	
};

function eliminarIdioma(codigo){
	$.ajax({
		data:{
			"accion":"eliminar-registro",
			"id_idioma":codigo
			},
		url:'../ajax/gestionar-idioma.php',
		method:'POST',
		success:function(respuesta){
			$("#div-busqueda #tbl-busquedas tbody").empty();
			listarIdiomas();
		},
		error:function(error){
			console.log(error);
		}
	})
};

$("#btn-guardar-idioma").click(function(){
	var inputNombre = $("#txt-nombre-idioma").val();
	var inputAbreviatura =	$("#txt-abreviatura-idioma").val();
	$.ajax({
		data:{"accion":"insertar-registro",
			  "nombre_idioma":inputNombre,
			  "abreviatura_idioma":inputAbreviatura
			},
		url:'../ajax/gestionar-idioma.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
			$("#div-busqueda #tbl-busquedas tbody").empty();
			listarIdiomas();
		},
		error:function(error){
			console.log(error);
		}
	})
});

$("#btn-actualizar-idioma").click(function(){
	var nombreIdioma=$("#txt-nombre-idioma").val();
	var idIdioma=$("#txt-id-idioma").val();
	var abreviaturaIdioma=$("#txt-abreviatura-idioma").val();
	$.ajax({
		url:"../ajax/gestionar-idioma.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"actualizar-registro",
			"id_idioma": idIdioma,
			"nombre_idioma": nombreIdioma,
			"abreviatura_idioma":abreviaturaIdioma
		},
		success:function(respuesta){
			if (respuesta==true) {
				//$("#div-idiomas #tbl-idiomas tbody").html("");
				listarIdiomas();
			}

		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			
			$("#btn-actualizar-idioma").hide();
			$("#btn-guardar-idioma").show();
			$("#txt-nombre-idioma").val("");
			$("#txt-abreviatura-idioma").val("");
		}
	});
});
function buscarIdioma(){
	var parametros = $("#txt-busqueda").val();
	$.ajax({
		url:'../ajax/gestionar-idioma.php',
		data:{
				"accion":"buscar-por-nombre",
			    "nombre_idioma":parametros
			},
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
				$("#div-busqueda #tbl-busquedas tbody").empty();
				var idioma = respuesta;
				var fila = 
				'<tr id="tbl-idiomas-fila-'+idioma.id_idioma+'">'+
				'  <td>'+idioma.nombre_idioma+'</td>'+
				'  <td>'+idioma.abreviatura_idioma+'</td>';
				if(idioma.nombre_idioma != 'not founded'){
						fila += '  <td><button onclick="editarIdioma('+idioma.id_idioma+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
								'  <button onclick="eliminarIdioma('+idioma.id_idioma+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
								'</tr>';
				}
				$("#div-idiomas #tbl-busquedas").append(fila);
		},
		error:function(error){
			console.log(error);
		}
	})
};
