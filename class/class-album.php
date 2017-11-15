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
				$album["numero_canciones"] = Album::getNumeroCanciones($conexion, $album["id_album"]);
				$albumes[] = $album;
			}
			return $albumes;
		}

		public static function listarPorArtista($conexion,$idArtista){
			$sql= "SELECT 
						a.id_album, b.id_artista,
						b.nombre_artista,a.nombre_album, 
						a.anio, a.album_cover_url
				  FROM tbl_albumes a
				  INNER JOIN tbl_artistas b
				  ON (a.id_artista = b.id_artista)
				  where b.id_artista = ".$idArtista;
				
			$resultado = $conexion->ejecutarConsulta($sql);
			$albumes = array();
			while ($album=$conexion->obtenerFila($resultado)) {
				$album["numero_canciones"] = Album::getNumeroCanciones($conexion, $album["id_album"]);
				$albumes[] = $album;
			}
			return $albumes;
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
			$album["numero_canciones"] = Album::getNumeroCanciones($conexion, $album["id_album"]);
			$album["canciones"] = Album::getCanciones($conexion, $album["id_album"]);
			return $album;
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
			return $resultado;
		}


		#### ACTUALIZAR REGISTRO ALBUM
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			$sql=sprintf("
				UPDATE tbl_albumes
				SET
				  id_artista=%s,
				  nombre_album='%s',
				  anio='%s',
				  album_cover_url='%s'
				WHERE id_album=%s;
			",
				$conexion->antiInyeccion($this->getIdArtista()),
				$conexion->antiInyeccion($this->getNombreAlbum()),
				$conexion->antiInyeccion($this->getAnio()),
				$conexion->antiInyeccion($this->getCoverAlbumUrl()),
				$conexion->antiInyeccion($this->getIdAlbum())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
		#### ELIMINAR REGISTRO ALBUMS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			$sql1 = sprintf("
				DELETE FROM tbl_canciones
				WHERE id_album = %s;
			",
				$conexion->antiInyeccion($id)
			);
			$sql2 = sprintf("
				DELETE FROM tbl_comentarios_por_album
				WHERE id_album= %s;
			",
				$conexion->antiInyeccion($id)
			);
			$sql3=sprintf("
				DELETE FROM tbl_albumes_por_usuario
				WHERE id_album= %s;
			",
				$conexion->antiInyeccion($id)
			);
			$sql4=sprintf("
				DELETE FROM tbl_albumes
				WHERE id_album= %s;
			",
				$conexion->antiInyeccion($id)
			);
			$resultado1=$conexion->ejecutarConsulta($sql1);
			$resultado2=$conexion->ejecutarConsulta($sql2);
			$resultado3=$conexion->ejecutarConsulta($sql3);
			$resultado4=$conexion->ejecutarConsulta($sql4);
			return ($resultado1)&&($resultado2)&&($resultado3)&&($resultado4);
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
			$album = $conexion->obtenerFila($resultado);
			return $album["numero_canciones"];
		}

		public static function getCanciones($conexion, $idAlbum){
			$sql=sprintf("
				SELECT
				  a.id_cancion,a.nombre_cancion,c.id_artista,
				  c.nombre_artista,a.id_album,b.nombre_album,
				  b.album_cover_url,a.url_audio,a.reproducciones
				FROM tbl_canciones a
				INNER JOIN tbl_albumes b
				ON (a.id_album=b.id_album)
				INNER JOIN tbl_artistas c
				ON(b.id_artista=c.id_artista)
				WHERE a.id_album=%s;
			",
				$conexion->antiInyeccion($idAlbum)
			);
			$canciones=array();
			$resultado=$conexion->ejecutarConsulta($sql);
			while ($cancion = $conexion->obtenerFila($resultado)) {
				$canciones[]=$cancion;
			}
			return $canciones;
		}

	public static function agregarComentario($conexion, $idAlbum, $idUsuario, $comentario){
		$sql=sprintf("
			INSERT INTO tbl_comentarios_por_album
			(id_album, id_usuario, comentario, fecha)
			VALUES(%s,%s,'%s', CURRENT_TIMESTAMP())
		",
			$conexion->antiInyeccion($idAlbum),
			$conexion->antiInyeccion($idUsuario),
			$conexion->antiInyeccion($comentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function editarComentario($conexion, $idComentario, $comentario){
		$sql=sprintf("
			UPDATE tbl_comentarios_por_album SET
			comentario='%s'
			WHERE id_comentario=%s
		",
			$conexion->antiInyeccion($comentario),
			$conexion->antiInyeccion($idComentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function eliminarComentario($conexion, $idComentario){
		$sql=sprintf("
			DELETE FROM tbl_comentarios_por_album
			WHERE id_comentario=%s
		",
			$conexion->antiInyeccion($idComentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function agregarFavorito($conexion, $idUsuario, $idAlbum){
		$sql=sprintf("
			INSERT INTO tbl_albumes_por_usuarios
			(id_album, id_usuario)
			VALUES(%s, %s)
		",
			$conexion->antiInyeccion($idAlbum),
			$conexion->antiInyeccion($idUsuario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;	
	}

	public static function eliminarFavorito($conexion, $idUsuario, $idAlbum){
		$sql=sprintf("
			DELETE FROM tbl_albumes_por_usuarios
			WHERE id_usuario = %s AND id_album = %s
		",
			$conexion->antiInyeccion($idAlbum),
			$conexion->antiInyeccion($idUsuario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;	
	}

	public static function listarComentarios($conexion, $idAlbum){
		$sql=sprintf("
			SELECT
			  a.id_comentario,
			  a.id_album,
			  a.id_usuario,
			  CONCAT(b.nombre, ' ', b.apellido) as nombre_usuario,
			  b.url_foto_perfil,
			  b.usuario,
			  b.email,
			  a.comentario,
			  a.fecha
			FROM tbl_comentarios_por_album a
			INNER JOIN tbl_usuarios b
			ON(a.id_usuario = b.id_usuario)
			WHERE id_album=%s

		",
			$conexion->antiInyeccion($idAlbum)
		);
		$comentarios=array();
		$resultado = $conexion->ejecutarConsulta($sql);
		while($comentario = $conexion->obtenerFila($resultado)){
			$comentarios[]=$comentario;
		}
		return $comentarios;
	}
}
?>
