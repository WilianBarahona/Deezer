function activarMensaje(activarMensaje){
	$("#div-mensaje").show();
	$("#div-mensaje").html(activarMensaje);
}
function conexion(){
	if($("#inputEmail").val()== '' && $("#inputPassword").val()== ''){activarMensaje("<em><b>Introduzca su correo y contraseña</b></em>");}
	else{var correo = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
 			if (!(correo.test($('#inputEmail').val().trim()))) {activarMensaje("<em><b>Correo Invalido</b></em>");}
    		else{
    			if($("#inputPassword").val() == ''){activarMensaje("<em><b>Introduzca su correo y contraseña</b></em>");}
				else{
					$("#div-mensaje").hide();
					var parametros = "inputEmail="+$("#inputEmail").val()+"&"+"inputPassword="+$("#inputPassword").val();
					$.ajax({
						data:parametros,
						url:'ajax/get-info.php?accion=validar_login',
						method:'POST',
						success:function(respuesta){alert(respuesta);},
						error:function(error){alert(error);}
					});
				}}}
};
function registrarUsuario(){
	if($("#inputEmail").val()== ''){activarMensaje("<em><b>Introduzca su correo y contraseña</b></em>");}
	else{var correo = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
 		if (!(correo.test($('#inputEmail').val().trim()))) {activarMensaje("<em><b>Correo Invalido</b></em>");}
    	else{
    		if($("#inputPassword").val() == ''){activarMensaje("<em><b>Introduzca su correo y contraseña</b></em>");}
			else{
				if($("#inputText").val()==''){activarMensaje("<em><b>Introduzca su nombre de usuario</b></em>");}
				else{
					if($("#slc-sexo").val()==0){activarMensaje("<em><b>Seleccione su sexo</b></em>");}
					else{
						if($("#slc-edad").val()==0){activarMensaje("<em><b>Introduzca su edad</b></em>");}
						else{
							$("#div-mensaje").hide();
							var parametros ="inputEmail="+$("#inputEmail").val()+"&"+
											"inputPassword="+$("#inputPassword").val()+"&"+
											"inputText="+$("#inputText").val()+"&"+
											"scl-sexo="+$("#slc-sexo").val()+"&"+
											"slc-edad="+$("#slc-edad").val();
							$.ajax({
								data:parametros,
								url:'ajax/get-info.php?accion=registrar_usuario',
								method:'POST',
								success:function(respuesta){alert(respuesta);},
								error:function(error){alert(error);}
							});
						}}}}}}
};	
