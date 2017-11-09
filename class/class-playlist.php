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
	}
?>