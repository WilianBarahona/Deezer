$(document).ready(function(){
	$("#btn-actualizar-usuario").hide();
	cargarPaises();
	llenarTablaUsuarios();
});

function limpiar(){
	$("#lista-carga-foto-usuario").hide();
	$("#txt-nombre-usuario").val("");
	$("#slc-pais-usuario").val("");
	$("#txt-usuario-usuario").val("");
	$("#txt-apellido-usuario").val("");
	$("#txt-email-usuario").val("");
	$("#txt-contrasenia-usuario").val("");
	$("#txt-url-foto-usuario").val("");
	$("#fecha_nacimiento").val("");
	$("#slc-tipo-usuario").val("");
	$('#slc-pais-usuario').val("");
}

function cargarPaises(){
	$.ajax({
		url:"../ajax/gestionar-pais.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"listar-todos"
		},
		success:function(respuesta){
			console.log(respuesta);
			for (var i = 0; i < respuesta.length; i++) {
				var pais = respuesta[i];
				var card='<option value="'+pais.id_pais+'">'+pais.nombre_pais+'</option>';
				$("#slc-pais-usuario").append(card);
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

$("#file-foto-usuario").change(function(){
	var formData = new FormData($("#form-foto-usuario")[0]);
	$("#lista-carga-foto-usuario").hide();
	$("#carga-foto-usuario").show();
	$.ajax({
	    url: "../ajax/subir-imagen.php",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,
	    dataType:"JSON",
	    success:function(respuesta){
			if(respuesta.status){
				$("#txt-url-foto-usuario").val("img/"+respuesta.ruta);
				$("#lista-carga-foto-usuario").show();
			}else{
				$.alert(respuesta.mensaje);
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
			$("#carga-foto-usuario").hide();
		}
	});
});


$("#btn-guardar-usuario").click(function(event) {
	
	var id_pais = $("#slc-pais-usuario").val();
	var usuario = $("#txt-usuario-usuario").val();
	var nombre = $("#txt-nombre-usuario").val();
	var apellido = $("#txt-apellido-usuario").val();
	var sexo = $("input[name='rbt-sexo']:checked").val();
	var email = $("#txt-email-usuario").val();
	var contrasenia = $("#txt-contrasenia-usuario").val();
	var url_foto_perfil = $("#txt-url-foto-usuario").val();
	var fecha_nacimiento = $("#fecha_nacimiento").val();
	var id_tipo_usuario = $("#slc-tipo-usuario").val();
	$.ajax({
		url:"../ajax/gestionar-usuario.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"insertar-registro",
			"id_pais": id_pais,
			"usuario": usuario,
			"nombre": nombre,
			"apellido": apellido,
			"sexo": sexo,
			"email": email,
			"contrasenia": contrasenia,
			"url_foto_perfil": url_foto_perfil,
			"fecha_nacimiento": fecha_nacimiento,
			"id_tipo_usuario": id_tipo_usuario
		},
		success:function(respuesta){
			if(respuesta)
			{
				$.alert({
					title: '¡Éxito!',
					content: 'Se insertó el registro'
				});
				$("#tbl-usuarios tbody").html("");
				limpiar();
				llenarTablaUsuarios();
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
			//TO-DO
		}
	});
});

function llenarTablaUsuarios(){
	$.ajax({
	url:"../ajax/gestionar-usuario.php",
	method:"POST",
	dataType:"JSON",
	data:{
		"accion":"listar-todos"
	},
	success:function(respuesta){
		for (var i = 0; i < respuesta.length; i++) {
			var usuario = respuesta[i];
			var card=
			'<tr>'+
			'	<td><img src="../'+usuario.url_foto_perfil+'" alt="'+usuario.nombre_usuario+'" /></td>'+
			'	<td>'+usuario.nombre_usuario+'</td>'+
			'	<td>'+usuario.email+'</td>'+
			'	<td>'+usuario.fecha_nacimiento+'</td>'+
			'	<td>'+usuario.sexo+'</td>'+
			'	<td>'+usuario.nombre_pais+'</td>'+
			'	<td>'+usuario.tipo_usuario+'</td>'+
			'	<td>'+usuario.tipo_suscripcion+'</td>'+
			'	<td><button type="button" class="btn btn-default" onclick="seleccionar('+usuario.id_usuario+')"><span class="glyphicon glyphicon-pencil"></span></button></td>'+
			'	<td><button type="button" class="btn btn-default" onclick="eliminar('+usuario.id_usuario+')"><span class="glyphicon glyphicon-trash"></span></button></td>'+
			'</tr>';
			$("#tbl-usuarios tbody").append(card);
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

function seleccionar(id){
	$("#btn-guardar-usuario").hide();
	$("#btn-actualizar-usuario").show();
	$.ajax({
		url:"../ajax/gestionar-usuario.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"seleccionar",
			"id_usuario":id
		},
		success:function(respuesta){
			$("#txt-id-usuario").val(respuesta.id_usuario);
			$("#slc-pais-usuario").val(respuesta.id_pais);
			$("#txt-usuario-usuario").val(respuesta.usuario);
			$("#txt-nombre-usuario").val(respuesta.nombre_usuario);
			$("#txt-apellido-usuario").val(respuesta.apellido);
			$("#txt-email-usuario").val(respuesta.email);
			$("#txt-contrasenia-usuario").val("");
			$("#fecha_nacimiento").val(respuesta.fecha_nacimiento);
			$("#slc-tipo-usuario").val(respuesta.id_tipo_usuario);
			$('#slc-pais-usuario').val(respuesta.id_pais);
			$('input[name="rbt-sexo"][value="'+respuesta.sexo+'"]').attr('checked',true);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
}


$("#btn-actualizar-usuario").click(function(event) {
	var id_usuario = $("#txt-id-usuario").val();
	var usuario = $("#txt-usuario-usuario").val();
	var nombre = $("#txt-nombre-usuario").val();
	var apellido = $("#txt-apellido-usuario").val();
	var sexo = $("input[name='rbt-sexo']:checked").val();
	var email = $("#txt-email-usuario").val();
	var contrasenia = $("#txt-contrasenia-usuario").val();
	var fecha_nacimiento = $("#fecha_nacimiento").val();

	$.ajax({
		url:"../ajax/gestionar-usuario.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"actualizar-registro",
			"id_usuario":id_usuario,
			"usuario":usuario,
			"nombre":nombre,
			"apellido":apellido,
			"sexo":sexo,
			"email":email,
			"contrasenia":contrasenia,
			"fecha_nacimiento":fecha_nacimiento,
		},
		success:function(respuesta){
			if(respuesta) {
				$.alert({
					title: '¡Éxito!',
					content: 'Se actualizó el registro'
				});
				$("#tbl-usuarios tbody").html("");
				limpiar();
				llenarTablaUsuarios();
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
			//TO-DO
		}
	});
});

function eliminar(id){
	$.confirm({
		title: '¡Alerta!',
		content: '¿Desea eliminar registro?',
		buttons: {
			Aceptar: function(){
				$.ajax({
					url:"../ajax/gestionar-usuario.php",
					method:"POST",
					dataType:"JSON",
					data:{
						"accion":"eliminar-registro",
						"id_usuario":id
					},
					success:function(respuesta){
						if(respuesta){
							$.alert({
								title: '¡Éxito!',
								content: 'Se eliminó el registro'
							});
							$("#tbl-usuarios tbody").html("");
							limpiar();
							llenarTablaUsuarios();
						}else{
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
						//TO-DO
					}
				});
			}
		}
	});
}