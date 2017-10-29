<?php
	class Genero{
		private $idGenero;
		private $nombreGenero;

		public function __construct($idGenero, $nombreGenero){
			$this->idGenero = $idGenero;
			$this->nombreGenero = $nombreGenero;
		}

		public function setIdGenero($idGenero) { 
			$this->idGenero = $idGenero; 
		}

		public function getIdGenero() { 
			return $this->idGenero; 
		}

		public function setNombreGenero($nombreGenero) { 
			$this->nombreGenero = $nombreGenero; 
		}

		public function getNombreGenero() { 
			return $this->nombreGenero; 
		}

		public function __toString(){
			return "idGenero: ".$this->idGenero." nombreGenero: ".$this->nombreGenero;
		}

	}
?>