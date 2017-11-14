<?php
class Pais{
	private $idPais;
	private $nombrePais;
	private $abreviaturaPais;
	private $codigoTelefonoPais;

	public function __construct($idPais=null,
				$nombrePais=null,
				$namePais=null,
				$nomPais=null,
				$abreviaturaPais=null,
				$codigoTelefonoPais=null){
		$this->idPais = $idPais;
		$this->nombrePais = $nombrePais;
		$this->namePais = $namePais;
		$this->nomPais = $nomPais;
		$this->abreviaturaPais = $abreviaturaPais;
		$this->codigoTelefonoPais = $codigoTelefonoPais;
	}
	public function getIdPais(){
		return $this->idPais;
	}
	public function setIdPais($idPais){
		$this->idPais = $idPais;
	}
	public function getNombrePais(){
		return $this->nombrePais;
	}
	public function setNombrePais($nombrePais){
		$this->nombrePais = $nombrePais;
	}
	public function getAbreviaturaPais(){
		return $this->abreviaturaPais;
	}
	public function setAbreviaturaPais($abreviaturaPais){
		$this->abreviaturaPais = $abreviaturaPais;
	}
	public function getCodigoTelefonoPais(){
		return $this->codigoTelefonoPais;
	}
	public function setCodigoTelefonoPais($codigoTelefonoPais){
		$this->codigoTelefonoPais = $codigoTelefonoPais;
	}
	public function __toString(){
		return "IdPais: " . $this->idPais . 
			" NombrePais: " . $this->nombrePais . 
			" NamePais: " . $this->namePais . 
			" NomPais: " . $this->nomPais . 
			" AbreviaturaPais: " . $this->abreviaturaPais . 
			" CodigoTelefonoPais: " . $this->codigoTelefonoPais;
	}

	public static function listarTodos($conexion){
		$sql = "
			SELECT 
			  id_pais,nombre_pais,
			  abreviatura_pais,
			  codigo_telefono_pais
			FROM tbl_paises
			ORDER BY nombre_pais ASC
			";
		$resultado = $conexion->ejecutarConsulta($sql);
		$paises=array();
		while(($pais=$conexion->obtenerFila($resultado))){
			$paises[] = $pais;
		}
		return $paises;
	}

	public function seleccionar($conexion){
		$sql = sprintf("
			SELECT id_pais, nombre_pais,
				abreviatura_pais,
				codigo_telefono_pais
			FROM tbl_paises 
			WHERE id_pais=%s
		",
			$conexion->antiInyeccion($this->getIdPais())
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		$pais = $conexion->obtenerFila($resultado);
		return $pais;
	}

	public function insertarRegistro($conexion){
		$sql = sprintf("
			INSERT INTO tbl_paises
			(nombre_pais, abreviatura_pais ,codigo_telefono_pais) 
			VALUES ('%s','%s','%s')
		",
			$conexion->antiInyeccion($this->getNombrePais()),
			$conexion->antiInyeccion($this->getAbreviaturaPais()),
			$conexion->antiInyeccion($this->getCodigoTelefonoPais())
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public function actualizarRegistro($conexion){
		$sql=sprintf("
			UPDATE tbl_paises SET
				nombre_pais='%s',
				abreviatura_pais='%s',
				codigo_telefono_pais='%s'
			WHERE id_pais=%s;
		",
			$conexion->antiInyeccion($this->getNombrePais()),
			$conexion->antiInyeccion($this->getAbreviaturaPais()),
			$conexion->antiInyeccion($this->getCodigoTelefonoPais()),
			$conexion->antiInyeccion($this->getIdPais())
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function eliminarRegistro($conexion,$idPais){
		$sql = sprintf("
			DELETE FROM tbl_paises 
			WHERE id_pais=%s
		",
			$conexion->antiInyeccion($idPais)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function buscarPorNombre($conexion,$nombrePais){
		$sql = sprintf("
			SELECT id_pais,
				nombre_pais,abreviatura_pais,
				codigo_telefono_pais
			FROM tbl_paises WHERE nombre_pais='%s'
		",
			$conexion->antiInyeccion($nombrePais)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		$totalFilas  = $conexion->cantidadRegistros($resultado);
		if ($totalFilas >= 1){
			$paises=array();
			while(($pais = $conexion->obtenerFila($resultado))){
				$paises[]=$pais;
			}
			return $paises;
		}
		else{
			return false;
		}
	}
}
?>