<?php
	class Album{
		private $idAlbum;
		private $idArtista;
		private $nombreAlbum;
		private $anio;
		private $coverAlbumUrl;

		public function __construct($idAlbum, $idArtista, $nombreAlbum, $anio, $coverAlbumUrl){
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
			return "IdAlbum: ".$this->idAlbum. " IdArtista: ".$this->idArtista." NombreAlbum: ".$this->nombreAlbum." Año: ".$this->anio." CoverAlbumUrl: ".$this->coverAlbumUrl;
		}
	}
?>