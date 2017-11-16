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
  cargar_inicio();   
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

    // PLAYLIST
    $.ajax({
      url:"ajax/gestionar-playlist.php",
      method:"POST",
      dataType:"JSON",
      data:{
        "accion":"listar-todos"
      },
      success:function(respuesta){
        for (var i = 0; i < respuesta.length; i++) {
          var playlist = respuesta[i];
          var card =
          '<div class="col-lg-3 col-sm-6 col-md-4 col-xs-12 text-center">'+
          '  <img src="'+playlist.url_foto_playlist+'" class="img-rounded img-responsive center-block img-album"><br>'+
          '  <a href="#" onclick="cargarPlaylist('+playlist.id_playlist+')">'+playlist.nombre_playlist+'</a>'+
          '  <span  class="help-block text-center"><h6>'+playlist.numero_canciones+' canciones</h6></span>'+
          '</div>';
          if(i%4==0){
            $("#playlist-inicio").append('<div class="row">');
            $("#playlist-inicio").append(card);
            $("#playlist-inicio").append('</div>');
          }else{
            $("#playlist-inicio").append(card);
          }
        }
      },
      error: function(error){
        console.log(error);
      },
      complete: function(){
        //TO-DO
      }
    });

    //ARTISTAS
    $.ajax({
      url:"ajax/gestionar-artista.php",
      method:"POST",
      dataType:"JSON",
      data:{
        "accion":"listar-todos"
      },
      success:function(respuesta){
        for (var i = 0; i < respuesta.length; i++) {
          var artista = respuesta[i];
          var card=
          '<div class="col-lg-3 col-sm-6 col-md-4 col-xs-12 text-center">'+
          '  <img src="'+artista.url_foto_artista+'" class="img-rounded img-responsive center-block img-album"><br>'+
          '  <a href="#" onclick="verArtista('+artista.id_artista+')">'+artista.nombre_artista+'</a>'+
          '  <span  class="help-block text-center"><h6>'+artista.numero_albumes+' albumes</h6></span>'+
          '</div>';
          if(i%4==0){
            $("#artistas-inicio").append('<div class="row">');
            $("#artistas-inicio").append(card);
            $("#artistas-inicio").append('</div>');
          }else{
            $("#artistas-inicio").append(card);
          }
        }
      },
      error: function(error){
        console.log(error);
      },
      complete: function(){
        //TO-DO
      }
    });
    

    // ALBUMES
    
    $.ajax({
      url:"ajax/gestionar-album.php",
      method:"POST",
      dataType:"JSON",
      data:{
        "accion":"listar-todos"
      },
      success:function(respuesta){
        for (var i = 0; i < respuesta.length; i++) {
          var album = respuesta[i];
          var card =
          '<div class="col-lg-3 col-sm-6 col-md-4 col-xs-12 text-center">'+
          '  <img src="'+album.album_cover_url+'" class="img-rounded img-responsive img-album"><br>'+
          '  <a href="#" onclick="cargarAlbum('+album.id_album+')">'+album.nombre_album+'</a>'+
          '  <span  class="help-block text-center"><h6>De '+album.nombre_artista+'</h6></span>'+
          '</div>';
          if(i%4==0){
            $("#albumes-inicio").append('<div class="row">');
            $("#albumes-inicio").append(card);
            $("#albumes-inicio").append('</div>');
          }else{
            $("#albumes-inicio").append(card);
          }
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
    musica();
});

$("#favoritas").click(function(){
  musica();
});


function musica(){
  var id_usuario = $("#id_usuario").val();
  var foto_usuario = $("#foto_usuario").val();
  var nombre_perfil = $("#nombre_usuario").val();
     $.ajax({
          url:"ajax/get-dom.php?evento=cargar_favoritas",
          data:"",
          method:"POST",
          success:function(resultado){
            $("#main").html(resultado);
            $("#img-perfil").attr("src", foto_usuario);
            $("#nombre-perfil").html(nombre_perfil);
            $.ajax({
              url:"ajax/gestionar-usuario.php",
              method:"POST",
              dataType:"JSON",
              data:{
                "accion":"canciones-favoritos",
                "id_usuario":id_usuario
              },
              success:function(respuesta){
                for (var i = 0; i < respuesta.length; i++) {
                  var cancion = respuesta[i];
                  var card =
                  '<tr>'+
                  '  <td>'+cancion.nombre_cancion+'</td>'+
                  '  <td><button type="button" class="btn btn-none" onclick="agregarCancion('+cancion.id_cancion+')"><span class="glyphicon glyphicon-heart"></span></button></td>'+
                  '  <td><button type="button" class="btn btn-none" onclick="reproducir('+cancion.id_cancion+')"><span class="glyphicon glyphicon-play"></span></button></td>'+
                  '  <td>'+cancion.nombre_artista+'</td>'+
                  '  <td>'+cancion.nombre_album+'</td>'+
                  '  <td>'+cancion.nombre_genero+'</td>'+
                  '  <td></td>'+
                  '</tr>'
                  $("#canciones-favoritas").append(card);
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
          error:function(){
            alert("error")
          }
        }); 
}

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
      var correo=$("#inputEmail").val();
      var contrasenia=$("#inputPassword").val();
       $.ajax({

   url:"ajax/verificacion-sesion.php",
    data:{  
      "accion":"iniciar-sesion",
      "inputEmail":correo,
      "inputPassword":contrasenia
    },
    dataType: 'JSON',
    method: "POST",
    success: function(respuesta){ 
           if (respuesta.loggedin==0) {

              $("#status").html(respuesta.mensaje);
            }
            else {
               if (respuesta.id_tipo_usuario==1) {
                  window.location="admin/index.php";
               }
               else if (respuesta.id_tipo_usuario==2) {
                  window.location="index.php";
               }  
            }
    },
    error:function(e){
        console.log(e);
    }
  });
}

function verArtista(idArtista){
  $.ajax({
    url:"ajax/gestionar-artista.php",
    method:"POST",
    dataType:"JSON",
    data:{
      "accion":"seleccionar",
      "id_artista":idArtista
    },
    success:function(respuesta){
      var artista = respuesta;
      $("#main").html("");
      console.log(respuesta);
      var header=
      '<div class="well card">'+
      '  <img src="'+artista.url_foto_artista+'" alt="'+artista.nombre_artista+'" class="img img-responsive img-rounded"/>'+
      '  <h2>'+artista.nombre_artista+'</h2>'+
      '  <h3>'+artista.nombre_pais+'</h3>'+
      '  <hr/>'+
      '  <h3>Biografía</h3>'+
      '  <div class="biografia well">'+artista.biografia_artista+'</div>'+
      '</div>'+
      '<h3>Albumes: '+artista.numero_albumes+'</h3>'+
      '<hr>';
      $("#main").append(header);
      $("#main").append('<div id="albumes"></div>');

      for (var i = 0; i < artista.albumes.length; i++) {
        var album = artista.albumes[i];
        var card =
        '<div class="col-lg-3 col-sm-6 col-md-4 col-xs-12 text-center">'+
        '  <img src="'+album.album_cover_url+'" class="img-rounded img-responsive img-album"><br>'+
        '  <a href="#" onclick="cargarAlbum('+album.id_album+')">'+album.nombre_album+'</a>'+
        '  <span  class="help-block text-center"><h6>De '+album.nombre_artista+'</h6></span>'+
        '</div>';
        if(i%4==0){
          $("#main #albumes").append('<div class="row">');
          $("#main #albumes").append(card);
          $("#main #albumes").append('</div>');
        }else{
          $("#main #albumes").append(card);
        }
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