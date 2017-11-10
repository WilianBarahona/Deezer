<?php
	class Idioma{
		private $idIdioma;
		private $nombreIdioma;

		public function __construct($idIdioma=null, $nombreIdioma=null){
			$this->idIdioma = $idIdioma;
			$this->nombreIdioma = $nombreIdioma;
		}

		public function setIdIdioma($idIdioma) { 
			$this->idIdioma = $idIdioma; 
		}

		public function getIdIdioma() { 
			return $this->idIdioma; }
		public function setNombreIdioma($nombreIdioma) { 
			$this->nombreIdioma = $nombreIdioma; 
		}

		public function getNombreIdioma() { 
			return $this->nombreIdioma; 
		}

		public function __toString(){
			return "idIdioma: ".$this->idIdioma." nombreIdioma: ".$this->nombreIdioma;
		}

		#### LISTAR TODOS LOS IDIOMAS
		#	return objeto json con todos los IDIOMAS
		public static function listarTodos($conexion){
		}
		#### SELECCIONAR REGISTRO DE IDIOMA POR CODIGO
		#	return objeto json con todos los IDIOMAS
		public function seleccionar($conexion){
		}
		####  INSERTAR RESGISTRO DE IDIOMA
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ACTUALIZAR REGISTRO IDIOMA
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO IDIOMAS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			return json_encode($resultado);
		}
	}
?>