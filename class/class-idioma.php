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

		public static function listarIdiomas($conexion){
			$sql = "
				SELECT 
				  id_idioma,
				  nombre_idioma,
				  abreviatura_idioma
				FROM tbl_idioma";

			$resultado = $conexion->ejecutarConsulta($sql);
			$idiomas=array();
			while(($fila=$conexion->obtenerFila($resultado))){
				$idiomas[] = $fila;
			}
			//var_dump($idiomas);
			echo json_encode($idiomas);
		}

		public static function seleccionarIdioma($objConexion,$idIdioma){
			$sql = sprintf("select id_idioma,
									nombre_idioma,
									abreviatura_idioma
								   	from tbl_idioma where id_idioma='%s'",
						$objConexion->antiInyeccion($idIdioma)
				);
			$informacion = $objConexion->ejecutarConsulta($sql);
			$totalFilas  = $objConexion->cantidadRegistros($informacion);
				$idiomas=array();
				while(($fila = $objConexion->obtenerFila($informacion))){
					$idiomas["id_idioma"] = $fila["id_idioma"];
					$idiomas["nombre_idioma"] = $fila["nombre_idioma"];
					$idiomas["abreviatura_idioma"] = $fila["abreviatura_idioma"];
				}
				echo json_encode($idiomas);
				//var_dump($idiomas);
			
		}

		public static function buscarIdioma($objConexion,$busqueda){
			$sql = sprintf("select id_idioma,
									nombre_idioma,
									abreviatura_idioma
								   	from tbl_idioma where nombre_idioma='%s'",
						$objConexion->antiInyeccion($busqueda)
				);
			$informacion = $objConexion->ejecutarConsulta($sql);
			$totalFilas  = $objConexion->cantidadRegistros($informacion);
			if ($totalFilas >= 1){
				$idiomas=array();
				while(($fila = $objConexion->obtenerFila($informacion))){
					$idiomas["id_idioma"] = $fila["id_idioma"];
					$idiomas["nombre_idioma"] = $fila["nombre_idioma"];
					$idiomas["abreviatura_idioma"] = $fila["abreviatura_idioma"];
				}
				echo json_encode($idiomas);
				//var_dump($idiomas);
			}
			else{
				$idiomas=array();
				$idiomas["id_idioma"]="not founded";
				$idiomas["nombre_idioma"]="not founded";
				$idiomas["abreviatura_idioma"]="not founded";
				echo json_encode($idiomas);
				//var_dump($idiomas);
			}
		}

		public function guardarIdioma($objConexion){
			$sql = sprintf("insert into tbl_idioma(nombre_idioma,
												   abreviatura_idioma) values ('%s','%s')",
						$objConexion->antiInyeccion($this->nombreIdioma),
						$objConexion->antiInyeccion($this->abreviaturaIdioma)
				);
			$objConexion->ejecutarConsulta($sql);
			echo json_encode($objConexion->ejecutarConsulta($sql));

		}

		public function actualizarIdioma($conexion){
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
			return json_encode($resultado);
		}

		public static function eliminarIdioma($objConexion,$codigo){
			$sql = sprintf("delete from tbl_idioma where id_idioma=%s",
						$objConexion->antiInyeccion($codigo)
				);
			$objConexion->ejecutarConsulta($sql);
		}
	}
?>