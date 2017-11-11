<?php
	class Artista{
		private $idArtista;
		private $idPais;
		private $nombreArtista;
		private $biografia;
		private $urlFoto;

		public function __construct($idArtista=null,$idPais=null,$nombreArtista=null,$biografia=null,$urlFoto=null){
			$this->idArtista = $idArtista;
			$this->idPais = $idPais;
			$this->nombreArtista = $nombreArtista;
			$this->biografia = $biografia;
			$this->urlFoto = $urlFoto;
		}

		public function setIdArtista($idArtista) { 
			$this->idArtista = $idArtista; 
		}
		
		public function getIdArtista() { 
			return $this->idArtista; 
		}
		
		public function setIdPais($idPais) { 
			$this->idPais = $idPais; 
		}
		
		public function getIdPais() { 
			return $this->idPais; 
		}
		
		public function setNombreArtista($nombreArtista) { 
			$this->nombreArtista = $nombreArtista; 
		}
		
		public function getNombreArtista() { 
			return $this->nombreArtista; 
		}
		
		public function setBiografia($biografia) { 
			$this->biografia = $biografia; 
		}
		
		public function getBiografia() { 
			return $this->biografia; 
		}
		
		public function setUrlFoto($urlFoto) { 
			$this->urlFoto = $urlFoto; 
		}
		
		public function getUrlFoto() { 
			return $this->urlFoto; 
		}

		public function __toString(){
			return "IdArtista: " . $this->idArtista . 
				" IdPais: " . $this->idPais . 
				" NombreArtista: " . $this->nombreArtista . 
				" Biografia: " . $this->biografia . 
				" UrlFoto: " . $this->urlFoto;
		}

		####  INSERTAR RESGISTRO DE ARTISTA
		####  return false or true ####  JSON
		public function insertarRegistro($conexion){
			$sql=sprintf("
				INSERT INTO tbl_artistas
				(id_pais, nombre_artista, biografia_artista, url_foto_artista)
				VALUES(%s, '%s', '%s', '%s');
				",
				$conexion->antiInyeccion($this->getIdPais()),
				$conexion->antiInyeccion($this->getNombreArtista()),
				$conexion->antiInyeccion($this->getBiografia()),
				$conexion->antiInyeccion($this->getUrlFoto())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}
		
		#### LISTAR TODOS LOS ARTISTAS
		#	return objeto json con todos los ARTISTAS
		public static function listarTodos($conexion){
			$sql = "
				SELECT
				  a. id_artista as id,
				  b.nombre_pais as pais,
				  b.abreviatura_pais,
				  a.nombre_artista as nombre,
				  a.biografia_artista as biografia,
				  a.url_foto_artista as foto
				FROM tbl_artistas a
				INNER JOIN tbl_paises b
				ON(a.id_pais=b.id_pais);
			";
			$resultado = $conexion->ejecutarConsulta($sql);
			$artistas=array();
			while($fila=$conexion->obtenerFila($resultado)){
				$artista = array();
				$artista["id"]= $fila["id"];
				$artista["pais"]= $fila["pais"];
				$artista["abreviatura_pais"]= $fila["abreviatura_pais"];
				$artista["nombre"]= $fila["nombre"];
				$artista["biografia"]= $fila["biografia"];
				$artista["foto"]= $fila["foto"];
				$artistas[]=$artista;
			}
			return json_encode($artistas);
		}
		#### SELECCIONAR REGISTRO DE ARTISTA POR CODIGO
		#	return objeto json con todos los ARTISTAS
		public function seleccionar($conexion){
			$resultado=$conexion->ejecutarConsulta(sprintf("
				//SELECT
				//FROM
				//WHERE
				",
				$conexion->antiInyeccion($this->getIdGenero())
			));
			$fila=$conexion->obtenerFila($resultado);
			return json_encode($fila);
		}
		#### ACTUALIZAR REGISTRO ARTISTA
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			$sql=sprintf("
				//UPDATE
				//... = ...
				//WHERE
			",
				$conexion->antiInyeccion($this->getNombreGenero())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO ARTISTAS
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