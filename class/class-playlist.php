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
			WHERE id_playlist=1;
			",
			""
		));
		$playlist=$conexion->obtenerFila($resultado);
		return $playlist;
	}

	####  INSERTAR RESGISTRO DE PLAYLIST
	#     return false or true ####  JSON
	public function insertarRegistro($conexion){
		$sql=sprintf("
			//INSERT INTO
			//()
			//VALUES();
			",
			""
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		return json_encode($resultado);
	}


	#### ACTUALIZAR REGISTRO PLAYLIST
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
	#### ELIMINAR REGISTRO PLAYLISTS
	#     return false or true ####  JSON
	public static function eliminarRegistro($conexion, $idPlaylist){
		$sql = sprintf("
			//DELETE FROM 
			//WHERE
		",
			$conexion->antiInyeccion($idPlaylist)
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		return json_encode($resultado);
	}

	public static function getCanciones($conexion, $idPlaylist){
		$sql=sprintf("
		",
			""
		);
	}

}
?>