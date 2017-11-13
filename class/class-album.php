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
			$sql='SELECT 
					a.id_album, a.id_artista,
					b.nombre_artista, a.nombre_album,
					a.anio, a.album_cover_url
				FROM tbl_albumes a
				INNER JOIN tbl_artistas b
				ON (a.id_artista = b.id_artista);
			';
			$resultado = $conexion->ejecutarConsulta($sql);
			$albumes = array();
			while ($album=$conexion->obtenerFila($resultado)) {
				$album["numero_canciones"] = $this->getNumeroCanciones($conexion, $album["id_album"]);
				$albumes[] = $album;
			}
			return json_encode($albumes);
		}

		public static function listarPorArtista($conexion,$codigoArtista){
			$sql= "SELECT 
						a.id_album, b.id_artista,
						b.nombre_artista,a.nombre_album, 
						a.anio, a.album_cover_url
				  FROM tbl_albumes a
				  INNER JOIN tbl_artistas b
				  ON (a.id_artista = b.id_artista)
				  where b.id_artista = ".$codigoArtista;
				
			$resultado = $conexion->ejecutarConsulta($sql);
			$albumes = array();
			while ($album=$conexion->obtenerFila($resultado)) {
				$album["numero_canciones"] = $this->getNumeroCanciones($conexion, $album["id_album"]);
				$albumes[] = $album;
			}
			return json_encode($albumes);
		}

		#### SELECCIONAR REGISTRO DE ALBUM POR CODIGO
		#	return objeto json con todos los ALBUMS
		public function seleccionar($conexion){
			$resultado=$conexion->ejecutarConsulta(sprintf("
				SELECT
				  a.id_album, a.id_artista,
				  b.nombre_artista, a.nombre_album,
				  a.anio, a.album_cover_url
				FROM tbl_albumes a
				INNER JOIN tbl_artistas b
				ON (a.id_artista = b.id_artista)
				WHERE a.id_album = %s;
				",
				$conexion->antiInyeccion($this->getIdAlbum())
			));
			$album=$conexion->obtenerFila($resultado);
			$album["numero_canciones"] = $this->getNumeroCanciones($conexion, $album["id_album"]);
			return json_encode($album);
		}

		####  INSERTAR RESGISTRO DE ALBUM
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			$sql=sprintf("
				INSERT INTO tbl_albumes
				(id_artista, nombre_album, anio, album_cover_url)
				VALUES(%s, '%s', '%s', '%s');
				",
				$conexion->antiInyeccion($this->getIdArtista()),
				$conexion->antiInyeccion($this->getNombreAlbum()),
				$conexion->antiInyeccion($this->getAnio()),
				$conexion->antiInyeccion($this->getCoverAlbumUrl())
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
				""
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

		public static function getNumeroCanciones($conexion, $idAlbum){
			$sql =sprintf("
				SELECT COUNT(*) as numero_canciones
				FROM tbl_canciones
				WHERE id_album=%s"
			,
				$conexion->antiInyeccion($idAlbum)
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			$fila = $conexion->obtenerFila($resultado);
			return $fila["numero_canciones"];
		}
	}
?>