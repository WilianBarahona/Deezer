<?php
	class TipoSuscripcion{
		private $idTipoSuscripcion;
		private $tipoSuscripcion;
		private $diasDuracion;

		public function __construct($idTipoSuscripcion, $tipoSuscripcion, $diasDuracion){
			$this->idTipoSuscripcion = $idTipoSuscripcion;
			$this->tipoSuscripcion = $tipoSuscripcion;
			$this->diasDuracion = $diasDuracion;
		}

		function setIdTipoSuscripcion($idTipoSuscripcion) { 
			$this->idTipoSuscripcion = $idTipoSuscripcion; 
		}

		function getIdTipoSuscripcion() { 
			return $this->idTipoSuscripcion; 
		}

		function setTipoSuscripcion($tipoSuscripcion) { 
			$this->tipoSuscripcion = $tipoSuscripcion; 
		}

		function getTipoSuscripcion() { 
			return $this->tipoSuscripcion; 
		}

		function setDiasDuracion($diasDuracion) { 
			$this->diasDuracion = $diasDuracion; 
		}

		function getDiasDuracion() { 
			return $this->diasDuracion; 
		}

		public function __toString(){
			return "idTipoSuscripcion: ".$this->idTipoSuscripcion." tipoSuscripcion: ".$this->tipoSuscripcion." diasDuracion: ".$this->diasDuracion;
		}
	}

?>