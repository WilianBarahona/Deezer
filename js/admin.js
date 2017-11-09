$(document).ready(function(){
	setTblGeneros();
});

// LLENADO tbl-generos
function setTblGeneros(){
	$.ajax({
		url: "../ajax/get-info.php?accion=get_generos",
		method:"GET",
		data:"",
		dataType:"JSON",
		success:function(response){
			for (var i = 0; i < response.length; i++) {
				var genero = response[i];
				var fila = 
				'<tr id="tbl-generos-fila-'+genero.id+'">'+
				'  <td>'+genero.nombre+'</td>'+
				'  <td><button onclick="editarGenero('+genero.id+')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>'+
				'</tr>';

				$("#tbl-generos tbody").append(fila);
			}
		},
		error:function(error){
			console.log(error)
		}
	});
}

// EDITAR UN GENERO
function editarGenero(idGenero){
	$("#btn-guardar-genero").hide();
	$("#btn-actualizar-genero").show();
	var datos =	"&id_genero="+idGenero;
	$.ajax({
		url: '../ajax/get-info.php?accion=get_genero'+datos,
		type: 'GET',
		data: "",
		dataType: 'JSON',
		success: function(response){
			$("#txt-nombre-genero").val(response.nombre);
			$("#txt-id-genero").val(response.id);
		},
		error: function(response){
			console.log(response);
		}
	});	
}

$("#btn-actualizar-genero").click(function(){
	alert("Hi");
});