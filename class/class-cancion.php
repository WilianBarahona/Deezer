<?php
	class Cancion{
		private $idCancion;
		private $idAlbum;
		private $idIdioma;
		private $nombreCancion;
		private $urlAudio;

		public function __construct($idCancion,$idAlbum,$idIdioma,$nombreCancion,$urlAudio){
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
	}
	

?>