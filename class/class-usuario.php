<?php
	include("class-persona.php");
	class Usuario{

		private $idUsuario;
		private $idSuscripcion;
		private $idPais;
		private $usuario;
		private $urlFotoPerfil;
		private $email;
		private $contrasenia;

		public function __construct($nombre,$apellido,$sexo,$fechaNacimiento,$idUsuario,$idSuscripcion,$idPais,$usuario,$urlFotoPerfil,$email,$contrasenia){
			public::__construct($nombre,$apellido,$sexo,$fechaNacimiento);
			$this->idUsuario = $idUsuario;
			$this->idSuscripcion = $idSuscripcion;
			$this->idPais = $idPais;
			$this->usuario = $usuario;
			$this->urlFotoPerfil = $urlFotoPerfil;
			$this->email = $email;
			$this->contrasenia = $contrasenia;
		}
		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}
		public function getIdSuscripcion(){
			return $this->idSuscripcion;
		}
		public function setIdSuscripcion($idSuscripcion){
			$this->idSuscripcion = $idSuscripcion;
		}
		public function getIdPais(){
			return $this->idPais;
		}
		public function setIdPais($idPais){
			$this->idPais = $idPais;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getUrlFotoPerfil(){
			return $this->urlFotoPerfil;
		}
		public function setUrlFotoPerfil($urlFotoPerfil){
			$this->urlFotoPerfil = $urlFotoPerfil;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getContrasenia(){
			return $this->contrasenia;
		}
		public function setContrasenia($contrasenia){
			$this->contrasenia = $contrasenia;
		}
		public function __toString(){
			return parent::__toString()." IdUsuario: " . $this->idUsuario . 
				" IdSuscripcion: " . $this->idSuscripcion . 
				" IdPais: " . $this->idPais . 
				" Usuario: " . $this->usuario . 
				" UrlFotoPerfil: " . $this->urlFotoPerfil . 
				" Email: " . $this->email . 
				" Contrasenia: " . $this->contrasenia;
		}
	}
?>