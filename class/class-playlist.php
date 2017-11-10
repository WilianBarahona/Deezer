<?php

	class Playlist{

		private $idPlaylist;
		private $idTipoVisibilidad;
		private $nombrePlaylist;
		private $idUsuario;
		private $urlImagenPlaylist;

		public function __construct($idPlaylist=null,
					$idTipoVisibilidad=null,
					$nombrePlaylist=null,
					$idUsuario=null,
					$urlImagenPlaylist=null){
			$this->idPlaylist = $idPlaylist;
			$this->idTipoVisibilidad = $idTipoVisibilidad;
			$this->nombrePlaylist = $nombrePlaylist;
			$this->idUsuario = $idUsuario;
			$this->urlImagenPlaylist = $urlImagenPlaylist;
		}
		public function getIdPlaylist(){
			return $this->idPlaylist;
		}
		public function setIdPlaylist($idPlaylist){
			$this->idPlaylist = $idPlaylist;
		}
		public function getIdTipoVisibilidad(){
			return $this->idTipoVisibilidad;
		}
		public function setIdTipoVisibilidad($idTipoVisibilidad){
			$this->idTipoVisibilidad = $idTipoVisibilidad;
		}
		public function getNombrePlaylist(){
			return $this->nombrePlaylist;
		}
		public function setNombrePlaylist($nombrePlaylist){
			$this->nombrePlaylist = $nombrePlaylist;
		}
		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}
		public function getUrlImagenPlaylist(){
			return $this->urlImagenPlaylist;
		}
		public function setUrlImagenPlaylist($urlImagenPlaylist){
			$this->urlImagenPlaylist = $urlImagenPlaylist;
		}
		public function __toString(){
			return "IdPlaylist: " . $this->idPlaylist . 
				" IdTipoVisibilidad: " . $this->idTipoVisibilidad . 
				" NombrePlaylist: " . $this->nombrePlaylist . 
				" IdUsuario: " . $this->idUsuario . 
				" UrlImagenPlaylist: " . $this->urlImagenPlaylist;
		}

		#### LISTAR TODOS LOS PLAYLISTS
		#	return objeto json con todos los PLAYLISTS
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

		#### SELECCIONAR REGISTRO DE PLAYLIST POR CODIGO
		#	return objeto json con todos los PLAYLISTS
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

		####  INSERTAR RESGISTRO DE PLAYLIST
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


		#### ACTUALIZAR REGISTRO PLAYLIST
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
		#### ELIMINAR REGISTRO PLAYLISTS
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