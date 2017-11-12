<?php
	include("../class/class-conexion.php");
	include("../class/class-idioma.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'listar_idiomas':
				Idioma::listarIdiomas($conexion);
			break;
			case 'seleccionar_idioma':
				Idioma::seleccionarIdioma($conexion,$_POST['id_idioma']);
			break;
			case 'buscar_idioma':
				Idioma::buscarIdioma($conexion,$_POST['txt-busqueda']);
			break;
			case 'guardar_idioma':
				$idioma = new Idioma(null,
							 $_POST['inputNombre'],
							 $_POST['inputAbreviatura']
							 );
				$idioma->guardarIdioma($conexion);
			break;
			case 'eliminar_idioma':
				Idioma::eliminarIdioma($conexion,$_POST['codigoIdioma']);
			break;
			case "actualizar_idioma":
				$idioma = new Idioma();
				$idioma->setIdIdioma($_POST["id_idioma"]);
				$idioma->setNombreIdioma($_POST["nombre_idioma"]);
				$idioma->setAbreviaturaIdioma($_POST["abreviatura_idioma"]);
				echo $idioma->actualizarIdioma($conexion);
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

