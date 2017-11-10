<?php
	class TipoDispositivo{
		private $idTipoDispositivo;
		private $nombreDispositivo;

		public function __construct($idTipoDispositivo=null, $nombreDispositivo=null){
			$this->idTipoDispositivo = $idTipoDispositivo;
			$this->nombreDispositivo = $nombreDispositivo;
		}

		public function setIdTipoDispositivo($idTipoDispositivo) {
			$this->idTipoDispositivo = $idTitpoDispositivo; 
		}

		public function getIdTipoDispositivo() { 
			return $this->idTipoDispositivo; 
		}

		public function setNombreDispositivo($nombreDispositivo) { 
			$this->nombreDispositivo = $nombreDispositivo; 
		}

		public function getNombreDispositivo() { 
			return $this->nombreDispositivo; 
		}

		public function __toString(){
			return "idTitpoDispositivo: ".$this->idTitpoDispositivo." nombreDispositivo: ".$this->nombreDispositivo;
		}
		
	}
?>