<?php  
	include("../class/class-conexion.php");
	if(isset($_GET["accion"])){
		$accion = $_GET["accion"];
		$conexion = new Conexion();
		switch ($accion) {
			// case : break;

			default:
				echo "Instrucción post no reconocida";
				break;
		}
		$conexion->cerrarConexion();
	}else{
		echo "No se encontró parametro de instrucción post";
	}

?>
