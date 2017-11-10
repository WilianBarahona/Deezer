<?php  
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$accion = $_POST["accion"];
		$conexion = new Conexion();
		switch ($accion) {
			// case : break
			
			###################################### GENERO
			case "actualizar_genero":
				include("../class/class-genero.php");
				$genero = new Genero();
				$genero->setIdGenero($_POST["id_genero"]);
				$genero->setNombreGenero($_POST["nombre_genero"]);
				echo $genero->actualizarRegistro($conexion);
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
