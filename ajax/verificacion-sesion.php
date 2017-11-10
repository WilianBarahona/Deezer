<?php 

	include ("../class/class-conexion.php");
	$correo=$_POST["inputEmail"];
	$password=$_POST["inputPassword"];
//	$password = hash('sha512',$password); 		
	$objConexion=new Conexion();
	$sql="SELECT email,contrasenia 
		  FROM tbl_usuarios 
		  WHERE email='$correo' && contrasenia='$password'";
	$link=$objConexion->getLink();
	$resultado=$objConexion->ejecutarConsulta($sql);
	if ($fila=$objConexion->obtenerFila($resultado)) {
		echo 'correo y contrasenia validos';	
		session_start();
		$_SESSION['loggedin'] = true;
	}
	else {
		echo'correo o contrasenia invalidos';	
		session_start();
		$_SESSION['loggedin'] = false;
		}
$objConexion->cerrarConexion();
?>