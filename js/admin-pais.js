$(document).ready(function(){
	listarPais();
});

function listarPais(){
	$.ajax({
		url: "../ajax/gestionar-pais.php",
		method:"POST",
		data:{"accion":"listar-todos"},
		dataType:"JSON",
		success:function(respuesta){
			$("#div-pais #tbl-pais tbody").empty();
			for (var i = 0; i < respuesta.length; i++) {
				var pais = respuesta[i];
				var fila = 
				'<tr id="tbl-pais-fila-'+pais.id_pais+'">'+
				'  <td>'+pais.nombre_pais+'</td>'+
				'  <td>'+pais.codigo_telefono_pais+'</td>'+
				'  <td><button onclick="editarPais('+pais.id_pais+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
				'  <button onclick="eliminarPais('+pais.id_pais+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
				'</tr>';
				$("#div-pais #tbl-pais tbody").append(fila);
			}
		},
		error:function(error){
			console.log(error);
		},
		complete: function(){
		}
	});
}

function seleccionarPais(idpais){
	$.ajax({
		data:{
			"accion":"seleccionar"
			},
		url:'../ajax/gestionar-pais.php',
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

function editarPais(idPais){
	$("#btn-guardar-pais").hide();
	$("#btn-actualizar-pais").show();
	$.ajax({
		url: '../ajax/gestionar-pais.php',
		type: 'POST',
		data: {
			"accion":"seleccionar", 
			"id_pais":idPais
		},
		dataType: 'JSON',
		success: function(respuesta){
			$("#txt-id-pais").val(respuesta.id_pais);
			$("#txt-nombre-pais").val(respuesta.nombre_pais);
			$("#txt-abreviatura-pais").val(respuesta.abreviatura_pais);
			$("#txt-codigo-telefono-pais").val(respuesta.codigo_telefono_pais);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}

	});	
	
};

function eliminarPais(codigo){
	var codigoPais = codigo;
	$.ajax({
		data:{
			"accion":"eliminar-registro",
			"id_pais":codigoPais
			},
		url:'../ajax/gestionar-pais.php',
		method:'POST',
		success:function(respuesta){
			listarPais();
		},
		error:function(error){
			alert(error);
		}
	})
};

$("#btn-guardar-pais").click(function(){
	var inputNombre = $("#txt-nombre-pais").val();
	var inputAbreviatura =	$("#txt-abreviatura-pais").val();
	var inputCodigoTelefono = $("#txt-codigo-telefono-pais").val();

	$.ajax({
		data:{"accion":"insertar-registro",
			  "nombre_pais":inputNombre,
			  "abreviatura_pais":inputAbreviatura,
			  "codigo_telefono_pais":inputCodigoTelefono
			},
		url:'../ajax/gestionar-pais.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
			listarPais();
		},
		error:function(error){
			console.log(error);
		}
	})
});

$("#btn-actualizar-pais").click(function(){
	var idPais=$("#txt-id-pais").val();
	var nombrePais=$("#txt-nombre-pais").val();
	var abreviaturaPais=$("#txt-abreviatura-pais").val();
	var codigoTelefonoPais=$("#txt-codigo-telefono-pais").val();
	$.ajax({
		url:"../ajax/gestionar-pais.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"actualizar-registro",
			"id_pais": idPais,
			"nombre_pais": nombrePais,
			"abreviatura_pais":abreviaturaPais,
			"codigo_telefono_pais": codigoTelefonoPais,
		},
		success:function(respuesta){
			listarPais();
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			
			$("#btn-actualizar-pais").hide();
			$("#btn-guardar-pais").show();
			$("#txt-nombre-pais").val("");
			$("#txt-abreviatura-pais").val("");
			$("#txt-codigo-telefono-pais").val("");
		}
	});
});

function buscarPais(){
	var parametros = $("#txt-busqueda").val();
	$.ajax({
		data:{
				"accion":"buscar-por-nombre",
			    "txt-busqueda":parametros
			},
		url:'../ajax/gestionar-pais.php',
		method:'POST',
		dataType:'JSON',
		success:function(respuesta){
				$("#div-busqueda #tbl-busquedas tbody").empty();
				var pais = respuesta;
				var fila = 
				'<tr id="tbl-pais-fila-'+pais.id_pais+'">'+
				'  <td>'+pais.nombre_pais+'</td>'+
				'  <td>'+pais.abreviatura_pais+'</td>'+
				'  <td>'+pais.codigo_telefono_pais+'</td>';
				if(pais.nombre_pais != 'not founded'){
						fila += '  <td><button onclick="editarPais('+pais.id_pais+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'+
								'  <button onclick="eliminarPais('+pais.id_pais+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
								'</tr>';
				}
				$("#div-pais #tbl-busquedas").append(fila);
		},
		error:function(error){
			console.log(error);
		}
	})
};