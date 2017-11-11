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

		#### LISTAR TODOS LOS PAISES
		#	return objeto json con todos los PAISES
		public static function listarTodos($conexion){
			$sql = "
				SELECT
				  id_pais as id,
				  nombre_pais as pais,
				  abreviatura_pais,
				  codigo_telefono_pais as codigo
				FROM tbl_paises;
			";
			$resultado = $conexion->ejecutarConsulta($sql);
			$paises=array(); // Renombrar
			while($fila=$conexion->obtenerFila($resultado)){
				$pais = array(); //Renombrar
				$pais["id"]= $fila["id"];
				$pais["pais"]= $fila["pais"];
				$pais["abreviatura_pais"]= $fila["abreviatura_pais"];
				$pais["codigo"]= $fila["codigo"];
				$paises[]=$pais;
			}
			return json_encode($paises);
		}

		#### SELECCIONAR REGISTRO DE PAIS POR CODIGO
		#	return objeto json con todos los PAISES
		public function seleccionar($conexion){
			$resultado=$conexion->ejecutarConsulta(sprintf("
				//SELECT
				//FROM
				//WHERE
				",
				""
			));
			$fila=$conexion->obtenerFila($resultado);
			return json_encode($fila);
		}

		####  INSERTAR RESGISTRO DE PAIS
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			$sql=sprintf("
				//INSERT INTO
				//()
				//VALUES();
				",
				""
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}


		#### ACTUALIZAR REGISTRO PAIS
		#     return false or true ####  JSON
		public static function actualizarRegistro($conexion){
			$sql=sprintf("
				//UPDATE
				//... = ...
				//WHERE
			",
				""
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}
		#### ELIMINAR REGISTRO PAISES
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