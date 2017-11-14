<?php
	class Idioma{
		private $idIdioma;
		private $nombreIdioma;
		private $abreviaturaIdioma;

		public function __construct($idIdioma=null, $nombreIdioma=null, $abreviaturaIdioma=null){
			$this->idIdioma = $idIdioma;
			$this->nombreIdioma = $nombreIdioma;
			$this->abreviaturaIdioma = $abreviaturaIdioma;
		}

		public function setIdIdioma($idIdioma) { 
			$this->idIdioma = $idIdioma; 
		}

		public function getIdIdioma() { 
			return $this->idIdioma; 
		}

		public function setNombreIdioma($nombreIdioma) { 
			$this->nombreIdioma = $nombreIdioma; 
		}

		public function getNombreIdioma() { 
			return $this->nombreIdioma; 
		}

		public function setAbreviaturaIdioma($abreviaturaIdioma) { 
			$this->abreviaturaIdioma = $abreviaturaIdioma; 
		}

		public function getAbreviaturaIdioma() { 
			return $this->abreviaturaIdioma; 
		}

		public function __toString(){
			return "idIdioma: ".$this->idIdioma." nombreIdioma: ".$this->nombreIdioma;
		}

		public static function listarTodos($conexion){
			$sql = "
				SELECT 
				  id_idioma,
				  nombre_idioma,
				  abreviatura_idioma
				FROM tbl_idioma";
			$resultado = $conexion->ejecutarConsulta($sql);
			$idiomas=array();
			while(($idioma=$conexion->obtenerFila($resultado))){
				$idiomas[] = $idioma;
			}
			return $idiomas;
		}

		public static function seleccionar($conexion,$idIdioma){
			$sql = sprintf("
				SELECT 
					id_idioma,
					nombre_idioma,
					abreviatura_idioma
				FROM tbl_idioma 
				WHERE id_idioma='%s'
			",
				$conexion->antiInyeccion($idIdioma)
			);
			$resultado = $conexion->ejecutarConsulta($sql);
			$idioma = $conexion->obtenerFila($resultado);
			return $idioma;
		}

		public static function buscarPorNombre($conexion,$nombreIdioma){
			$sql = sprintf("
				SELECT id_idioma,
					nombre_idioma,
					abreviatura_idioma
				FROM tbl_idioma 
				WHERE nombre_idioma='%s'
			",
				$conexion->antiInyeccion($nombreIdioma)
			);
			$resultado = $conexion->ejecutarConsulta($sql);
			$totalFilas  = $conexion->cantidadRegistros($resultado);
			$idiomas=array();
			if ($totalFilas >= 1){
				while(($idioma = $conexion->obtenerFila($resultado))){
					$idiomas[]=$idioma;
				}
				return $idiomas;
			}
			else{
				return false;
			}
		}

		public function insertarRegistro($conexion){
			$sql = sprintf("
				INSERT INTO tbl_idioma
				(nombre_idioma,abreviatura_idioma) 
				VALUES ('%s','%s')
			",
				$conexion->antiInyeccion($this->nombreIdioma),
				$conexion->antiInyeccion($this->abreviaturaIdioma)
			);
			$resultado = $conexion->ejecutarConsulta($sql);
			return $resultado;

		}

		public function actualizarRegistro($conexion){
			$sql=sprintf("
				UPDATE tbl_idioma SET
				nombre_idioma='%s',
				abreviatura_idioma='%s'
				WHERE id_idioma=%s;
			",
				$conexion->antiInyeccion($this->getNombreIdioma()),
				$conexion->antiInyeccion($this->getAbreviaturaIdioma()),
				$conexion->antiInyeccion($this->getIdIdioma())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}

		public static function eliminarRegistro($conexion,$idIdioma){
			$sql = sprintf("
				DELETE FROM tbl_idioma 
				WHERE id_idioma=%s
			",
				$conexion->antiInyeccion($idIdioma)
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
	}
?>