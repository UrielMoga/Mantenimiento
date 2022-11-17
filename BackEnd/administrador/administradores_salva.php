<?php
	require "funciones/conecta.php";
	$con = conecta();
	
	$nombre 	= $_REQUEST['nombre'];
	$apellido 	= $_REQUEST['apellido'];
	$correo 	= $_REQUEST['correo'];
	$pass 		= $_REQUEST['pass'];
	$rol 		= $_REQUEST['rol'];
	$archivo_n  = $_FILES['archivo']['name'];
	$archivo   	= $_FILES['archivo']['tmp_name'];

	$cadena     = explode(".", $archivo_n);
	$ext        = end($cadena);
	$dir        = "archivos/";
	$file_enc   = md5_file($archivo);

	if($archivo_n != ''){
		$fileName1 = "$file_enc.$ext";
		copy($archivo, $dir.$fileName1);
	}

	$pass = md5($pass);
	
	$sql = "INSERT INTO administradores VALUES
			(0,'$nombre','$apellido','$correo','$pass', 
			$rol, '$archivo_n', '$fileName1',1,0)";
	
	$res = mysql_query($sql, $con);
	
	header("Location: administradores_listado.php");
	
?>