<?php

	class Persona{

		private $nombre;
		private $apellido;
		private $sexo;
		private $fechaNacimiento;

		public function __construct($nombre,
					$apellido,
					$sexo,
					$fechaNacimiento){
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->sexo = $sexo;
			$this->fechaNacimiento = $fechaNacimiento;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getSexo(){
			return $this->sexo;
		}
		public function setSexo($sexo){
			$this->sexo = $sexo;
		}
		public function getFechaNacimiento(){
			return $this->fechaNacimiento;
		}
		public function setFechaNacimiento($fechaNacimiento){
			$this->fechaNacimiento = $fechaNacimiento;
		}
		public function __toString(){
			return "Nombre: " . $this->nombre . 
				" Apellido: " . $this->apellido . 
				" Sexo: " . $this->sexo . 
				" FechaNacimiento: " . $this->fechaNacimiento;
		}

		#### LISTAR TODOS LOS PERSONAS
		#	return objeto json con todos los PERSONAS
		public static function listarTodos($conexion){
		}
		#### SELECCIONAR REGISTRO DE PERSONA POR CODIGO
		#	return objeto json con todos los PERSONAS
		public function seleccionar($conexion){
		}
		####  INSERTAR RESGISTRO DE PERSONA
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ACTUALIZAR REGISTRO PERSONA
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO PERSONAS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			return json_encode($resultado);
		}

	}
?>