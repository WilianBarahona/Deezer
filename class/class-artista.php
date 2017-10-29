<?php
	class Artista{
		private $idArtista;
		private $idPais;
		private $nombreArtista;
		private $biografia;
		private $urlFoto;

		public function __construct($idArtista,$idPais,$nombreArtista,$biografia,$urlFoto){
			$this->idArtista = $idArtista;
			$this->idPais = $idPais;
			$this->nombreArtista = $nombreArtista;
			$this->biografia = $biografia;
			$this->urlFoto = $urlFoto;
		}

		public function setIdArtista($idArtista) { 
			$this->idArtista = $idArtista; 
		}
		
		public function getIdArtista() { 
			return $this->idArtista; 
		}
		
		public function setIdPais($idPais) { 
			$this->idPais = $idPais; 
		}
		
		public function getIdPais() { 
			return $this->idPais; 
		}
		
		public function setNombreArtista($nombreArtista) { 
			$this->nombreArtista = $nombreArtista; 
		}
		
		public function getNombreArtista() { 
			return $this->nombreArtista; 
		}
		
		public function setBiografia($biografia) { 
			$this->biografia = $biografia; 
		}
		
		public function getBiografia() { 
			return $this->biografia; 
		}
		
		public function setUrlFoto($urlFoto) { 
			$this->urlFoto = $urlFoto; 
		}
		
		public function getUrlFoto() { 
			return $this->urlFoto; 
		}

		public function __toString(){
			return "IdArtista: " . $this->idArtista . 
				" IdPais: " . $this->idPais . 
				" NombreArtista: " . $this->nombreArtista . 
				" Biografia: " . $this->biografia . 
				" UrlFoto: " . $this->urlFoto;
		}

	}
?>