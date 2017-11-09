<?php
	class Pais{
		private $idPais;
		private $nombrePais;

		public function __construct($idPais=null, $nombrePais=null){
			$this->idPais = $idPais;
			$this->nombrePais = $nombrePais;
		}

		public function setIdPais($idPais) { 
			$this->idPais = $idPais; 
		}

		public function getIdPais() { 
			return $this->idPais; 
		}

		public function setNombrePais($nombrePais) { 
			$this->nombrePais = $nombrePais; 
		}

		public function getNombrePais() { 
			return $this->nombrePais; 
		}

		public function __toString(){
			return "idPais: ".$this->idPais." nombrePais: ".$this->nombrePais;
		}
	}
?>