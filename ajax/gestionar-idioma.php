<?php
	include("../class/class-conexion.php");
	include("../class/class-idioma.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'listar-todos':
				$respuesta = Idioma::listarTodos($conexion);
				echo json_encode($respuesta);
			break;
			case 'seleccionar':
				$respuesta = Idioma::seleccionar($conexion,$_POST['id_idioma']);
				echo json_encode($respuesta);
			break;
			case 'buscar-por-nombre':
				$respuesta = Idioma::buscarPorNombre($conexion,$_POST['nombre_idioma']);
				echo json_encode($respuesta);
			break;
			case 'insertar-registro':
				$idioma = new Idioma();
				$idioma->setNombreIdioma($_POST['nombre_idioma']);
				$idioma->setAbreviaturaIdioma($_POST['abreviatura_idioma']);
				$respuesta = $idioma->insertarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case 'eliminar-registro':
				$respuesta = Idioma::eliminarRegistro($conexion,$_POST['id_idioma']);
				echo json_encode($respuesta);
			break;
			case "actualizar-registro":
				$idioma = new Idioma();
				$idioma->setIdIdioma($_POST["id_idioma"]);
				$idioma->setNombreIdioma($_POST["nombre_idioma"]);
				$idioma->setAbreviaturaIdioma($_POST["abreviatura_idioma"]);
				$respuesta = $idioma->actualizarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			default:
				echo json_encode("Petición inválida");
				break;
		}
	}else{
		echo json_encode("No se especificó petición");
	}
	$conexion->cerrarConexion();
?>

