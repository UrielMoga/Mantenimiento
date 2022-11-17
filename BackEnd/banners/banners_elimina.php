<?php
	require "funciones/conecta.php";
	$con = conecta();
	
	$id = $_REQUEST['id'];
	$flag = 0;
	
	if($id > 0){
		$sql = "UPDATE banners
				SET eliminado = 1 WHERE id = $id";
		$res = mysql_query($sql, $con);
		$flag = 1;
	}
	
	echo $flag;
?>