<?php
	include("../class/class-conexion.php");
	include("../class/class-album.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case "listar-albumes": 
				echo Album::listarTodos($conexion);
			break;
			case 'listar-albumes-artista':
				echo Album::listarPorArtista($conexion, $_POST["codigo_artista"]);
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

