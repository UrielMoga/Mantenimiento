<?php
	require "funciones/conecta.php";
	$con = conecta();
	
	$nombre 	 = $_REQUEST['nombre'];
	$codigo 	 = $_REQUEST['codigo'];
	$descripcion = $_REQUEST['descripcion'];
	$costo		 = $_REQUEST['costo'];
	$stock		 = $_REQUEST['stock'];
	$archivo_n   = $_FILES['archivo']['name'];
	$archivo   	 = $_FILES['archivo']['tmp_name'];

	$cadena     = explode(".", $archivo_n);
	$ext        = end($cadena);
	$dir        = "archivos/";
	$file_enc   = md5_file($archivo);

	if($archivo_n != ''){
		$fileName1 = "$file_enc.$ext";
		copy($archivo, $dir.$fileName1);
	}
	
	$sql = "INSERT INTO productos VALUES
			(0,'$nombre','$codigo','$descripcion','$costo', 
			$stock, '$archivo_n', '$fileName1',1,0)";
	
	$res = mysql_query($sql, $con);
	
	header("Location: productos_listado.php");
	
?>