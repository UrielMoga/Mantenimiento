<?php
	require "funciones/conecta.php";
	$con = conecta();
	
	$id         = $_REQUEST['id_sel'];
	$nombre     = $_REQUEST['nombre'];
	$apellidos  = $_REQUEST['apellido'];
	$correo     = $_REQUEST['correo'];
	$pass       = $_REQUEST['pass'];
	$rol        = $_REQUEST['rol'];
	$archivo_n  = $_FILES['archivo']['name'];
	$archivo   	= $_FILES['archivo']['tmp_name'];
	
	$cadena     = explode(".", $archivo_n);
	$ext        = end($cadena);
	$dir        = "archivos/";
	$file_enc   = md5_file($archivo);
	
	if($archivo_n != ''){
		$fileName1 = "$file_enc.$ext";
		$tx2 = ", archivo_n = '$archivo_n', archivo = '$fileName1'";
		copy($archivo, $dir.$fileName1);
	}
	
	if($pass != ''){
		$pass = md5($pass);
		$tx   = ", pass = '$pass'";
	}
	
	$sql = "UPDATE administradores
			SET nombre = '$nombre', apellido = '$apellidos',
			correo = '$correo', rol = '$rol' $tx $tx2
			WHERE id = $id";
	$res = mysql_query($sql, $con);

	header("Location: administradores_listado.php");
?>