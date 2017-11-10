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
		}
		#### SELECCIONAR REGISTRO DE PLAYLIST POR CODIGO
		#	return objeto json con todos los PLAYLISTS
		public function seleccionar($conexion){
		}
		####  INSERTAR RESGISTRO DE PLAYLIST
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ACTUALIZAR REGISTRO PLAYLIST
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO PLAYLISTS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			return json_encode($resultado);
		}

	}
?>