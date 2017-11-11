<?php
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			##################################### ARTISTA
			case 'listar_artistas':
				include("../class/class-artista.php");
				echo Artista::listarTodos($conexion);
			break;

			case 'insertar_artista': 
				include("../class/class-artista.php");
				$artista = new Artista();
				$artista->setIdPais($_POST["id_pais"]);
				$artista->setNombreArtista($_POST["nombre_artista"]);
				$artista->setBiografia($_POST["biografia"]);
				$artista->setUrlFoto($_POST["url_foto"]);

				$resultado = $artista->insertarRegistro($conexion);
				echo $resultado; // FORMATO JSON
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

