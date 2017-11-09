$(document).ready(function(){
	setTblGeneros();
});

// LLENAR tbl-generos
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

function editarGenero(idGenero){
	alert(idGenero);
}

