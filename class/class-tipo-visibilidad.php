<?php

	class TipoVisibilidad{

		private $idTipoVisibilidad;
		private $tipoVisibilidad;

		public function __construct($idTipoVisibilidad,
					$tipoVisibilidad){
			$this->idTipoVisibilidad = $idTipoVisibilidad;
			$this->tipoVisibilidad = $tipoVisibilidad;
		}
		public function getIdTipoVisibilidad(){
			return $this->idTipoVisibilidad;
		}
		public function setIdTipoVisibilidad($idTipoVisibilidad){
			$this->idTipoVisibilidad = $idTipoVisibilidad;
		}
		public function getTipoVisibilidad(){
			return $this->tipoVisibilidad;
		}
		public function setTipoVisibilidad($tipoVisibilidad){
			$this->tipoVisibilidad = $tipoVisibilidad;
		}
		public function __toString(){
			return "IdTipoVisibilidad: " . $this->idTipoVisibilidad . 
				" TipoVisibilidad: " . $this->tipoVisibilidad;
		}

		public static function listarTodos($conexion){
			$sql = "
				SELECT
				  id_tipo_visibilidad,
				  tipo_visibilidad
				FROM tbl_tipo_visibilidad
			";
			$resultado = $conexion->ejecutarConsulta($sql);
			$visibilidad=array();
			while($fila=$conexion->obtenerFila($resultado)){
				$visibilidad[]=$fila;
			}

			return $visibilidad;
		}

	}
?>