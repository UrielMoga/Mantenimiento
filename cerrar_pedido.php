<?php
	session_start();
	require "BackEnd/funciones/conecta.php";
	$con = conecta();
	$usuario = $_SESSION['usuario'];
	
	
	
	$sql = "SELECT * FROM pedidos WHERE usuario = $usuario AND status = 0";
	$res = mysql_query($sql, $con);
	$nump = mysql_num_rows($res);
	$idp = mysql_result($res, 0, "id");
	


	if($nump == 1){
		$sql = "UPDATE pedidos SET status = 1 WHERE id = $idp";
		$res = mysql_query($sql, $con);
	}

	header("Location: fin.php"); 
	
?>