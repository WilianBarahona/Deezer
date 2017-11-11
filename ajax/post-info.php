<?php  
	include("../class/class-conexion.php");
	if(isset($_POST["accion"])){
		$accion = $_POST["accion"];
		$conexion = new Conexion();
		switch ($accion) {
			// case : break;
				// include("../class/class-conexion.php");
			
			default:
				echo "Instrucción post no reconocida";
				break;
		}
		$conexion->cerrarConexion();
	}else{
		echo "No se encontró parametro de instrucción post";
	}

?>
