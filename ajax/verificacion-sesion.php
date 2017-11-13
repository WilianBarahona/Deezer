<?php 

	include ("../class/class-conexion.php");
	include ("../class/class-usuario.php");	
	
	$correo=$_POST["inputEmail"];
	$password=$_POST["inputPassword"];
	
	//$password = hash('sha512',$password); 		
	$objConexion=new Conexion();
	Usuario::verificarUsuario($objConexion,$correo,$password);		
	$objConexion->cerrarConexion();

?>