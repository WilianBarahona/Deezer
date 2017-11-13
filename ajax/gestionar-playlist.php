<?php
	include("../class/class-conexion.php");
	include("../class/class-playlist.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			//case '': 
			////
			case "listar-todos":
				echo Playlist::listarTodos($conexion);
			//break;
			case "listar-todos-top":
				
			default:
				echo json_encode("Petición inválida");
				break;
		}
		$conexion->cerrarConexion();
	}else{
		echo json_encode("No se especificó petición");
	}
?>
