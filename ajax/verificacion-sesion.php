<?php 

	include ("../class/class-conexion.php");
	$correo=$_POST["inputEmail"];
	$password=$_POST["inputPassword"];
	$password = hash('sha512',$password); 		
	$objConexion=new Conexion();
	$link=$objConexion->getLink();
	$resultado=mysqli_query($link,
							"SELECT email,contrasenia 
							 FROM tbl_usuarios 
							 WHERE email='$correo' && contrasenia='$password'");
	if ($fila=mysqli_fetch_array($resultado)) {
		echo 'correo y contrasenia validos';	
		session_start();
	}
	else {
		echo'correo o contrasenia invalidos';	
		}

?>