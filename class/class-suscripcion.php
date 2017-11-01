<?php

	class Suscripcion{

		private $idSuscripcion;
		private $idTipoSuscripcion;
		private $inicioSuscripcion;

		public function __construct($idSuscripcion,
					$idTipoSuscripcion,
					$inicioSuscripcion){
			$this->idSuscripcion = $idSuscripcion;
			$this->idTipoSuscripcion = $idTipoSuscripcion;
			$this->inicioSuscripcion = $inicioSuscripcion;
		}
		public function getIdSuscripcion(){
			return $this->idSuscripcion;
		}
		public function setIdSuscripcion($idSuscripcion){
			$this->idSuscripcion = $idSuscripcion;
		}
		public function getIdTipoSuscripcion(){
			return $this->idTipoSuscripcion;
		}
		public function setIdTipoSuscripcion($idTipoSuscripcion){
			$this->idTipoSuscripcion = $idTipoSuscripcion;
		}
		public function getInicioSuscripcion(){
			return $this->inicioSuscripcion;
		}
		public function setInicioSuscripcion($inicioSuscripcion){
			$this->inicioSuscripcion = $inicioSuscripcion;
		}
		public function toString(){
			return "IdSuscripcion: " . $this->idSuscripcion . 
				" IdTipoSuscripcion: " . $this->idTipoSuscripcion . 
				" InicioSuscripcion: " . $this->inicioSuscripcion;
		}
	}
?>