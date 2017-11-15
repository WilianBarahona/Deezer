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
	public static function verificarUsuario($conexion,$email,$password){
		#consulta
		$sql=sprintf("
			SELECT  
				id_usuario, id_suscripcion, id_pais, usuario, 
				nombre, apellido, sexo, email, contrasenia, 
				ultima_sesion, fecha_nacimiento, url_foto_perfil, 
				tipo_usuario
		  	FROM tbl_usuarios
		  	WHERE email='%s' && contrasenia='$%s'
		",
			$conexion->antiInyeccion($email),
			$conexion->antiInyeccion($password)
		);
		#resultado de la consulta				
		$resultado=$conexion->ejecutarConsulta($sql);
		$cantidadRegistros=$conexion->cantidadRegistros($resultado);
		if ($cantidadRegistros==1)  {
			$usuario = $conexion->obtenerFila($resultado);
			session_start();
			$_SESSION['status']=true;
			$_SESSION['id_usuario']=$usuario['id_usuario'];
			$_SESSION['id_suscripcion']=$usuario['id_suscripcion'];
			$_SESSION['id_pais']=$usuario['id_pais'];
			$_SESSION['usuario']=$usuario['usuario'];
			$_SESSION['nombre']=$usuario['nombre'];
			$_SESSION['apellido']=$usuario['apellido'];
			$_SESSION['sexo']=$usuario['sexo'];
			$_SESSION['email']=$usuario['email'];
			$_SESSION['fecha_nacimiento']=$usuario['fecha_nacimiento'];
			$_SESSION['url_foto_perfil']=$usuario['url_foto_perfil'];
			$_SESSION['tipo_usuario']=$usuario['tipo_usuario'];
			$respuesta['tipo_usuario']=$usuario['tipo_usuario'];
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
		return $respuesta;
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
		echo ($sql);
		$resultado=$conexion->ejecutarConsulta($sql);
		return $resultado;
	}
}
?>