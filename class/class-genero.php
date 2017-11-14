<?php
	class Genero{
		private $idGenero;
		private $nombreGenero;

		public function __construct($idGenero=null, $nombreGenero=null){
			$this->idGenero = $idGenero;
			$this->nombreGenero = $nombreGenero;
		}

		public function setIdGenero($idGenero) { 
			$this->idGenero = $idGenero; 
		}

		public function getIdGenero() { 
			return $this->idGenero; 
		}

		public function setNombreGenero($nombreGenero) { 
			$this->nombreGenero = $nombreGenero; 
		}

		public function getNombreGenero() { 
			return $this->nombreGenero; 
		}

		public function __toString(){
			return "idGenero: ".$this->idGenero." nombreGenero: ".$this->nombreGenero;
		}

		#### LISTAR TODOS LOS GENEROS
		#	return objeto json con todos los GENEROS
		public static function listarTodos($conexion){
			$sql = "
				SELECT 
				  id_genero as id,
				  nombre_genero as nombre
				FROM tbl_generos
				ORDER BY nombre ASC;
			";

			$resultado = $conexion->ejecutarConsulta($sql);
			$generos=array();
			while($genero=$conexion->obtenerFila($resultado)){
				$generos[]=$genero;
			}
			return $generos;
		}

		#### SELECCIONAR REGISTRO DE GENERO POR CODIGO
		#	return objeto json con todos los GENEROS
		public function seleccionar($conexion){
			$resultado=$conexion->ejecutarConsulta(sprintf("
				SELECT 
					nombre_genero as nombre,
					id_genero as id
				FROM tbl_generos
				WHERE id_genero = %s
				",
				$conexion->antiInyeccion($this->getIdGenero())
			));
			$genero=$conexion->obtenerFila($resultado);
			return $genero;
		}
		
		####  INSERTAR RESGISTRO DE GENERO
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			$sql = sprintf("
				INSERT INTO tbl_generos
				(nombre_genero)
				VALUES ('%s');
				",
				$conexion->antiInyeccion($this->getNombreGenero())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
		#### ACTUALIZAR REGISTRO GENERO
		#     return false or true ####  JSON
		public function actualizarRegistro($conexion){
			$sql=sprintf("
				UPDATE tbl_generos SET
				nombre_genero='%s'
				WHERE id_genero=%s;
			",
				$conexion->antiInyeccion($this->getNombreGenero()),
				$conexion->antiInyeccion($this->getIdGenero())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
		#### ELIMINAR REGISTRO GENEROS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			$sql = sprintf("
				DELETE FROM tbl_generos
				WHERE id_genero = %s;
			",
				$conexion->antiInyeccion($id)
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
	}
?>