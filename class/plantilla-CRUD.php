<?php 
#### LISTAR TODOS LOS <CLASE>S
#	return objeto json con todos los <CLASE>S
public static function listarTodos($conexion){
	$sql = "
		//SELECT 
		//FROM
		//ORDER BY ... ASC; // Opcional
	";

	$resultado = $conexion->ejecutarConsulta($sql);
	$objetos=array(); // Renombrar
	while($fila=$conexion->obtenerFila($resultado)){
		$objeto = array(); //Renombrar
		//$objeto["campo1"]= $fila["id"];
		// $objeto["campo2"]= $fila["id"]; //...

		$objetos[]=$objeto;
	}
	return json_encode($objetos);
}

#### SELECCIONAR REGISTRO DE <CLASE> POR CODIGO
#	return objeto json con todos los <CLASE>S
public function seleccionar($conexion){
	$resultado=$conexion->ejecutarConsulta(sprintf("
		//SELECT
		//FROM
		//WHERE
		",
		//$conexion->antiInyeccion($this->getIdGenero())
	));
	$fila=$conexion->obtenerFila($resultado);
	return json_encode($fila);
}

####  INSERTAR RESGISTRO DE <CLASE>
#     return false or true ####  JSON
public function insertarRegistro($conexion){
	$sql=sprintf("
		//INSERT INTO
		//()
		//VALUES();
		",
		//$conexion->antiInyeccion($this->get...),
	);
	$resultado=$conexion->ejecutarConsulta($sql);
	return json_encode($resultado);
}


#### ACTUALIZAR REGISTRO <CLASE>
#     return false or true ####  JSON
public static function actualizarRegistro($conexion){
	$sql=sprintf("
		//UPDATE
		//... = ...
		//WHERE
	",
		//$conexion->antiInyeccion($this->getNombreGenero()),
	);
	$resultado=$conexion->ejecutarConsulta($sql);
	return json_encode($resultado);
}
#### ELIMINAR REGISTRO <CLASE>S
#     return false or true ####  JSON
public static function eliminarRegistro($conexion, $id){
	$sql = sprintf("
		//DELETE FROM 
		//WHERE
	",
		$conexion->antiInyeccion($id)
	);
	$resultado=$conexion->ejecutarConsulta($sql);
	return json_encode($resultado);
}

?>