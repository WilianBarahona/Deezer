<?php  
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$accion = $_POST["accion"];
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

			########################################## GENERO
			case 'insertar-genero':
				include("../class/class-genero.php");
				$genero = new Genero();
				$genero->setNombreGenero($_POST["nombre_genero"]);
				$resultado = $genero->insertarRegistro($conexion);
				echo $resultado;
			break;
			
			default:
				echo "Instrucción post no reconocida";
				break;
		}
		$conexion->cerrarConexion();
	}else{
		echo "No se encontró parametro de instrucción post";
	}

?>
