<?php
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {
			//case '': 
			////
			//break;
			
			case 'listar_paises': 
				include("../class/class-pais.php");
				echo Pais::listarTodos($conexion);
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
