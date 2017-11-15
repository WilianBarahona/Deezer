<?php

class Usuario{
	private $idUsuario;
	private $idSuscripcion;
	private $idPais;
	private $usuario;
	private $nombre;
	private $apellido;
	private $sexo;
	private $email;
	private $contrasenia;
	private $ultimaSesion;
	private $fechaNacimiento;
	private $urlFotoPerfil;
	private $tipoUsuario;

	public function __construct(
				$idUsuario=null,
				$idSuscripcion=null,
				$idPais=null,
				$usuario=null,
				$nombre=null,
				$apellido=null,
				$sexo=null,
				$email=null,
				$contrasenia=null,
				$ultimaSesion=null,
				$fechaNacimiento=null,
				$urlFotoPerfil=null,
				$tipoUsuario=null){
		$this->idUsuario = $idUsuario;
		$this->idSuscripcion = $idSuscripcion;
		$this->idPais = $idPais;
		$this->usuario = $usuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->sexo = $sexo;
		$this->email = $email;
		$this->contrasenia = $contrasenia;
		$this->ultimaSesion = $ultimaSesion;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->urlFotoPerfil = $urlFotoPerfil;
		$this->tipoUsuario = $tipoUsuario;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	public function getIdSuscripcion(){
		return $this->idSuscripcion;
	}
	public function setIdSuscripcion($idSuscripcion){
		$this->idSuscripcion = $idSuscripcion;
	}
	public function getIdPais(){
		return $this->idPais;
	}
	public function setIdPais($idPais){
		$this->idPais = $idPais;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
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
	public function getFechaNacimiento(){
		return $this->fechaNacimiento;
	}
	public function setFechaNacimiento($fechaNacimiento){
		$this->fechaNacimiento = $fechaNacimiento;
	}
	public function getUrlFotoPerfil(){
		return $this->urlFotoPerfil;
	}
	public function setUrlFotoPerfil($urlFotoPerfil){
		$this->urlFotoPerfil = $urlFotoPerfil;
	}
	public function getTipoUsuario(){
		return $this->tipoUsuario;
	}
	public function setTipoUsuario($tipoUsuario){
		$this->tipoUsuario = $tipoUsuario;
	}
	public function toString(){
		return "IdUsuario: " . $this->idUsuario . " IdSuscripcion: " . $this->idSuscripcion . " IdPais: " . $this->idPais . " Usuario: " . $this->usuario . " Nombre: " . $this->nombre . " Apellido: " . $this->apellido . " Sexo: " . $this->sexo . " Email: " . $this->email . " Contrasenia: " . $this->contrasenia . " UltimaSesion: " . $this->ultimaSesion . " FechaNacimiento: " . $this->fechaNacimiento . " UrlFotoPerfil: " . $this->urlFotoPerfil . " TipoUsuario: " . $this->tipoUsuario;
	}
	
	public function insertarRegistro($conexion){
		include_once("class-suscripcion.php");
		$this->setIdSuscripcion(Suscripcion::insertarRegistro($conexion));
		$sql=sprintf("
			INSERT INTO tbl_usuarios
			(
				id_suscripcion, id_pais, 
				usuario,nombre,
				apellido,sexo,
				email,contrasenia,
				fecha_nacimiento, url_foto_perfil,
				id_tipo_usuario
			)
			VALUES(
				%s, %s,
				'%s','%s',
				'%s','%s',
				'%s','%s',
				'%s','%s',
				%s
			)
		",
			$conexion->antiInyeccion($this->getIdSuscripcion()),
			$conexion->antiInyeccion($this->getIdPais()),
			$conexion->antiInyeccion($this->getUsuario()),
			$conexion->antiInyeccion($this->getNombre()),
			$conexion->antiInyeccion($this->getApellido()),
			$conexion->antiInyeccion($this->getSexo()),
			$conexion->antiInyeccion($this->getEmail()),
			$conexion->antiInyeccion($this->getContrasenia()),
			$conexion->antiInyeccion($this->getFechaNacimiento()),
			$conexion->antiInyeccion($this->getUrlFotoPerfil()),
			$conexion->antiInyeccion($this->getTipoUsuario())
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		return $resultado;
	}

	public static function listarTodos($conexion){
		$sql="
			SELECT
			  a.id_usuario,
			  a.id_suscripcion,c.id_tipo_suscripcion,d.tipo_suscripcion,d.dias_duracion,
			  c.inicio_suscripcion,
			  a.id_pais,b.nombre_pais,b.abreviatura_pais,
			  a.usuario,CONCAT(a.nombre,' ',a.apellido) as nombre_usuario,
			  a.nombre,a.apellido,
			  a.sexo,
			  a.email,
			  a.fecha_nacimiento,
			  a.url_foto_perfil,
			  a.id_tipo_usuario,e.tipo_usuario
			FROM tbl_usuarios a
			INNER JOIN tbl_paises b
			ON (a.id_pais = b.id_pais)
			INNER JOIN tbl_suscripciones c
			ON (a.id_suscripcion = c.id_suscripcion)
			INNER JOIN tbl_tipo_suscripcion d
			ON(c.id_tipo_suscripcion = d.id_tipo_suscripcion)
			INNER JOIN tbl_tipo_usuario e
			ON(a.id_tipo_usuario=e.id_tipo_usuario)
		";
		$resultado=$conexion->ejecutarConsulta($sql);
		$usuarios=array();
		while($usuario = $conexion->obtenerFila($resultado)){
			$usuarios[]=$usuario;
		}
		return $usuarios;
	}

	public function seleccionar($conexion){
		$sql=sprintf("
			SELECT
			  a.id_usuario,
			  a.id_suscripcion,c.id_tipo_suscripcion,d.tipo_suscripcion,d.dias_duracion,
			  c.inicio_suscripcion,
			  a.id_pais,b.nombre_pais,b.abreviatura_pais,
			  a.usuario,CONCAT(a.nombre,' ',a.apellido) as nombre_usuario,
			  a.nombre,a.apellido,
			  a.sexo,
			  a.email,
			  a.fecha_nacimiento,
			  a.url_foto_perfil,
			  a.id_tipo_usuario,e.tipo_usuario
			FROM tbl_usuarios a
			INNER JOIN tbl_paises b
			ON (a.id_pais = b.id_pais)
			INNER JOIN tbl_suscripciones c
			ON (a.id_suscripcion = c.id_suscripcion)
			INNER JOIN tbl_tipo_suscripcion d
			ON(c.id_tipo_suscripcion = d.id_tipo_suscripcion)
			INNER JOIN tbl_tipo_usuario e
			ON(a.id_tipo_usuario=e.id_tipo_usuario)
			WHERE a.id_usuario = %s
		",
			$conexion->antiInyeccion($this->getIdUsuario())
		);
		$resultado=$conexion->ejecutarConsulta($sql);
		$usuario=$conexion->obtenerFila($resultado);
		return $usuario;
	}

	public static function eliminarRegistro($conexion, $idUsuario){
		$temp = new Usuario();
		$temp->setIdUsuario($idUsuario);
		$temp_data = $temp->seleccionar($conexion);
		$idSuscripcion = $temp_data["id_suscripcion"];

		$sql1=sprintf("
			DELETE FROM tbl_comentarios_por_artista
			WHERE id_usuario = %s;
		",
			$conexion->antiInyeccion($idUsuario)
		);
		$sql2=sprintf("
			DELETE FROM tbl_comentarios_por_playlist
			WHERE id_usuario = %s
		",
			$conexion->antiInyeccion($idUsuario)
		);
		$sql3=sprintf("
			DELETE FROM tbl_comentarios_por_album
			WHERE id_usuario = %s
		",
			$conexion->antiInyeccion($idUsuario)
		);
		$sql4=sprintf("
			DELETE FROM tbl_albumes_por_usuarios
			WHERE id_usuario = %s
		",
			$conexion->antiInyeccion($idUsuario)
		);
		$sql5=sprintf("
			DELETE FROM tbl_playlists_por_usuarios
			WHERE id_usuario = %s
		",
			$conexion->antiInyeccion($idUsuario)
		);
		$sql6=sprintf("
			DELETE FROM tbl_canciones_por_usuario
			WHERE id_usuario = %s
		",
			$conexion->antiInyeccion($idUsuario)
		);
		$sql7=sprintf("
			DELETE FROM tbl_artistas_por_usuarios
			WHERE id_usuario = %s;
		",
			$conexion->antiInyeccion($idUsuario)
		);
		$sql8=sprintf("
			DELETE FROM tbl_seguidores
			WHERE id_usuario = %s OR id_sigue_a_usuario=%s;
		",
			$conexion->antiInyeccion($idUsuario),
			$conexion->antiInyeccion($idUsuario)
		);
		$sql9=sprintf("
			DELETE FROM tbl_historial_por_usuario
			WHERE id_usuario = %s
		",
			$conexion->antiInyeccion($idUsuario)
		);
		
		$sql10=sprintf("
			DELETE FROM tbl_usuarios
			WHERE id_usuario = %s
		",
			$conexion->antiInyeccion($idUsuario)
		);

		$sql11=sprintf("
			DELETE FROM tbl_suscripciones
			WHERE id_suscripcion = %s
		",
			$conexion->antiInyeccion($idSuscripcion)
		);

		$resultado1 = $conexion->ejecutarConsulta($sql1);
		$resultado2 = $conexion->ejecutarConsulta($sql2);
		$resultado3 = $conexion->ejecutarConsulta($sql3);
		$resultado4 = $conexion->ejecutarConsulta($sql4);
		$resultado5 = $conexion->ejecutarConsulta($sql5);
		$resultado6 = $conexion->ejecutarConsulta($sql6);
		$resultado7 = $conexion->ejecutarConsulta($sql7);
		$resultado8 = $conexion->ejecutarConsulta($sql8);
		$resultado9 = $conexion->ejecutarConsulta($sql9);
		$resultado10 = $conexion->ejecutarConsulta($sql10);
		$resultado11 = $conexion->ejecutarConsulta($sql11);
		return $resultado2 && $resultado1 && $resultado3 && $resultado4 && $resultado5 && $resultado6 && $resultado7 && $resultado8 && $resultado9 && $resultado10 && $resultado11;
	}
			public static function verificarUsuario($objConexion,$email,$password){
			#consulta
			$sql="SELECT  id_usuario, id_suscripcion, id_pais, usuario, 
						  nombre, apellido, sexo, email, contrasenia, 
						  ultima_sesion, fecha_nacimiento, url_foto_perfil, 
						  tipo_usuario 
				  FROM tbl_usuarios
				  WHERE email='$email' && contrasenia='$password'";


			#resultado de la consulta				
			$resultado=$objConexion->ejecutarConsulta($sql);
			$cantidadRegistros=$objConexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros==1)  {
				$fila = $objConexion->obtenerFila($resultado);
				session_start();
				$_SESSION['status']=true;
				$_SESSION['id_usuario']=$fila['id_usuario'];
				$_SESSION['id_suscripcion']=$fila['id_suscripcion'];
				$_SESSION['id_pais']=$fila['id_pais'];
				$_SESSION['usuario']=$fila['usuario'];
				$_SESSION['nombre']=$fila['nombre'];
				$_SESSION['apellido']=$fila['apellido'];
				$_SESSION['sexo']=$fila['sexo'];
				$_SESSION['email']=$fila['email'];
				$_SESSION['contrasenia']=$fila['contrasenia'];
				$_SESSION['fecha_nacimiento']=$fila['fecha_nacimiento'];
				$_SESSION['url_foto_perfil']=$fila['url_foto_perfil'];
				$_SESSION['tipo_usuario']=$fila['tipo_usuario'];
				$respuesta['tipo_usuario']=$fila['tipo_usuario'];
				$respuesta['loggedin'] = 1;
				$respuesta["mensaje"]="tiene acceso" ;

			}
			else {
				//echo'correo o contrasenia invalidos';	
				session_start();
				$_SESSION['status']=false;
				$respuesta['loggedin'] = 0;
				$respuesta["mensaje"]="No tiene acceso" ;
				}	  
			echo json_encode($respuesta);
		}
		public  function actualizarRegistro($conexion){
		$sql=sprintf("
				UPDATE tbl_usuarios 
				SET 
					id_suscripcion=%s,
					id_pais='%s',
					usuario='%s',
					nombre='%s',
					apellido='%s',
					sexo='%s',
					email='%s',
					contrasenia='%s',
					url_foto_perfil='%s'
					WHERE id_usuario=%s

					",
		
		$conexion->antiInyeccion($this->idSuscripcion),
		$conexion->antiInyeccion($this->idPais),
		$conexion->antiInyeccion($this->usuario),
		$conexion->antiInyeccion($this->nombre),
		$conexion->antiInyeccion($this->apellido),
		$conexion->antiInyeccion($this->sexo),
		$conexion->antiInyeccion($this->email),
		$conexion->antiInyeccion($this->contrasenia),
		$conexion->antiInyeccion($this->urlFotoPerfil),
		$conexion->antiInyeccion($this->idUsuario)

	);

		$resultado=$conexion->ejecutarConsulta($sql);
		
	//echo json_encode($resultado);

}
	function obtenerDatosUsuario($conexion,$idUsuarioActivo){
		$sql= sprintf("
				SELECT id_suscripcion, 
					   id_pais, 
					   usuario,
					   nombre, 
					   apellido, 
					   sexo, 
					   email, 
					   contrasenia, 
					   url_foto_perfil, 
					   fecha_nacimiento
				FROM tbl_usuarios 
				WHERE id_usuario=%s",
				$conexion->antiInyeccion($idUsuarioActivo)
			);
		//var_dump($sql);
		$resultado=$conexion->ejecutarConsulta($sql);
		$fila = $conexion->obtenerFila($resultado);
		//var_dump($fila);
		echo json_encode($fila);
	}
	
	
}
?>