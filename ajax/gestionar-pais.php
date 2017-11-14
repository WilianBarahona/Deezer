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
				Pais::buscarPais($conexion,$_POST['nombre_pais']);
			break;
			case 'insertar-registro':
				$pais = new Pais(null,
							 $_POST['inputNombre'],
							 $_POST['inputName'],
							 $_POST['inputNom'],
							 $_POST['inputAbreviatura'],
							 $_POST['inputCodigoTelefono']
							 );
				$pais->guardarPais($conexion);
			break;
			case 'eliminar-registro':
				Pais::eliminarPais($conexion,$_POST['codigoPais']);
			break;
			case "actualizar-registro":
				$pais = new Pais();
				$pais->setIdPais($_POST["id_pais"]);
				$pais->setNombrePais($_POST["nombre_pais"]);
				$pais->setNamePais($_POST["name_pais"]);
				$pais->setNomPais($_POST["nom_pais"]);
				$pais->setAbreviaturaPais($_POST["abreviatura_pais"]);
				$pais->setCodigoTelefonoPais($_POST["codigo_telefono_pais"]);
				echo $pais->actualizarPais($conexion);
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

