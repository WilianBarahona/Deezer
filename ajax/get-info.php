<?php
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			case 'validar_login':
				include("../class/class-usuario.php");
				$password = $_POST['inputPassword'];
				$password = hash('sha512',$password);
				Usuario::verificarUsuario($conexion,$_POST['inputEmail'],$password);
				break;
			case 'registrar_usuario':
				echo "Registro de usuarios";
				break;
			###################################### ALBUMES
			case 'get_albumes':
				include("../class/class-album.php");
				Album::listarTodos($conexion);
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
