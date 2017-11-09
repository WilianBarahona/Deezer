<?php  
	include("../class/class-conexion.php");
	if(isset($_GET["accion"])){
		$accion = $_GET["accion"];
		$conexion = new Conexion();
		switch ($accion) {
			// case : break;
				// include("../class/class-conexion.php");
			
			########################################### ARTISTA
			case 'insertar-artista': 
				include("../class/class-artista.php");
				$artista = new Artista();
				$artista->setIdPais($_POST["id_pais"]);
				$artista->setNombreArtista($_POST["nombre_artista"]);
				$artista->setBiografia($_POST["biografia"]);
				$artista->setUrlFoto($_POST["url_foto"]);

				$resultado = $artista->insertarRegistro($conexion);
				echo $resultado; // FORMATO JSON
			break;

			##########################################
			default:
				echo "Instrucción post no reconocida";
				break;
		}
		$conexion->cerrarConexion();
	}else{
		echo "No se encontró parametro de instrucción post";
	}

?>
