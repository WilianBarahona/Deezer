<?php
	class TipoSuscripcion{
		private $idTipoSuscripcion;
		private $tipoSuscripcion;
		private $diasDuracion;

		public function __construct($idTipoSuscripcion=null, $tipoSuscripcion=null, $diasDuracion=null){
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

		public static function listarTipoSuscripcion($conexion){
			$sql = "
				SELECT 
				  id_tipo_suscripcion,
				  tipo_suscripcion,
				  dias_duracion
				FROM tbl_tipo_suscripcion";

			$resultado = $conexion->ejecutarConsulta($sql);
			$Suscripcion=array();
			while(($fila=$conexion->obtenerFila($resultado))){
				$Suscripcion[] = $fila;
			}
			//var_dump($suscripcion);
			echo json_encode($Suscripcion);
		}

		public static function seleccionarTipoSuscripcion($objConexion,$idSuscripcion){
			$sql = sprintf("select id_tipo_suscripcion,
								   tipo_suscripcion,
								   dias_duracion
								   	from tbl_tipo_suscripcion where id_tipo_suscripcion='%s'",
						$objConexion->antiInyeccion($idSuscripcion)
				);
			$informacion = $objConexion->ejecutarConsulta($sql);
			$totalFilas  = $objConexion->cantidadRegistros($informacion);
				$suscripcion=array();
				while(($fila = $objConexion->obtenerFila($informacion))){
					$suscripcion["id_tipo_suscripcion"] = $fila["id_tipo_suscripcion"];
					$suscripcion["tipo_suscripcion"] = $fila["tipo_suscripcion"];
					$suscripcion["dias_duracion"] = $fila["dias_duracion"];
				}
				echo json_encode($suscripcion);
				//var_dump($suscripcion);
			
		}

		public static function buscarTipoSuscripcion($objConexion,$busqueda){
			$sql = sprintf("select id_tipo_suscripcion,
									tipo_suscripcion,
									dias_duracion
								   	from tbl_tipo_suscripcion where tipo_suscripcion='%s'",
						$objConexion->antiInyeccion($busqueda)
				);
			$informacion = $objConexion->ejecutarConsulta($sql);
			$totalFilas  = $objConexion->cantidadRegistros($informacion);
			if ($totalFilas >= 1){
				$suscripcion=array();
				while(($fila = $objConexion->obtenerFila($informacion))){
					$suscripcion["id_tipo_suscripcion"] = $fila["id_tipo_suscripcion"];
					$suscripcion["tipo_suscripcion"] = $fila["tipo_suscripcion"];
					$suscripcion["dias_duracion"] = $fila["dias_duracion"];
				}
				echo json_encode($suscripcion);
				//var_dump($suscripcion);
			}
			else{
				$suscripcion=array();
				$suscripcion["id_idioma"]="not founded";
				$suscripcion["nombre_idioma"]="not founded";
				$suscripcion["abreviatura_idioma"]="not founded";
				echo json_encode($suscripcion);
				//var_dump($suscripcion);
			}
		}

		public function guardarTipoSuscripcion($objConexion){
			$sql = sprintf("insert into tbl_tipo_suscripcion(tipo_suscripcion,
												   dias_duracion) values ('%s','%s')",
						$objConexion->antiInyeccion($this->tipoSuscripcion),
						$objConexion->antiInyeccion($this->diasDuracion)
				);
			$resultado = $objConexion->ejecutarConsulta($sql);
			echo json_encode($resultado);

		}

		public function actualizarTipoSuscripcion($conexion){
			$sql=sprintf("
				UPDATE tbl_tipo_suscripcion SET
				tipo_suscripcion='%s',
				dias_duracion='%s'
				WHERE id_tipo_suscripcion=%s;
			",
				$conexion->antiInyeccion($this->getTipoSuscripcion()),
				$conexion->antiInyeccion($this->getDiasDuracion()),
				$conexion->antiInyeccion($this->getIdTipoSuscripcion())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return json_encode($resultado);
		}

		public static function eliminarTipoSuscripcion($objConexion,$codigo){
			$sql = sprintf("delete from tbl_tipo_suscripcion where id_tipo_suscripcion=%s",
						$objConexion->antiInyeccion($codigo)
				);
			$objConexion->ejecutarConsulta($sql);
		}
	}

?>