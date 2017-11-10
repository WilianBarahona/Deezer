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
			$sql = "
				//SELECT 
				//FROM
				//ORDER BY ... ASC; // Opcional
			";

			$resultado = $conexion->ejecutarConsulta($sql);
			$objetos=array(); // Renombrar
			while($fila=$conexion->obtenerFila($resultado)){
				$objeto = array(); //Renombrar
				//$objeto["campo1"]= $fila["id"];
				// $objeto["campo2"]= $fila["id"]; //...

				$objetos[]=$objeto;
			}
			return json_encode($objetos);
		}

		#### SELECCIONAR REGISTRO DE PERSONA POR CODIGO
		#	return objeto json con todos los PERSONAS
		public function seleccionar($conexion){
			$resultado=$conexion->ejecutarConsulta(sprintf("
				//SELECT
				//FROM
				//WHERE
				",
				//$conexion->antiInyeccion($this->getIdGenero())
			));
			$fila=$conexion->obtenerFila($resultado);
			return json_encode($fila);
		}

		####  INSERTAR RESGISTRO DE PERSONA
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			$sql=sprintf("
				//INSERT INTO
				//()
				//VALUES();
				",
				//$conexion->antiInyeccion($this->get...),
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}


		#### ACTUALIZAR REGISTRO PERSONA
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			$sql=sprintf("
				//UPDATE
				//... = ...
				//WHERE
			",
				//$conexion->antiInyeccion($this->getNombreGenero()),
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO PERSONAS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			$sql = sprintf("
				//DELETE FROM 
				//WHERE
			",
				$conexion->antiInyeccion($id)
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}

	}
?>