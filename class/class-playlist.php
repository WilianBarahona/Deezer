<?php

class Playlist{

	private $idPlaylist;
	private $idTipoVisibilidad;
	private $nombrePlaylist;
	private $idUsuario;
	private $urlImagenPlaylist;

	public function __construct($idPlaylist=null,
				$idTipoVisibilidad=null,
				$nombrePlaylist=null,
				$idUsuario=null,
				$urlImagenPlaylist=null){
		$this->idPlaylist = $idPlaylist;
		$this->idTipoVisibilidad = $idTipoVisibilidad;
		$this->nombrePlaylist = $nombrePlaylist;
		$this->idUsuario = $idUsuario;
		$this->urlImagenPlaylist = $urlImagenPlaylist;
	}
	public function getIdPlaylist(){
		return $this->idPlaylist;
	}
	public function setIdPlaylist($idPlaylist){
		$this->idPlaylist = $idPlaylist;
	}
	public function getIdTipoVisibilidad(){
		return $this->idTipoVisibilidad;
	}
	public function setIdTipoVisibilidad($idTipoVisibilidad){
		$this->idTipoVisibilidad = $idTipoVisibilidad;
	}
	public function getNombrePlaylist(){
		return $this->nombrePlaylist;
	}
	public function setNombrePlaylist($nombrePlaylist){
		$this->nombrePlaylist = $nombrePlaylist;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	public function getUrlImagenPlaylist(){
		return $this->urlImagenPlaylist;
	}
	public function setUrlImagenPlaylist($urlImagenPlaylist){
		$this->urlImagenPlaylist = $urlImagenPlaylist;
	}
	public function __toString(){
		return "IdPlaylist: " . $this->idPlaylist . 
			" IdTipoVisibilidad: " . $this->idTipoVisibilidad . 
			" NombrePlaylist: " . $this->nombrePlaylist . 
			" IdUsuario: " . $this->idUsuario . 
			" UrlImagenPlaylist: " . $this->urlImagenPlaylist;
	}

	#### LISTAR TODOS LOS PLAYLISTS
	#	return objeto json con todos los PLAYLISTS
	public static function listarTodos($conexion){
		$sql = "
			SELECT
			  a.id_playlist,  a.id_tipo_visibilidad, c.tipo_visibilidad, 
			  a.nombre_playlist, a.id_usuario, b.url_foto_perfil, 
			  CONCAT(b.nombre, ' ',  b.apellido) as nombre_usuario, 
			  b.email, b.usuario, a.url_foto_playlist
			FROM tbl_playlists a
			INNER JOIN tbl_usuarios b
			ON (a.id_usuario=b.id_usuario)
			INNER JOIN tbl_tipo_visibilidad c
			ON(c.id_tipo_visibilidad=a.id_tipo_visibilidad);
		";
		$resultado = $conexion->ejecutarConsulta($sql);
		$playlists=array(); // Renombrar
		while($playlist=$conexion->obtenerFila($resultado)){
			$playlist["numero_canciones"] = Playlist::getNumeroCanciones($conexion, $playlist["id_playlist"]);
			$playlists[]=$playlist;
		}
		return $playlists;
	}

	#### SELECCIONAR REGISTRO DE PLAYLIST POR CODIGO
	#	return objeto json con todos los PLAYLISTS
	public function seleccionar($conexion){
		$resultado=$conexion->ejecutarConsulta(sprintf("
			SELECT
			  a.id_playlist,
			  a.id_tipo_visibilidad,
			  c.tipo_visibilidad,
			  a.nombre_playlist,
			  a.id_usuario,
			  b.url_foto_perfil,
			  CONCAT(b.nombre,' ', b.apellido) as nombre_usuario,
			  b.email,
			  b.usuario,
			  a.url_foto_playlist
			FROM tbl_playlists a
			INNER JOIN tbl_usuarios b
			ON (a.id_usuario=b.id_usuario)
			INNER JOIN tbl_tipo_visibilidad c
			ON(c.id_tipo_visibilidad=a.id_tipo_visibilidad)
			WHERE id_playlist=%s;
		",
			$conexion->antiInyeccion($this->getIdPlaylist())
		));
		$playlist=$conexion->obtenerFila($resultado);
		$playlist["numero_canciones"] = Playlist::getNumeroCanciones($conexion, $this->getIdPlaylist());
		$playlist["canciones"] = Playlist::getCanciones($conexion, $this->getIdPlaylist());
		return $playlist;
	}

	####  INSERTAR RESGISTRO DE PLAYLIST
	#     return false or true ####  JSON
	public function insertarRegistro($conexion){
		$sql=sprintf("
			INSERT INTO tbl_playlists
			(id_tipo_visibilidad, nombre_playlist, id_usuario, url_foto_playlist)
			VALUES (%s,'%s',%s,'%s')
			",
			$conexion->antiInyeccion($this->getIdTipoVisibilidad()),
			$conexion->antiInyeccion($this->getNombrePlaylist()),
			$conexion->antiInyeccion($this->getIdUsuario()),
			$conexion->antiInyeccion($this->getUrlImagenPlaylist())
		);
		$resultado=$conexion->ejecutarConsulta($sql);

		$sql2=sprintf("
			INSERT INTO tbl_playlists_por_usuarios
			(id_usuario, id_playlist)
			VALUES(%s,%s)			
		",
			$conexion->antiInyeccion($this->getIdUsuario()),
			$conexion->antiInyeccion($conexion->ultimoId())
		);
		$resultado2=$conexion->ejecutarConsulta($sql2);
		return $resultado && $resultado2;
	}


	#### ACTUALIZAR REGISTRO PLAYLIST
	#     return false or true ####  JSON
	public function actualizarRegistro($conexion){
		$sql=sprintf("
			UPDATE tbl_playlists SET
			id_tipo_visibilidad=%s,
			nombre_playlist='%s',
			id_usuario=%s,
			url_foto_playlist='%s'
			WHERE id_playlist=%s
		",
			$conexion->antiInyeccion($this->getIdTipoVisibilidad()),
			$conexion->antiInyeccion($this->getNombrePlaylist()),
			$conexion->antiInyeccion($this->getIdUsuario()),
			$conexion->antiInyeccion($this->getUrlImagenPlaylist()),
			$conexion->antiInyeccion($this->getIdPlaylist())
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		return $resultado;
	}
	#### ELIMINAR REGISTRO PLAYLISTS
	#     return false or true ####  JSON
	public static function eliminarRegistro($conexion, $idPlaylist){
		$sql1 = sprintf("
			DELETE FROM tbl_comentarios_por_playlist
			WHERE id_playlist=%s;
		",
			$conexion->antiInyeccion($idPlaylist)
		);
		$sql2 = sprintf("
			DELETE FROM tbl_playlists_por_usuarios
			WHERE id_playlist=%s;
		",
			$conexion->antiInyeccion($idPlaylist)
		);
		$sql3 = sprintf("
			DELETE FROM tbl_canciones_por_playlist
			WHERE id_playlist=%s;
		",
			$conexion->antiInyeccion($idPlaylist)
		);
		$sql4 = sprintf("
			DELETE FROM tbl_playlists
			WHERE id_playlist=%s;
		",
			$conexion->antiInyeccion($idPlaylist)
		);
		$resultado1=$conexion->ejecutarConsulta($sql1);
		$resultado2=$conexion->ejecutarConsulta($sql2);
		$resultado3=$conexion->ejecutarConsulta($sql3);
		$resultado4=$conexion->ejecutarConsulta($sql4);
		return $resultado1 && $resultado2 && $resultado3 && $resultado4;
	}

	public static function getCanciones($conexion, $idPlaylist){
		$sql=sprintf("
			SELECT
			  a.id_playlist,a.id_cancion,
			  b.nombre_cancion,c.id_artista,d.nombre_artista,b.id_album,
			  c.nombre_album,c.album_cover_url,
			  b.url_audio,b.reproducciones
			FROM tbl_canciones_por_playlist a
			INNER JOIN tbl_canciones b
			ON (b.id_cancion = a.id_cancion)
			INNER JOIN tbl_albumes c
			ON (b.id_album = c.id_album)
			INNER JOIN tbl_artistas d
			ON(c.id_artista = d.id_artista)
			WHERE id_playlist=%s
		",
			$conexion->antiInyeccion($idPlaylist)
		);
		$canciones = array();
		$resultado = $conexion->ejecutarConsulta($sql);
		while($cancion = $conexion->obtenerFila($resultado)){
			$canciones[] = $cancion;
		}
		return $canciones;
	}

	public static function getNumeroCanciones($conexion, $idPlaylist){
		$sql =sprintf("
			SELECT COUNT(*) as numero_canciones
			FROM tbl_canciones_por_playlist
			WHERE id_playlist=%s"
		,
			$conexion->antiInyeccion($idPlaylist)
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		$playlist = $conexion->obtenerFila($resultado);
		return $playlist["numero_canciones"];
	}

	public static function buscarPorNombre($conexion,$nombrePlaylist){
			$sql = sprintf("SELECT
			  a.id_playlist,
			  a.id_tipo_visibilidad,
			  c.tipo_visibilidad,
			  a.nombre_playlist,
			  a.id_usuario,
			  b.url_foto_perfil,
			  CONCAT(b.nombre,' ', b.apellido) as nombre_usuario,
			  b.email,
			  b.usuario,
			  a.url_foto_playlist
			FROM tbl_playlists a
			INNER JOIN tbl_usuarios b
			ON (a.id_usuario=b.id_usuario)
			INNER JOIN tbl_tipo_visibilidad c
			ON(c.id_tipo_visibilidad=a.id_tipo_visibilidad)
			WHERE nombre_playlist='%s'",
			$conexion->antiInyeccion($nombrePlaylist)
			);
			$resultado = $conexion->ejecutarConsulta($sql);
			$totalFilas  = $conexion->cantidadRegistros($resultado);
			$playlists=array();
			if ($totalFilas >= 1){
				while(($playlist = $conexion->obtenerFila($resultado))){
					$playlist["numero_canciones"] = Playlist::getNumeroCanciones($conexion, $this->getIdPlaylist());
					$playlist["canciones"] = Playlist::getCanciones($conexion, $this->getIdPlaylist());
					$playlists[]=$playlist;
				}
				return $playlists;
			}
			else{
				return false;
			}
		}

	public static function agregarComentario($conexion, $idPlaylist, $idUsuario, $comentario){
		$sql=sprintf("
			INSERT INTO tbl_comentarios_por_playlist
			(id_playlist, id_usuario, comentario, fecha)
			VALUES(%s,%s,'%s', CURRENT_TIMESTAMP())
		",
			$conexion->antiInyeccion($idPlaylist),
			$conexion->antiInyeccion($idUsuario),
			$conexion->antiInyeccion($comentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function editarComentario($conexion, $idComentario, $comentario){
		$sql=sprintf("
			UPDATE tbl_comentarios_por_playlist SET
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
			DELETE FROM tbl_comentarios_por_playlist
			WHERE id_comentario=%s
		",
			$conexion->antiInyeccion($idComentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function agregarFavorito($conexion, $idUsuario, $idPlaylist){
		$sql=sprintf("
			INSERT INTO tbl_playlists_por_usuarios
			(id_playlist, id_usuario)
			VALUES(%s, %s)
		",
			$conexion->antiInyeccion($idPlaylist),
			$conexion->antiInyeccion($idUsuario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;	
	}

	public static function eliminarFavorito($conexion, $idUsuario, $idPlaylist){
		$sql=sprintf("
			DELETE FROM tbl_playlists_por_usuarios
			WHERE id_usuario = %s AND id_playlist = %s
		",
			$conexion->antiInyeccion($idUsuario),
			$conexion->antiInyeccion($idPlaylist)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;	
	}

	public static function listarComentarios($conexion, $idPlaylist){
		$sql=sprintf("
			SELECT
			  a.id_comentario,
			  a.id_playlist,
			  a.id_usuario,
			  CONCAT(b.nombre, ' ', b.apellido) as nombre_usuario,
			  b.url_foto_perfil,
			  b.usuario,
			  b.email,
			  a.comentario,
			  a.fecha
			FROM tbl_comentarios_por_playlist a
			INNER JOIN tbl_usuarios b
			ON(a.id_usuario = b.id_usuario)
			WHERE id_playlist=%s

		",
			$conexion->antiInyeccion($idPlaylist)
		);
		$comentarios=array();
		$resultado = $conexion->ejecutarConsulta($sql);
		while($comentario = $conexion->obtenerFila($resultado)){
			$comentarios[]=$comentario;
		}
		return $comentarios;
	}

	public static function agregarCancion($conexion, $idCancion, $idPlaylist){
		$sql=sprintf("
			INSERT INTO tbl_canciones_por_playlist
			(id_cancion, id_playlist)
			VALUES (%s, %s)
		",
			$conexion->antiInyeccion($idCancion),
			$conexion->antiInyeccion($idPlaylist)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function eliminarCancion($conexion, $idCancion, $idPlaylist){
		$sql=sprintf("
			DELETE FROM tbl_canciones_por_playlist
			WHERE id_cancion=%s AND id_playlist=%s
		",
			$conexion->antiInyeccion($idCancion),
			$conexion->antiInyeccion($idPlaylist)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	

	}
?>