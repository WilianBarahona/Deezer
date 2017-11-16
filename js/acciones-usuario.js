$(document).ready(function(){
      $.ajax({
        url:"ajax/gestionar-usuario.php",
        method:"POST",
        data:{"accion":"obtener-datos-usuario"},
        dataType: "JSON",
        error:function(e){
          console.log(e);
        },
        success:function(respuesta){
          console.log(respuesta);
          if (respuesta.sexo=="m") {
            $("input[value='m']").attr('checked', true);
          }
          if (respuesta.sexo=='f') {
            $("input[value='f']").attr('checked', true);
          }
          var fila='<img style="width: 200px; height: 200px" src="'+respuesta.url_foto_perfil+'" >';
          $("#foto-perfil").append(fila);
          $("#txt-nombre").val(respuesta.nombre);
          $("#txt-apellido").val(respuesta.apellido);
          $("#txt-correo").val(respuesta.email);
          $("#txt-nombre-usuario").val(respuesta.usuario);
          $("#txt-contrasenia").val(respuesta.contrasenia);
          $("#txt-fecha-nacimiento").val(respuesta.fecha_nacimiento);
  
        }
      });
  });
  $("#btn-guardar-actualizacion").click(function(){
    var id_usuario=$("#txt-id-usuario").val();
    var usuario=$("#txt-nombre-usuario").val();
    var nombre=$("#txt-nombre").val();
    var apellido=$("#txt-apellido").val();
    var fecha=$("#txt-fecha-nacimiento").val();
    var correo=$("#txt-correo").val();
    var contrasenia=$("#txt-contrasenia").val();
    var sexo=$("input[type='radio'][name='rbt-sexo']:checked").val();  

    $.ajax({
      url:"ajax/gestionar-usuario.php",
      method:"POST",
      data:{"accion":"actualizar-registro",
            "id_usuario":id_usuario,
            "usuario": usuario,
            "nombre":nombre,
            "apellido":apellido,
            "email": correo,
            "contrasenia":contrasenia,
            "sexo":sexo,
            "fecha_nacimiento":fecha
            },
      error:function(e){
        alert(e);
      },
      success:function(r){
        if(r){
          $.alert("Se almacenó información")
        }
      }
    });
  });
  $("#btn-eliminar").click(function(){
    $.confirm({
      title:"¡Alerta!",
      content:"Confirme para eliminar su cuenta",
      buttons:{
        Aceptar:function(){
          var id_usuario = $("#id_usuario").val();
           $.ajax({
                url:"ajax/gestionar-usuario.php",
            method:"POST",
            data:{"accion":"eliminar-registro", "id_usuario": id_usuario
          },
            error:function(e){
              alert(e);
            },
            success:function(r){
              window.location="login.php";
            }
           });
        },
        Cancelar:function(){}
      }
    })
  });