<?php
	include("../class/class-conexion.php");
	include("../class/class-playlist.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			case "listar-todos":
				$respuesta=Playlist::listarTodos($conexion);
				echo json_encode($respuesta);
			break;
			case "listar-todos-top":
			break;
			case "seleccionar":
				$playlist = new Playlist();
				$playlist->setIdPlaylist($_POST["id_playlist"]);
				$respuesta = $playlist->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			case "actualizar-registro":
			break;
			case "eliminar-registro":
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