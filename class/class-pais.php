<?php
	class Pais{
		private $idPais;
		private $nombrePais;

		public function __construct($idPais=null, $nombrePais=null){
			$this->idPais = $idPais;
			$this->nombrePais = $nombrePais;
		}

		public function setIdPais($idPais) { 
			$this->idPais = $idPais; 
		}

		public function getIdPais() { 
			return $this->idPais; 
		}

		public function setNombrePais($nombrePais) { 
			$this->nombrePais = $nombrePais; 
		}

		public function getNombrePais() { 
			return $this->nombrePais; 
		}

		public function __toString(){
			return "idPais: ".$this->idPais." nombrePais: ".$this->nombrePais;
		}

		#### LISTAR TODOS LOS PAISES
		#	return objeto json con todos los PAISES
		public static function listarTodos($conexion){
		}
		#### SELECCIONAR REGISTRO DE PAIS POR CODIGO
		#	return objeto json con todos los PAISES
		public function seleccionar($conexion){
		}
		####  INSERTAR RESGISTRO DE PAIS
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ACTUALIZAR REGISTRO PAIS
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO PAISES
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			return json_encode($resultado);
		}

	}
?>