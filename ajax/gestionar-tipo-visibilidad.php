<?php 
	include("../class/class-conexion.php");
	include("../class/class-tipo-visibilidad.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case "seleccionar":
				$respuesta=TipoVisibilidad::listarTodos($conexion);
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




