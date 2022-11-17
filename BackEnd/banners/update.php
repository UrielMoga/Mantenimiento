<?php
	require "funciones/conecta.php";
	$con = conecta();
	
	$id         = $_REQUEST['id_sel'];
	$nombre     = $_REQUEST['nombre'];
	$archivo_n  = $_FILES['archivo']['name'];
	$archivo   	= $_FILES['archivo']['tmp_name'];
	
	$cadena     = explode(".", $archivo_n);
	$ext        = end($cadena);
	$dir        = "archivos/";
	$file_enc   = md5_file($archivo);
	
	if($archivo_n != ''){
		$fileName1 = "$file_enc.$ext";
		$tx = ", archivo = '$fileName1'";
		copy($archivo, $dir.$fileName1);
	}
	
	$sql = "UPDATE banners
			SET nombre = '$nombre' $tx 
			WHERE id = $id";
	$res = mysql_query($sql, $con);

	header("Location: banners_listado.php");
?>