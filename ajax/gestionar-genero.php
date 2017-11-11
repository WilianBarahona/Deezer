<?php
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {

			case 'listar_generos':
				include("../class/class-genero.php");
				echo Genero::listarTodos($conexion);
			break;
			
			case "seleccionar_genero": 
				include("../class/class-genero.php");
				$genero = new Genero($_POST["id_genero"], null);
				echo $genero->seleccionar($conexion);
			break;
			
			case "actualizar_genero":
				include("../class/class-genero.php");
				$genero = new Genero();
				$genero->setIdGenero($_POST["id_genero"]);
				$genero->setNombreGenero($_POST["nombre_genero"]);
				echo $genero->actualizarRegistro($conexion);
			break;
			
			case "eliminar_genero": 
				include("../class/class-genero.php");
				echo Genero::eliminarRegistro($conexion, $_POST["id_genero"]);
			break;

			case 'insertar_genero':
				include("../class/class-genero.php");
				$genero = new Genero();
				$genero->setNombreGenero($_POST["nombre_genero"]);
				$resultado = $genero->insertarRegistro($conexion);
				echo $resultado;
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

