<?php 
	include ("../class/class-conexion.php");
	$correo=$_POST["inputEmail"];
	$password=$_POST["inputPassword"];
	 		
	$objConexion= new Conexion();
	$link = $objConexion->getLink();
	$res=mysqli_query($link,"SELECT email, contrasenia 
							 FROM tbl_usuarios
							 WHERE email='$correo' && contrasenia='$password'");
	if ($fila=mysqli_fetch_array($res)) {
		echo 'correo y contrasenia validos';	
		session_start();
	}
	else {
		echo'correo o contrasenia invalidos';	
		}
		
	echo  mysqli_error(	$link);	

?>