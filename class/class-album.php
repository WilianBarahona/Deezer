<?php
	class Album{
		private $idAlbum;
		private $idArtista;
		private $nombreAlbum;
		private $anio;
		private $coverAlbumUrl;

		public function __construct($idAlbum=null, $idArtista=null, $nombreAlbum=null, $anio=null, $coverAlbumUrl=null){
			$this->idAlbum = $idAlbum;
			$this->idArtista = $idArtista;
			$this->nombreAlbum = $nombreAlbum;
			$this->anio = $anio;
			$this->coverAlbumUrl = $coverAlbumUrl;
		}

		public function setIdAlbum($idAlbum) { 
			$this->idAlbum = $idAlbum; 
		}

		public function getIdAlbum() { 
			return $this->idAlbum; 
		}

		public function setIdArtista($idArtista) { 
			$this->idArtista = $idArtista; 
		}

		public function getIdArtista() { 
			return $this->idArtista; 
		}

		public function setNombreAlbum($nombreAlbum) { 
			$this->nombreAlbum = $nombreAlbum; 
		}

		public function getNombreAlbum() { 
			return $this->nombreAlbum; 
		}

		public function setAnio($anio) { 
			$this->anio = $anio; 
		}

		public function getAnio() { 
			return $this->anio; 
		}

		public function setCoverAlbumUrl($coverAlbumUrl) { 
			$this->coverAlbumUrl = $coverAlbumUrl; 
		}

		public function getCoverAlbumUrl() { 
			return $this->coverAlbumUrl; 
		}

		public function __toString(){
			return "IdAlbum: " . $this->idAlbum . 
				" IdArtista: " . $this->idArtista . 
				" NombreAlbum: " . $this->nombreAlbum . 
				" Anio: " . $this->anio . 
				" CoverAlbumUrl: " . $this->coverAlbumUrl;
		}

		#### LISTAR TODOS LOS ALBUMS
		#	return objeto json con todos los ALBUMS
		public static function listarTodos($conexion){
			$sql='SELECT a.id_album, b.nombre_artista, a.nombre_album, a.anio, a.album_cover_url 
				  FROM tbl_albumes a
				  INNER JOIN tbl_artistas b
				  ON (a.id_artista = b.id_artista)';
			$resultado = $conexion->ejecutarConsulta($sql);
			while ($fila=$conexion->obtenerFila($resultado)) {
				echo '<ul>';
				echo '		<li>'.$fila["nombre_album"].'';
				echo '		</li>'	;
				echo '		<li>'.$fila["nombre_artista"].'';
				echo '		</li>'	;
				echo '</ul>';
			}
		}

		#### SELECCIONAR REGISTRO DE ALBUM POR CODIGO
		#	return objeto json con todos los ALBUMS
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

		####  INSERTAR RESGISTRO DE ALBUM
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


		#### ACTUALIZAR REGISTRO ALBUM
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
		#### ELIMINAR REGISTRO ALBUMS
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