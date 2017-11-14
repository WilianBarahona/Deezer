<?php
	include("../class/class-conexion.php");
	include("../class/class-pais.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'listar-todos':
				$respuesta = Pais::listarTodos($conexion);
				echo json_encode($respuesta);
			break;
			case 'seleccionar':
				$pais=new Pais();
				$pais->setIdPais($_POST['id_pais']);
				$respuesta = $pais->seleccionar($conexion);
				echo json_encode($respuesta);
			break;
			case 'buscar-por-nombre':
				$respuesta = Pais::buscarPorNombre($conexion,$_POST['nombre_pais']);
				echo json_encode($respuesta);
			break;
			case 'insertar-registro':
				$pais = new Pais();
				$pais->setNombrePais($_POST['nombre_pais']);
				$pais->setAbreviaturaPais($_POST['abreviatura_pais']);
				$pais->setCodigoTelefonoPais($_POST['codigo_telefono_pais']);
				$respuesta = $pais->insertarRegistro($conexion);
				echo json_encode($respuesta);
			break;
			case 'eliminar-registro':
				$respuesta = Pais::eliminarRegistro($conexion,$_POST['id_pais']);
				echo json_encode($respuesta);
			break;
			case "actualizar-registro":
				$pais = new Pais();
				$pais->setIdPais($_POST["id_pais"]);
				$pais->setNombrePais($_POST["nombre_pais"]);
				$pais->setAbreviaturaPais($_POST["abreviatura_pais"]);
				$pais->setCodigoTelefonoPais($_POST["codigo_telefono_pais"]);
				$respuesta = $pais->actualizarRegistro($conexion);
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

