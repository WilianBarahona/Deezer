<?php
	include("../class/class-conexion.php");
	include("../class/class-cancion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			case 'insertar_registro': 
				$cancion = new Cancion(
					null,
					$_POST["id_album"],
					$_POST["id_idioma"],
					$_POST["nombre"],
					$_POST["url"]
				);
				$resultado = $cancion->insertarRegistro($conexion);
				echo $resultado;
			break;
			case 'eliminar_registro':
				
				break;
			case 'actualizar_registro':

				break;

			case 'listar_todos':
		
				break;
			case 'seleccionar':
				
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

