<?php
	include("../class/class-conexion.php");
	include("../class/class-album.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case "listar-todos": 
				echo Album::listarTodos($conexion);
			break;
			case 'listar-por-artista':
				echo Album::listarPorArtista($conexion, $_POST["codigo_artista"]);
			break;
			case "seleccionar":
				$album = new Album();
				$album->setIdAlbum($_POST["id_album"]);
				echo $album->seleccionar($conexion);
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

