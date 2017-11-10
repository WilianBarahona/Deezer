<?php
include("class-persona.php");
	class Administrador{

		private $idAdministrador;
		private $usuario;
		private $email;
		private $contrasenia;
		private $ultimaSesion;
		private $urlFoto;

		public function __construct($nombre=null,$apellido=null,$sexo=null,$fechaNacimiento=null, 
					$idAdministrador=null,
					$usuario=null,
					$email=null,
					$contrasenia=null,
					$ultimaSesion=null,
					$urlFoto=null){
			parent::__construct($nombre,$apellido,$sexo,$fechaNacimiento);
			$this->idAdministrador = $idAdministrador;
			$this->usuario = $usuario;
			$this->email = $email;
			$this->contrasenia = $contrasenia;
			$this->ultimaSesion = $ultimaSesion;
			$this->urlFoto = $urlFoto;
		}
		public function getIdAdministrador(){
			return $this->idAdministrador;
		}
		public function setIdAdministrador($idAdministrador){
			$this->idAdministrador = $idAdministrador;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
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
		public function getUltimaSesion(){
			return $this->ultimaSesion;
		}
		public function setUltimaSesion($ultimaSesion){
			$this->ultimaSesion = $ultimaSesion;
		}
		public function getUrlFoto(){
			return $this->urlFoto;
		}
		public function setUrlFoto($urlFoto){
			$this->urlFoto = $urlFoto;
		}
		public function toString(){
			return parent::__toString()."IdAdministrador: " . $this->idAdministrador . 
				" Usuario: " . $this->usuario . 
				" Email: " . $this->email . 
				" Contrasenia: " . $this->contrasenia . 
				" UltimaSesion: " . $this->ultimaSesion . 
				" UrlFoto: " . $this->urlFoto;
		}

		#### LISTAR TODOS LOS ADMINISTRADORES
		#	return objeto json con todos los ADMINISTRADORES
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

		#### SELECCIONAR REGISTRO DE ADMINISTRADOR POR CODIGO
		#	return objeto json con todos los ADMINISTRADORES
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

		####  INSERTAR RESGISTRO DE ADMINISTRADOR
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


		#### ACTUALIZAR REGISTRO ADMINISTRADOR
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
		#### ELIMINAR REGISTRO ADMINISTRADORES
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