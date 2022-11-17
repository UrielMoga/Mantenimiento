<?php
	require "funciones/conecta.php";
	$con = conecta();
	
	$nombre 	= $_REQUEST['nombre'];
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
	
	$sql = "INSERT INTO banners VALUES
			(0,'$nombre', '$fileName1',1,0)";
	
	$res = mysql_query($sql, $con);
	
	header("Location: banners_listado.php");
	
?>