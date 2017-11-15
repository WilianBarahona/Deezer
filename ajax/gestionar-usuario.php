<?php
	include("../class/class-conexion.php");
	include("../class/class-usuario.php");
	session_start();
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			case 'actualizar-registro': 
				$usuario=new Usuario();
				$usuario -> setIdUsuario($POST['id_usuario']);
				$usuario -> setUsuario($_POST['usuario']);
				$usuario -> setNombre($_POST['nombre']);
				$usuario -> setApellido($_POST['apellido']);
				$usuario -> setSexo($_POST['sexo']);
				$usuario -> setEmail($_POST['email']);
				$usuario -> setContrasenia($_POST['contrasenia']);
				$usuario -> setFechaNacimiento($_POST['fecha_nacimiento']);
				$respuesta = $usuario->actualizarRegistro($conexion);
				echo json_encode($respuesta);

			break;
			case 'insertar-registro': 
				$usuario = new Usuario();
				$usuario->setIdPais($_POST["id_pais"]);
				$usuario->setUsuario($_POST["usuario"]);
				$usuario->setNombre($_POST["nombre"]);
				$usuario->setApellido($_POST["apellido"]);
				$usuario->setSexo($_POST["sexo"]);
				$usuario->setEmail($_POST["email"]);
				$usuario->setContrasenia($_POST["contrasenia"]);
				$usuario->setFechaNacimiento($_POST["fecha_nacimiento"]);
				$usuario->setUrlFotoPerfil($_POST["url_foto_perfil"]);
				$usuario->setTipoUsuario($_POST["id_tipo_usuario"]);
				$respuesta=$usuario->insertarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case "listar-todos":
				$respuesta = Usuario::listarTodos($conexion);
				echo json_encode($respuesta);
			break;
			case "seleccionar":
				$usuario = new Usuario();
				$usuario->setIdUsuario($_POST["id_usuario"]);
				$respuesta = $usuario->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			case "eliminar-registro":
				$respuesta=Usuario::eliminarRegistro($conexion, $_POST["id_usuario"]);
				echo json_encode($respuesta);
			break;
			case 'obtener-datos-usuario':
				$respuesta = Usuario::obtenerDatosUsuario($conexion,$_SESSION['id_usuario']);
				echo json_encode($respuesta);
				break;
			default:
				echo json_encode("Petición inválida");
				break;
		}
		$conexion->cerrarConexion();
	}else{
		echo json_encode("No se especificó petición");
	}
?>
