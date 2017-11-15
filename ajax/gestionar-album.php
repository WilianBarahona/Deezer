<?php
	include("../class/class-conexion.php");
	include("../class/class-album.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case "listar-todos": 
				$respuesta = Album::listarTodos($conexion);
				echo json_encode($respuesta);
			break;
			case 'listar-por-artista':
				$respuesta = Album::listarPorArtista($conexion, $_POST["id_artista"]);
				echo json_encode($respuesta);
			break;
			case "seleccionar":
				$album = new Album();
				$album->setIdAlbum($_POST["id_album"]);
				$respuesta = $album->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			case "eliminar-registro":
				$respuesta=Album::eliminarRegistro($conexion, $_POST["id_album"]);
				echo json_encode($respuesta);
			break;

			case "insertar-registro":
				$album= new Album();
				$album->setIdArtista($_POST["id_artista"]);
				$album->setNombreAlbum($_POST["nombre_album"]);
				$album->setAnio($_POST["anio"]);
				$album->setCoverAlbumUrl($_POST["album_cover_url"]);
				$respuesta = $album->insertarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case "actualizar-registro":
				$album= new Album();
				$album->setIdAlbum($_POST["id_album"]);
				$album->setIdArtista($_POST["id_artista"]);
				$album->setNombreAlbum($_POST["nombre_album"]);
				$album->setAnio($_POST["anio"]);
				$album->setCoverAlbumUrl($_POST["album_cover_url"]);
				$respuesta = $album->actualizarRegistro($conexion);
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

