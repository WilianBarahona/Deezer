<?php
class Artista{
	private $idArtista;
	private $idPais;
	private $nombreArtista;
	private $biografia;
	private $urlFoto;

	public function __construct($idArtista=null,$idPais=null,$nombreArtista=null,$biografia=null,$urlFoto=null){
		$this->idArtista = $idArtista;
		$this->idPais = $idPais;
		$this->nombreArtista = $nombreArtista;
		$this->biografia = $biografia;
		$this->urlFoto = $urlFoto;
	}

	public function setIdArtista($idArtista) { 
		$this->idArtista = $idArtista; 
	}
	
	public function getIdArtista() { 
		return $this->idArtista; 
	}
	
	public function setIdPais($idPais) { 
		$this->idPais = $idPais; 
	}
	
	public function getIdPais() { 
		return $this->idPais; 
	}
	
	public function setNombreArtista($nombreArtista) { 
		$this->nombreArtista = $nombreArtista; 
	}
	
	public function getNombreArtista() { 
		return $this->nombreArtista; 
	}
	
	public function setBiografia($biografia) { 
		$this->biografia = $biografia; 
	}
	
	public function getBiografia() { 
		return $this->biografia; 
	}
	
	public function setUrlFoto($urlFoto) { 
		$this->urlFoto = $urlFoto; 
	}
	
	public function getUrlFoto() { 
		return $this->urlFoto; 
	}

	public function __toString(){
		return "IdArtista: " . $this->idArtista . 
			" IdPais: " . $this->idPais . 
			" NombreArtista: " . $this->nombreArtista . 
			" Biografia: " . $this->biografia . 
			" UrlFoto: " . $this->urlFoto;
	}

