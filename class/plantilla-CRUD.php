<?php 
#### LISTAR TODOS LOS <CLASE>S
#	return objeto json con todos los <CLASE>S
public static function listarTodos($conexion){
}
#### SELECCIONAR REGISTRO DE <CLASE> POR CODIGO
#	return objeto json con todos los <CLASE>S
public function seleccionar($conexion){
}
####  INSERTAR RESGISTRO DE <CLASE>
#     return false or true ####  JSON
public function insertarRegistro($conexion){
	return json_encode($resultado);
}
#### ACTUALIZAR REGISTRO <CLASE>
#     return false or true ####  JSON
public static function actualizarRegistro($conexion){
	return json_encode($resultado);
}
#### ELEMINAR REGISTRO <CLASE>S
#     return false or true ####  JSON
public static function eliminarRegistro($conexion, $id){
	return json_encode($resultado);
}
 ?>