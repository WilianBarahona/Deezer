<?php
	class Genero{
		private $idGenero;
		private $nombreGenero;

		public function __construct($idGenero=null, $nombreGenero=null){
			$this->idGenero = $idGenero;
			$this->nombreGenero = $nombreGenero;
		}

		public function setIdGenero($idGenero) { 
			$this->idGenero = $idGenero; 
		}

		public function getIdGenero() { 
			return $this->idGenero; 
		}

		public function setNombreGenero($nombreGenero) { 
			$this->nombreGenero = $nombreGenero; 
		}

		public function getNombreGenero() { 
			return $this->nombreGenero; 
		}

		public function __toString(){
			return "idGenero: ".$this->idGenero." nombreGenero: ".$this->nombreGenero;
		}

		#### LISTAR TODOS LOS GENEROS
		#	return objeto json con todos los GENEROS
		public static function listarTodos($conexion){
			$sql = "
				SELECT 
				  id_genero,
				  nombre_genero
				FROM tbl_generos
				ORDER BY nombre_genero ASC
			";

			$resultado = $conexion->ejecutarConsulta($sql);
			$generos=array();
			while($genero=$conexion->obtenerFila($resultado)){
				$generos[]=$genero;
			}
			return $generos;
		}

		#### SELECCIONAR REGISTRO DE GENERO POR CODIGO
		#	return objeto json con todos los GENEROS
		public function seleccionar($conexion){
			$resultado=$conexion->ejecutarConsulta(sprintf("
				SELECT 
					nombre_genero as nombre,
					id_genero as id
				FROM tbl_generos
				WHERE id_genero = %s
				",
				$conexion->antiInyeccion($this->getIdGenero())
			));
			$genero=$conexion->obtenerFila($resultado);
			return $genero;
		}
		
		####  INSERTAR RESGISTRO DE GENERO
		#     return false or true ####  JSON
		public function insertarRegistro($conexion){
			$sql = sprintf("
				INSERT INTO tbl_generos
				(nombre_genero)
				VALUES ('%s');
				",
				$conexion->antiInyeccion($this->getNombreGenero())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
		#### ACTUALIZAR REGISTRO GENERO
		#     return false or true ####  JSON
		public function actualizarRegistro($conexion){
			$sql=sprintf("
				UPDATE tbl_generos SET
				nombre_genero='%s'
				WHERE id_genero=%s;
			",
				$conexion->antiInyeccion($this->getNombreGenero()),
				$conexion->antiInyeccion($this->getIdGenero())
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}
		#### ELIMINAR REGISTRO GENEROS
		#     return false or true ####  JSON
		public static function eliminarRegistro($conexion, $id){
			$sql = sprintf("
				DELETE FROM tbl_generos
				WHERE id_genero = %s;
			",
				$conexion->antiInyeccion($id)
			);
			$resultado=$conexion->ejecutarConsulta($sql);
			return $resultado;
		}

		public static function listarPorGenero($conexion, $idGenero){
			$sql=sprintf("
				SELECT
				  a.id_cancion, a.id_album, b.nombre_album, b.album_cover_url,
				  b.id_artista, c.nombre_artista,
				  a.id_idioma, d.nombre_idioma, d.abreviatura_idioma,
				  a.nombre_cancion,
				  a.id_genero,
				  e.nombre_genero,
				  a.url_audio,
				  a.reproducciones
				FROM tbl_canciones a
				INNER JOIN tbl_albumes b
				ON (a.id_album=b.id_album)
				INNER JOIN tbl_artistas c
				ON (b.id_artista=c.id_artista)
				INNER JOIN tbl_idioma d
				ON (a.id_idioma=d.id_idioma)
				INNER JOIN tbl_generos e
				ON (a.id_genero = e.id_genero)
				WHERE a.id_genero=%s;
			",
				$conexion->antiInyeccion($idGenero)
			);
			$resultado = $conexion->ejecutarConsulta($sql);
			$canciones=array(); // Renombrar
			while($cancion=$conexion->obtenerFila($resultado)){
				$canciones[]=$cancion;
			}
			return $canciones;
		}
	}
?>