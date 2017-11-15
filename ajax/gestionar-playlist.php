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
			/*case "listar-todos-top":
			break;*/
			case "seleccionar":
				$playlist = new Playlist();
				$playlist->setIdPlaylist($_POST["id_playlist"]);
				$respuesta = $playlist->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			case "actualizar-registro":
				$playlist = new Playlist();
				$playlist->setIdPlaylist($_POST["id_playlist"]);
				$playlist->setIdTipoVisibilidad($_POST["id_tipo_visibilidad"]);
				$playlist->setNombrePlaylist($_POST["nombre_playlist"]);
				$playlist->setIdUsuario($_POST["id_usuario"]);
				$playlist->setUrlImagenPlaylist($_POST["url_foto_playlist"]);
				$respuesta = $playlist->actualizarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case "insertar-registro":
				$playlist = new Playlist();
				$playlist->setIdTipoVisibilidad($_POST["id_tipo_visibilidad"]);
				$playlist->setNombrePlaylist($_POST["nombre_playlist"]);
				$playlist->setIdUsuario($_POST["id_usuario"]);
				$playlist->setUrlImagenPlaylist($_POST["url_foto_playlist"]);
				$respuesta = $playlist->insertarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case "eliminar-registro":
				$respuesta=Playlist::eliminarRegistro($conexion,$_POST["id_playlist"]);
				echo json_encode($respuesta);
			break;
			case "buscar-por-nombre":
				$respuesta = Playlist::buscarPorNombre($conexion,$_POST["nombre_playlist"]);
				echo json_encode($respuesta);
			break;

			case "listar-comentarios":
				$respuesta = Playlist::listarComentarios($conexion, $_POST["id_playlist"]);
				echo json_encode($respuesta);
			break;
			case "agregar-comentario":
				$respuesta = Playlist::agregarComentario($conexion, $_POST["id_playlist"], $_POST["id_usuario"], $_POST["comentario"]);
				echo json_encode($respuesta);
			break;
			case "editar-comentario":
				$respuesta = Playlist::editarComentario($conexion, $_POST["id_comentario"], $_POST["comentario"]);
				echo json_encode($respuesta);
			break;
			case "eliminar-comentario":
				$respuesta = Playlist::eliminarComentario($conexion, $_POST["id_comentario"]);
				echo json_encode($respuesta);
			break;

			case "agregar-favorito":
				$respuesta = Playlist::agregarFavorito($conexion,  $_POST["id_usuario"], $_POST["id_playlist"]);
				echo json_encode($respuesta);
			break;

			case "eliminar-favorito":
				$respuesta = Playlist::eliminarFavorito($conexion,  $_POST["id_usuario"], $_POST["id_playlist"]);
				echo json_encode($respuesta);
			break;

			case "agregar-cancion":
				$respuesta = Playlist::agregarCancion($conexion,  $_POST["id_cancion"], $_POST["id_playlist"]);
				echo json_encode($respuesta);
			break;
			case "eliminar-cancion":
				$respuesta = Playlist::eliminarCancion($conexion,  $_POST["id_cancion"], $_POST["id_playlist"]);
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