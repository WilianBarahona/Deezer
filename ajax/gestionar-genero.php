<?php
	include("../class/class-conexion.php");
	include("../class/class-genero.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {

			case 'listar-todos':
				$respuesta = Genero::listarTodos($conexion);
				echo json_encode($respuesta);
			break;

			case 'listar-por-genero':
				$respuesta = Genero::listarPorGenero($conexion, $_POST["id_genero"]);
				echo json_encode($respuesta);
			break;
			
			case "seleccionar": 
				
				$genero = new Genero($_POST["id_genero"], null);
				$respuesta = $genero->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			
			case "actualizar-registro":
				$genero = new Genero();
				$genero->setIdGenero($_POST["id_genero"]);
				$genero->setNombreGenero($_POST["nombre_genero"]);
				$respuesta = $genero->actualizarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			
			case "eliminar-registro": 
				$respuesta= Genero::eliminarRegistro($conexion, $_POST["id_genero"]);
				echo json_encode($respuesta);
			break;

			case 'insertar-registro':
				$genero = new Genero();
				$genero->setNombreGenero($_POST["nombre_genero"]);
				$respuesta = $genero->insertarRegistro($conexion);
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

