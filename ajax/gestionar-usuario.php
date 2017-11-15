<?php
	include("../class/class-conexion.php");
	include("../class/class-usuario.php");
	session_start();
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			case 'cargar-datos': 
					$usuario=new Usuario(

						$_SESSION['id_usuario'],
						$_SESSION['id_suscripcion'],
						$_SESSION['id_pais'],
						$_SESSION['usuario'],
						$_SESSION['nombre'],
						$_SESSION['apellido'],
						$_SESSION['sexo'],
						$_SESSION['email'],
						null,
						null,
						$_SESSION['fecha_nacimiento'],
						$_SESSION['url_foto_perfil'],
						$_SESSION['tipo_usuario']

						);
					$usuario->actualizarRegistro($conexion);
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
