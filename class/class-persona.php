<?php
	class Persona{
		private $nombre;
		private $apellido;
		private $sexo;
		private $email;
		private $contrasenia;
		private $fechaNacimiento;
		private $ultimaSesion;


		public function __construct($nombre,$apellido,$sexo,$email,$contrasenia,$fechaNacimiento,$ultimaSesion){
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->sexo = $sexo;
			$this->email = $email;
			$this->contrasenia = $contrasenia;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->ultimaSesion = $ultimaSesion;
		}

		public function setNombre($nombre) { 
			$this->nombre = $nombre; 
		}

		public function getNombre() { 
			return $this->nombre; 
		}
		
		public function setApellido($apellido) { 
			$this->apellido = $apellido; 
		}
		
		public function getApellido() { 
			return $this->apellido; 
		}
		
		public function setSexo($sexo) { 
			$this->sexo = $sexo; 
		}
		
		public function getSexo() { 
			return $this->sexo; 
		}
		
		public function setEmail($email) { 
			$this->email = $email; 
		}
		
		public function getEmail() { 
			return $this->email; 
		}
		
		public function setContrasenia($contrasenia) { 
			$this->contrasenia = $contrasenia; 
		}
		
		public function getContrasenia() { 
			return $this->contrasenia; 
		}
		
		public function setFechaNacimiento($fechaNacimiento) { 
			$this->fechaNacimiento = $fechaNacimiento; 
		}
		
		public function getFechaNacimiento() { 
			return $this->fechaNacimiento; 
		}
		
		public function setUltimaSesion($ultimaSesion) { 
			$this->ultimaSesion = $ultimaSesion; 
		}
		
		public function getUltimaSesion() { 
			return $this->ultimaSesion; 
		}

		public function __construct(){
			return " Nombre: ".$this->nombre." Apellido: ".$this->apellido." Sexo: ".$this->sexo." Email: ".$this->email." ultimaSesion: ".$this->ultimaSesion;
		}

	}
?>