<?php
	class TipoVisibilidad{
		private $idTipoVisibilidad;
		private $tipoVisibilidad;

		public function __construct($idTipoVisibilidad, $tipoVisibilidad){
			$this->idTipoVisibilidad = $idTipoVisibilidad;
			$this->tipoVisibilidad = $tipoVisibilidad;
		}

		public function setIdTipoVisibilidad($idTipoVisibilidad) { 
			$this->idTipoVisibilidad = $idTipoVisibilidad; 
		}

		public function getIdTipoVisibilidad() { 
			return $this->idTipoVisibilidad; 
		}

		public function setTipoVisibilidad($tipoVisibilidad) { 
			$this->tipoVisibilidad = $tipoVisibilidad; 
		}

		public function getTipoVisibilidad() { 
			return $this->tipoVisibilidad; 
		}

		public function __toString(){
			return "idTipoVisibilidad: ".$this->idTipoVisibilidad." tipoVisibilidad: ".$this->tipoVisibilidad;
		}
	}

?>