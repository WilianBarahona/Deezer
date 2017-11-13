<?php
	include("../class/class-conexion.php");
	include("../class/class-tipo-suscripcion.php");
	if(isset($_POST["accion"])){
		$conexion = new Conexion();
		switch ($_POST['accion']) {
			case 'listar_tipo_suscripcion':
				TipoSuscripcion::listarTipoSuscripcion($conexion);
			break;
			case 'seleccionar_tipo_suscripcion':
				TipoSuscripcion::seleccionarTipoSuscripcion($conexion,$_POST['id_tipo_suscripcion']);
			break;
			case 'buscar_tipo_suscripcion':
				TipoSuscripcion::buscarTipoSuscripcion($conexion,$_POST['txt-busqueda']);
			break;
			case 'guardar_tipo-suscripcion':
				$suscripcion = new TipoSuscripcion(null,
							 $_POST['inputNombre'],
							 $_POST['inputDuracion']
							 );
				$suscripcion->guardarTipoSuscripcion($conexion);
			break;
			case 'eliminar_tipo_suscripcion':
				TipoSuscripcion::eliminarTipoSuscripcion($conexion,$_POST['codigo-tipo-suscripcion']);
			break;
			case "actualizar_tipo_suscripcion":
				$suscripcion = new TipoSuscripcion();
				$suscripcion->setIdTipoSuscripcion($_POST["idSuscripcion"]);
				$suscripcion->setTipoSuscripcion($_POST["tipoSuscripcion"]);
				$suscripcion->setDiasDuracion($_POST["diasDuracion"]);
				echo $suscripcion->actualizarTipoSuscripcion($conexion);
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

