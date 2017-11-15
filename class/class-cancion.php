<?php
	class Cancion{
		private $idCancion;
		private $idAlbum;
		private $idIdioma;
		private $nombreCancion;
		private $urlAudio;
		private $idGenero;

		public function __construct($idCancion=null,
									$idAlbum=null,
									$idIdioma=null,
									$nombreCancion=null,
									$urlAudio=null
		){
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

		public function setIdGenero($idGenero){
			$this->idGenero = $idGenero;
		}

		public function getIdGenero(){
			return $this->idGenero;
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
				SELECT
				  a.id_cancion, a.id_album, b.nombre_album, b.album_cover_url,
				  b.id_artista, c.nombre_artista,
				  a.id_idioma, d.nombre_idioma, d.abreviatura_idioma,
				  a.nombre_cancion,
				  a.id_genero,
				  e.nombre_genero,
				  a.url_audio,
				  a.reproducciones
				FROM tbl_canciones a
				INNER JOIN tbl_albumes b
				ON (a.id_album=b.id_album)
				INNER JOIN tbl_artistas c
				ON (b.id_artista=c.id_artista)
				INNER JOIN tbl_idioma d
				ON (a.id_idioma=d.id_idioma)
				INNER JOIN tbl_generos e
				ON (a.id_genero = e.id_genero)
			";
			$resultado = $conexion->ejecutarConsulta($sql);
			$canciones=array(); // Renombrar
			while($cancion=$conexion->obtenerFila($resultado)){
				$canciones[]=$cancion;
			}
			return $canciones;
		}

		#### SELECCIONAR REGISTRO DE CANCION POR CODIGO
		#	return objeto json con todos los CANCIONES
		public function seleccionar($conexion){
			$resultado=$conexion->ejecutarConsulta(sprintf("
				SELECT
				  a.id_cancion, a.id_album, b.nombre_album, b.album_cover_url,
				  b.id_artista, c.nombre_artista,
				  a.id_idioma, d.nombre_idioma, d.abreviatura_idioma,
				  a.nombre_cancion,
				  a.id_genero,
				  e.nombre_genero,
				  a.url_audio,
				  a.reproducciones
				FROM tbl_canciones a
				INNER JOIN tbl_albumes b
				ON (a.id_album=b.id_album)
				INNER JOIN tbl_artistas c
				ON (b.id_artista=c.id_artista)
				INNER JOIN tbl_idioma d
				ON (a.id_idioma=d.id_idioma)
				INNER JOIN tbl_generos e
				ON (a.id_genero = e.id_genero)
				WHERE id_cancion=%s;
				",
				$conexion->antiInyeccion($this->getIdCancion())
			));
			$cancion=$conexion->obtenerFila($resultado);
			return $cancion;
		}

		####  INSERTAR RESGISTRO DE CANCION
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			$sql=sprintf("INSERT INTO tbl_canciones
				(id_album, id_idioma, nombre_cancion, url_audio, id_genero)
				VALUES(%s, %s, '%s', '%s', %s)
				",
				$conexion->antiInyeccion($this->getIdAlbum()),
				$conexion->antiInyeccion($this->getIdIdioma()),
				$conexion->antiInyeccion($this->getNombreCancion()),
				$conexion->antiInyeccion($this->getUrlAudio()),
				$conexion->antiInyeccion($this->getIdGenero())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}


		#### ACTUALIZAR REGISTRO CANCION
		#     return false or true ####  JSON
		public function actualizarRegistro($conexion){
			$sql=sprintf("
				UPDATE tbl_canciones SET
				  id_album=%s,
				  id_idioma=%s,
				  nombre_cancion='%s',
				  url_audio='%s',
				  id_genero=%s
				WHERE id_cancion=%s;
			",
				$conexion->antiInyeccion($this->getIdAlbum()),
				$conexion->antiInyeccion($this->getIdIdioma()),
				$conexion->antiInyeccion($this->getNombreCancion()),
				$conexion->antiInyeccion($this->getUrlAudio()),
				$conexion->antiInyeccion($this->getIdGenero()),
				$conexion->antiInyeccion($this->getIdCancion())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
		#### ELIMINAR REGISTRO CANCIONES
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $idCancion){
			$sql = sprintf("
				DELETE FROM tbl_canciones
				WHERE id_cancion = %s;
			",
				$conexion->antiInyeccion($idCancion)
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}

		public static function agregarFavorito($conexion, $idUsuario, $idCancion){
			$sql=sprintf("
				INSERT INTO tbl_canciones_por_usuario
				(id_cancion, id_usuario)
				VALUES(%s, %s)
			",
				$conexion->antiInyeccion($idCancion),
				$conexion->antiInyeccion($idUsuario)
			);
			$resultado = $conexion->ejecutarConsulta($sql);
			return $resultado;	
		}

		public static function eliminarFavorito($conexion, $idUsuario, $idCancion){
			$sql=sprintf("
				DELETE FROM tbl_canciones_por_usuario
				WHERE id_usuario = %s AND id_cancion = %s
			",
				$conexion->antiInyeccion($idUsuario),
				$conexion->antiInyeccion($idCancion)
			);
			$resultado = $conexion->ejecutarConsulta($sql);
			return $resultado;	
		}



	}
?>