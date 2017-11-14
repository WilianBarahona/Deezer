<?php
class Pais{
	private $idPais;
	private $nombrePais;
	private $namePais;
	private $nomPais;
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
	public function getNamePais(){
		return $this->namePais;
	}
	public function setNamePais($namePais){
		$this->namePais = $namePais;
	}
	public function getNomPais(){
		return $this->nomPais;
	}
	public function setNomPais($nomPais){
		$this->nomPais = $nomPais;
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
			  name_pais,nom_pais,
			  abreviatura_pais,
			  codigo_telefono_pais
			FROM tbl_paises";
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
			VALUES ('%s','%s','%s','%s','%s')
		",
			$conexion->antiInyeccion($this->getNombrePais()),
			$conexion->antiInyeccion($this->getNamePais()),
			$conexion->antiInyeccion($this->getNomPais()),
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
				name_pais='%s',
				nom_pais='%s',
				abreviatura_pais='%s',
				codigo_telefono_pais='%s'
			WHERE id_pais=%s;
		",
			$conexion->antiInyeccion($this->getNombrePais()),
			$conexion->antiInyeccion($this->getNamePais()),
			$conexion->antiInyeccion($this->getNomPais()),
			$conexion->antiInyeccion($this->getAbreviaturaPais()),
			$conexion->antiInyeccion($this->getCodigoTelefonoPais()),
			$conexion->antiInyeccion($this->getIdPais())
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		return json_encode($resultado);
	}

	public static function eliminarPais($conexion,$codigo){
		$sql = sprintf("delete from tbl_paises where id_pais=%s",
					$conexion->antiInyeccion($codigo)
			);
		$conexion->ejecutarConsulta($sql);
	}

	public static function buscarPais($conexion,$busqueda){
		$sql = sprintf("select id_pais,
							   nombre_pais,
							   name_pais,
							   nom_pais,
							   abreviatura_pais,
							   codigo_telefono_pais
							   	from tbl_paises where nombre_pais='%s'",
					$conexion->antiInyeccion($busqueda)
			);
		$resultado = $conexion->ejecutarConsulta($sql);
		$totalFilas  = $conexion->cantidadRegistros($resultado);
		if ($totalFilas >= 1){
			$paises=array();
			while(($pais = $conexion->obtenerFila($resultado))){
				$paises["id_pais"] = $pais["id_pais"];
				$paises["nombre_pais"] = $pais["nombre_pais"];
				$paises["name_pais"] = $pais["name_pais"];
				$paises["nom_pais"] = $pais["nom_pais"];
				$paises["abreviatura_pais"] = $pais["abreviatura_pais"];
				$paises["codigo_telefono_pais"] = $pais["codigo_telefono_pais"];
			}
			echo json_encode($paises);
		}
		else{
			$paises=array();
			$paises["id_pais"]="not founded";
			$paises["nombre_pais"]="not founded";
			$paises["name_pais"]="not founded";
			$paises["nom_pais"]="not founded";
			$paises["abreviatura_pais"]="not founded";
			$paises["codigo_telefono_pais"]="not founded";
			echo json_encode($paises);
		}
	}
}
?>