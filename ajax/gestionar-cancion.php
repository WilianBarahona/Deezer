<?php
	include("../class/class-conexion.php");
	include("../class/class-cancion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			case 'insertar_cancion': 
				$cancion = new Cancion(
					null,
					$_POST["id_album"],
					$_POST["id_idioma"],
					$_POST["nombre"],
					$_POST["url"]
				);
				$resultado = $cancion->insertarRegistro($conexion);
				echo $resultado;
			default:
				echo json_encode("Petición inválida");
				break;
		}
		$conexion->cerrarConexion();
	}else{
		echo json_encode("No se especificó petición");
	}
?>

