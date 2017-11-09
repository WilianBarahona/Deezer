<?php
	class Genero{
		private $idGenero;
		private $nombreGenero;

		public function __construct($idGenero, $nombreGenero){
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

		public static function listarGeneros($conexion){
			$sql = "
				SELECT 
				  id_genero as id,
				  nombre_genero as nombre
				FROM tbl_generos;	
			";

			$resultado = $conexion->ejecutarConsulta($sql);
			$generos=array();
			while($fila=$conexion->obtenerFila($resultado)){
				$genero = array();
				$genero["id"]= $fila["id"];
				$genero["nombre"]= $fila["nombre"];

				$generos[]=$genero;
			}
			return json_encode($generos);
		}
	}
?>