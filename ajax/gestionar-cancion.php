<?php
	include("../class/class-conexion.php");
	include("../class/class-cancion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			case 'insertar-registro': 
				$cancion = new Cancion();
				$cancion->setIdAlbum($_POST["id_album"]);
				$cancion->setIdIdioma($_POST["id_idioma"]);
				$cancion->setNombreCancion($_POST["nombre_cancion"]);
				$cancion->setUrlAudio($_POST["url_audio"]);
				$respuesta = $cancion->insertarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case 'seleccionar':
				$cancion = new Cancion();
				$cancion->setIdCancion($_POST["id_cancion"]);
				$respuesta=$cancion->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			case 'eliminar-registro':
				$respuesta = Cancion::eliminarRegistro($conexion, $_POST["id_cancion"]);
				echo json_encode($respuesta);
			break;
			case 'actualizar-registro':
				$cancion = new Cancion();
				$cancion->setIdCancion($_POST["id_cancion"]);
				$cancion->setIdAlbum($_POST["id_album"]);
				$cancion->setIdIdioma($_POST["id_idioma"]);
				$cancion->setNombreCancion($_POST["nombre_cancion"]);
				$cancion->setUrlAudio($_POST["url_audio"]);
				$respuesta = $cancion->actualizarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case 'listar-todos':
				$respuesta = Cancion::listarTodos($conexion);
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