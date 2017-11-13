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

		public function __construct($idUsuario,
					$idSuscripcion,
					$idPais,
					$usuario,
					$nombre,
					$apellido,
					$sexo,
					$email,
					$contrasenia,
					$ultimaSesion,
					$fechaNacimiento,
					$urlFotoPerfil,
					$tipoUsuario){
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
			return "IdUsuario: " . $this->idUsuario . 
				" IdSuscripcion: " . $this->idSuscripcion . 
				" IdPais: " . $this->idPais . 
				" Usuario: " . $this->usuario . 
				" Nombre: " . $this->nombre . 
				" Apellido: " . $this->apellido . 
				" Sexo: " . $this->sexo . 
				" Email: " . $this->email . 
				" Contrasenia: " . $this->contrasenia . 
				" UltimaSesion: " . $this->ultimaSesion . 
				" FechaNacimiento: " . $this->fechaNacimiento . 
				" UrlFotoPerfil: " . $this->urlFotoPerfil . 
				" TipoUsuario: " . $this->tipoUsuario;
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
				$_SESSION['id_suscripcion']=$fila['id_suscripcion'];
				$_SESSION['id_pais']=$fila['id_pais'];
				$_SESSION['usuario']=$fila['usuario'];
				$_SESSION['nombre']=$fila['nombre'];
				$_SESSION['apellido']=$fila['apellido'];
				$_SESSION['sexo']=$fila['sexo'];
				$_SESSION['email']=$fila['email'];
				$_SESSION['fecha_nacimiento']=$fila['fecha_nacimiento'];
				$_SESSION['url_foto_perfil']=$fila['url_foto_perfil'];
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
		
	}
?>