// CARGAR PAISES
$(document).ready(function(){
	llenarTablaArtistas();
	$.ajax({
		url:"../ajax/gestionar-pais.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"listar-todos"
		},
		success:function(respuesta){
			for (var i = 0; i < respuesta.length; i++) {
				var pais=respuesta[i];
				var fila = 
					'<option value="'+pais.id_pais+'">'+pais.nombre_pais+'</option>';
				$("#slc-pais-artista").append(fila);
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


// LLENADO TBL-ARTISTAS
function llenarTablaArtistas(idArtista){
	$.ajax({
		url: "../ajax/gestionar-artista.php",
		method: "POST",
		data: {"accion":"listar-todos"},
		dataType: "JSON",
		success:function(respuesta){
			for(var i = 0; i < respuesta.length; i++){
				var artista = respuesta[i];
				var fila = 
				'<tr id="tbl-artistas-fila-'+artista.id_artista+'">'+
				'	<td><img class="img img-circle img-responsive" src="../'+artista.url_foto_artista+'" title="'+artista.nombre_artista+'">'+
				'	<td>'+artista.nombre_artista+'</td>'+
				'	<td>'+artista.nombre_pais+'</td>'+
				// '	<td>'+artista.biografia_artista+'</td>'+
				'	<td><button onclick="editarArtista('+artista.id_artista+')"class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>'+
				'	<td><button onclick="eliminarArtista('+artista.id_artista+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>'+
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
				$("#txt-url-foto-artista").val("img/"+respuesta.ruta);
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


// INSERTAR ARTISTA
$("#btn-guardar-artista").click(function(){
	var nombreArtista = $("#txt-nombre-artista").val();
	var idPais = $("#slc-pais-artista").val();
	var biografia = $("#txt-biografia-artista").val();
	var url = $("#txt-url-foto-artista").val();
	if(nombreArtista!=""){
		$.ajax({
			url: "../ajax/gestionar-artista.php",
			method:"POST",
			dataType:"JSON",
			data:{
				"accion":"insertar-registro",
				"nombre_artista":nombreArtista,
				"id_pais":idPais,
				"biografia_artista":biografia,
				"url_foto_artista":url
			},
			success:function(respuesta){
				if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se insertó el registro'
					});
					$("#tbl-artistas tbody").html("");
					limpiar();
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
	$("input[name='form-foto-artista']")
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
	$.ajax({
		url: '../ajax/gestionar-artista.php',
		type: "POST",
		data:{
			"accion":"eliminar-registro",
			"id_artista": idArtista
		},
		dataType:"JSON",
		success:function(respuesta){
			if(respuesta)
				{
					$.alert({
						title: '¡Éxito!',
						content: 'Se elimino el registro'
					});
					$("#tbl-artistas tbody").html("");
					llenarTablaArtistas();
				}
				else
				{
					$.alert({
						title: '¡Ocurrió un problema!',
						content: 'No se pudo eliminar el registro'
					});
				}
		},
		error:function(e){
			console.log(e);
		},
		complete: function(respuesta){
			
		}
	});
}

function limpiar()
{
	$("#lista-carga-foto-artista").hide();
	$('#txt-nombre-artista').val("");
	$('#txt-biografia-artista').val("");
	$('#slc-pais-artista').val("Seleccionar Pais");
}