	####  INSERTAR RESGISTRO DE ARTISTA
	####  return false or true ####  JSON
	public function insertarRegistro($conexion){
		$sql=sprintf("
			INSERT INTO tbl_artistas
			(id_pais, nombre_artista, biografia_artista, url_foto_artista)
			VALUES(%s, '%s', '%s', '%s');
			",
			$conexion->antiInyeccion($this->getIdPais()),
			$conexion->antiInyeccion($this->getNombreArtista()),
			$conexion->antiInyeccion($this->getBiografia()),
			$conexion->antiInyeccion($this->getUrlFoto())
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		return $resultado;
	}
	
	#### LISTAR TODOS LOS ARTISTAS
	#	return objeto json con todos los ARTISTAS
	public static function listarTodos($conexion){
		$sql = "
			SELECT
			  a. id_artista,
			  b.nombre_pais,
			  b.abreviatura_pais,
			  a.nombre_artista,
			  a.url_foto_artista
			FROM tbl_artistas a
			INNER JOIN tbl_paises b
			ON(a.id_pais=b.id_pais);
		";
		$resultado = $conexion->ejecutarConsulta($sql);
		$artistas=array();
		while($artista=$conexion->obtenerFila($resultado)){
			$artistas[]=$artista;
		}
		return $artistas;
	}
	#### SELECCIONAR REGISTRO DE ARTISTA POR CODIGO
	#	return objeto json con todos los ARTISTAS
	public function seleccionar($conexion){
		$resultado=$conexion->ejecutarConsulta(sprintf("
				SELECT
				  a. id_artista,
				  b.id_pais,
				  b.nombre_pais,
				  b.abreviatura_pais,
				  a.nombre_artista,
				  a.url_foto_artista,
				  a.biografia_artista
				FROM tbl_artistas a
				INNER JOIN tbl_paises b
				ON(a.id_pais=b.id_pais)
				WHERE id_artista=%s;
			",
			$conexion->antiInyeccion($this->getIdArtista())
		));
		$artista=$conexion->obtenerFila($resultado);
		$artista["numero_albumes"] = Artista::getNumeroAlbumes($conexion, $artista["id_artista"]);
		include_once("class-album.php");
		$artista["albumes"] = Album::listarPorArtista($conexion, $artista["id_artista"]);
		return $artista;
	}
	#### ACTUALIZAR REGISTRO ARTISTA
	#     return false or true ####  JSON
	public function actualizarRegistro($conexion){
		$sql=sprintf("
			UPDATE tbl_artistas SET
			  id_pais=%s,
			  nombre_artista='%s',
			  biografia_artista='%s',
			  url_foto_artista='%s'
			WHERE id_artista=%s;
		",
			$conexion->antiInyeccion($this->getIdPais()),
			$conexion->antiInyeccion($this->getNombreArtista()),
			$conexion->antiInyeccion($this->getBiografia()),
			$conexion->antiInyeccion($this->getUrlFoto()),
			$conexion->antiInyeccion($this->getIdArtista())
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		var_dump($resultado);
		return $resultado;
	}
	#### ELIMINAR REGISTRO ARTISTAS
	#     return false or true ####  JSON
	public static function eliminarRegistro($conexion, $idArtista){
		$sql1= sprintf("
			DELETE FROM tbl_artistas
			WHERE id_artista=%s
		",
			$conexion->antiInyeccion($idArtista)
		);
		// BORRAR ALBUMES
		include_once("class-album.php");
		$albumes = Album::listarPorArtista($conexion, $idArtista);
		for ($i=0; $i < count($albumes) ; $i++) { 
			$idAlbum = $albumes[$i]["id_album"];
			Album::eliminarRegistro($conexion, $idAlbum);
		}
		// FAVORITOS DE USUARIO
		$sql2= sprintf("
			DELETE FROM tbl_artistas_por_usuarios
			WHERE id_artista=%s
		",
			$conexion->antiInyeccion($idArtista)
		);
		// COMENTARIOS DE ARTISTA
		$sql3= sprintf("
			DELETE FROM tbl_comentarios_por_artista
			WHERE id_artista=%s
		",
			$conexion->antiInyeccion($idArtista)
		);
		$resultado1=$conexion->ejecutarConsulta($sql1);
		$resultado2=$conexion->ejecutarConsulta($sql2);
		$resultado3=$conexion->ejecutarConsulta($sql3);
		return $resultado1 && $resultado2 && $resultado3;
	}
	
	public static function getNumeroAlbumes($conexion, $idArtista){
		$sql =sprintf("
			SELECT COUNT(*) as numero_albumes
			FROM tbl_albumes
			WHERE id_artista=%s"
		,
			$conexion->antiInyeccion($idArtista)
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		$artista = $conexion->obtenerFila($resultado);
		return $artista["numero_albumes"];
	}
###
	public static function agregarComentario($conexion, $idArtista, $idUsuario, $comentario){
		$sql=sprintf("
			INSERT INTO tbl_comentarios_por_artista
			(id_artista, id_usuario, comentario, fecha)
			VALUES(%s,%s,'%s', CURRENT_TIMESTAMP())
		",
			$conexion->antiInyeccion($idArtista),
			$conexion->antiInyeccion($idUsuario),
			$conexion->antiInyeccion($comentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function editarComentario($conexion, $idComentario, $comentario){
		$sql=sprintf("
			UPDATE tbl_comentarios_por_artista SET
			comentario='%s'
			WHERE id_comentario=%s
		",
			$conexion->antiInyeccion($comentario),
			$conexion->antiInyeccion($idComentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function eliminarComentario($conexion, $idComentario){
		$sql=sprintf("
			DELETE FROM tbl_comentarios_por_artista
			WHERE id_comentario=%s
		",
			$conexion->antiInyeccion($idComentario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function agregarFavorito($conexion, $idUsuario, $idArtista){
		$sql=sprintf("
			INSERT INTO tbl_artistas_por_usuarios
			(id_artista, id_usuario)
			VALUES(%s, %s)
		",
			$conexion->antiInyeccion($idArtista),
			$conexion->antiInyeccion($idUsuario)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;	
	}

	public static function eliminarFavorito($conexion, $idUsuario, $idArtista){
		$sql=sprintf("
			DELETE FROM tbl_artistas_por_usuarios
			WHERE id_usuario = %s AND id_artista = %s
		",
			$conexion->antiInyeccion($idUsuario),
			$conexion->antiInyeccion($idArtista)
		);
		$resultado = $conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function listarComentarios($conexion, $idArtista){
		$sql=sprintf("
			SELECT
			  a.id_comentario,
			  a.id_artista,
			  a.id_usuario,
			  CONCAT(b.nombre, ' ', b.apellido) as nombre_usuario,
			  b.url_foto_perfil,
			  b.usuario,
			  b.email,
			  a.comentario,
			  a.fecha
			FROM tbl_comentarios_por_artista a
			INNER JOIN tbl_usuarios b
			ON(a.id_usuario = b.id_usuario)
			WHERE id_artista=%s

		",
			$conexion->antiInyeccion($idArtista)
		);
		$comentarios=array();
		$resultado = $conexion->ejecutarConsulta($sql);
		while($comentario = $conexion->obtenerFila($resultado)){
			$comentarios[]=$comentario;
		}
		return $comentarios;
	}
}
?>