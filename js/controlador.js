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


 $(document).ready(function(){
          $.ajax({
          url:"ajax/get-dom.php?evento=cargar_index",
          data:"",
          method:"POST",
          success:function(resultado){
            $("#main").html(resultado);
          },
          error:function(){
            alert("error")
          }
        }); 
  })

$("#index").click(function(event){
    cargar_inicio();
});

$("#index-image").click(function(event){
    cargar_inicio();
});

function cargar_inicio(){
  $.ajax({
  url:"ajax/get-dom.php?evento=cargar_index",
  data:"",
  method:"POST",
  success:function(resultado){
    $("#main").html(resultado);
  },
  error:function(){
    alert("error")
  }
  }); 
}


 $("#recomendaciones").click(function(){
 	 $.ajax({
          url:"ajax/get-dom.php?evento=cargar_recomendaciones",
          data:"",
          method:"POST",
          success:function(resultado){
            $("#main").html(resultado);
          },
          error:function(){
            alert("error")
          }
        }); 
   
});

$("#mi-musica").click(function(){
    $.ajax({
          url:"ajax/get-dom.php?evento=cargar_musica",
          data:"",
          method:"POST",
          success:function(resultado){
            $("#main").html(resultado);
          },
          error:function(){
            alert("error")
          }
        }); 
});

$("#favoritas").click(function(){
     $.ajax({
          url:"ajax/get-dom.php?evento=cargar_favoritas",
          data:"",
          method:"POST",
          success:function(resultado){
            $("#main").html(resultado);
          },
          error:function(){
            alert("error")
          }
        }); 
});


$("#btn-search").click(function(){
    $.ajax({
          url:"ajax/get-dom.php?evento=cargar_buscador",
          data:"",
          method:"POST",
          success:function(resultado){
            $("#main").html(resultado);
          },
          error:function(){
            alert("error")
          }
        }); 
});
function iniciarSesion(){
    var parametros=
      "inputEmail="+$("#inputEmail").val()+"&"+
      "inputPassword="+$("#inputPassword").val();
      $.ajax({

    url:"ajax/verificacion-sesion.php",
    data:parametros,
    method: "POST",
    success: function(respuesta){
        var direccion=respuesta;
              if (direccion=="correo y contrasenia validos") {
                // usuario normal
                location='index.php';
                // admin
                // location='admin/index.php';
              }
              if (direccion=='correo o contrasenia invalidos') {
                alert(direccion);
              }

    },
    error:function(e){
        alert(e);
    }
  });
}