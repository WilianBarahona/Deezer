<?php
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion;
		switch ($_POST['accion']) {

			case 'listar-todos':
				include("../class/class-genero.php");
				$respuesta = Genero::listarTodos($conexion);
				echo json_encode($respuesta);
			break;
			
			case "seleccionar": 
				include("../class/class-genero.php");
				$genero = new Genero($_POST["id_genero"], null);
				$respuesta = $genero->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			
			case "actualizar-registro":
				include("../class/class-genero.php");
				$genero = new Genero();
				$genero->setIdGenero($_POST["id_genero"]);
				$genero->setNombreGenero($_POST["nombre_genero"]);
				$respuesta = $genero->actualizarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			
			case "eliminar-registro": 
				include("../class/class-genero.php");
				$respuesta= Genero::eliminarRegistro($conexion, $_POST["id_genero"]);
				echo json_encode($respuesta);
			break;

			case 'insertar-registro':
				include("../class/class-genero.php");
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

