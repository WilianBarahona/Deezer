<?php
	class Cancion{
		private $idCancion;
		private $idAlbum;
		private $idIdioma;
		private $nombreCancion;
		private $urlAudio;

		public function __construct($idCancion=null,$idAlbum=null,$idIdioma=null,$nombreCancion=null,$urlAudio=null){
			$this->idCancion = $idCancion;
			$this->idAlbum = $idAlbum;
			$this->idIdioma = $idIdioma;
			$this->nombreCancion = $nombreCancion;
			$this->urlAudio = $urlAudio;
		}

		public function setIdCancion($idCancion) { 
			$this->idCancion = $idCancion; 
		}
		
		public function getIdCancion() { 
			return $this->idCancion; 
		}
		
		public function setIdAlbum($idAlbum) { 
			$this->idAlbum = $idAlbum; 
		}
		
		public function getIdAlbum() { 
			return $this->idAlbum; 
		}
		
		public function setIdIdioma($idIdioma) { 
			$this->idIdioma = $idIdioma; 
		}
		
		public function getIdIdioma() { 
			return $this->idIdioma; 
		}
		
		public function setNombreCancion($nombreCancion) { 
			$this->nombreCancion = $nombreCancion; 
		}
		
		public function getNombreCancion() { 
			return $this->nombreCancion; 
		}
		
		public function setUrlAudio($urlAudio) { 
			$this->urlAudio = $urlAudio; 
		}
		
		public function getUrlAudio() { 
			return $this->urlAudio; 
		}

		public function __toString(){
				return "IdCancion: " . $this->idCancion . 
					" IdAlbum: " . $this->idAlbum . 
					" IdIdioma: " . $this->idIdioma . 
					" NombreCancion: " . $this->nombreCancion . 
					" UrlAudio: " . $this->urlAudio;
		}
		
		#### LISTAR TODOS LOS CANCIONES
		#	return objeto json con todos los CANCIONES
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

		#### SELECCIONAR REGISTRO DE CANCION POR CODIGO
		#	return objeto json con todos los CANCIONES
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

		####  INSERTAR RESGISTRO DE CANCION
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


		#### ACTUALIZAR REGISTRO CANCION
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
		#### ELIMINAR REGISTRO CANCIONES
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
	}
?>