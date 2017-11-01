<?php
	include("../class/class_conexion.php");
	$objConexion = new Conexion;
	switch ($_GET['accion']) {
		case 'validar_login':
			include("../class/class-usuario.php");
			$password = $_POST['inputPassword'];
			$password = hash('sha512',$password);
			Usuario::verificarUsuario($objConexion,$_POST['inputEmail'],$password);
			break;
		case 'registrar_usuario':
			echo "Registro de usuarios";
			break;
		
		default:
			# code...
			break;
	}
?>