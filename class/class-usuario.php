<?php
	include("class-persona.php");
	class Usuario extends Persona{
		private $idUsuario;
		private $idSuscripcion;
		private $idPais;
		private $usuario;
		private $urlFotoPerfil;

		public function __construct($nombre=null,$apellido=null,$sexo=null,$email=null,$contrasenia=null,$fechaNacimiento=null,$ultimaSesion=null,$idUsuario=null,$idSuscripcion=null,$idPais=null,$usuario=null,$urlFotoPerfil=null){
			parent::__construct($nombre,$apellido,$sexo,$email,$contrasenia,$fechaNacimiento,$ultimaSesion);
			$this->idUsuario = $idUsuario;
			$this->idSuscripcion = $idSuscripcion;
			$this->idPais = $idPais;
			$this->usuario = $usuario;
			$this->urlFotoPerfil = $urlFotoPerfil;
		}

		function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; }
		function getIdUsuario() { return $this->idUsuario; }
		function setIdSuscripcion($idSuscripcion) { $this->idSuscripcion = $idSuscripcion; }
		function getIdSuscripcion() { return $this->idSuscripcion; }
		function setIdPais($idPais) { $this->idPais = $idPais; }
		function getIdPais() { return $this->idPais; }
		function setUsuario($usuario) { $this->usuario = $usuario; }
		function getUsuario() { return $this->usuario; }
		function setUrlFotoPerfil($urlFotoPerfil) { $this->urlFotoPerfil = $urlFotoPerfil; }
		function getUrlFotoPerfil() { return $this->urlFotoPerfil; }

		public function __toString(){
			return parent::__toString." idUsuario: ".$this->idUsuario." idSuscripcion: ".$this->idSuscripcion." idPais: ".$this->idPais." Usuario: ".$this->usuario." urlFotoPerfil: ".$this->urlFotoPerfil;
		}
		public static function verificarUsuario($objConexion,$email,$password){
			echo "Verificando en la base";
		}

		#### LISTAR TODOS LOS USUARIOS
		#	return objeto json con todos los USUARIOS
		public static function listarTodos($conexion){
		}
		#### SELECCIONAR REGISTRO DE USUARIO POR CODIGO
		#	return objeto json con todos los USUARIOS
		public function seleccionar($conexion){
		}
		####  INSERTAR RESGISTRO DE USUARIO
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ACTUALIZAR REGISTRO USUARIO
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO USUARIOS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			return json_encode($resultado);
		}


	}
	
?>