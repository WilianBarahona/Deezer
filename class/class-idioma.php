<?php
	class Idioma{
		private $idIdioma;
		private $nombreIdioma;

		public function __construct($idIdioma=null, $nombreIdioma=null){
			$this->idIdioma = $idIdioma;
			$this->nombreIdioma = $nombreIdioma;
		}

		public function setIdIdioma($idIdioma) { 
			$this->idIdioma = $idIdioma; 
		}

		public function getIdIdioma() { 
			return $this->idIdioma; }
		public function setNombreIdioma($nombreIdioma) { 
			$this->nombreIdioma = $nombreIdioma; 
		}

		public function getNombreIdioma() { 
			return $this->nombreIdioma; 
		}

		public function __toString(){
			return "idIdioma: ".$this->idIdioma." nombreIdioma: ".$this->nombreIdioma;
		}
	}
?>