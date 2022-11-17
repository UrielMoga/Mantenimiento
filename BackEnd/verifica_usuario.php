<?php
	session_start();
	require "conecta.php";
	$con = conecta();
	
	$user   = $_REQUEST['user'];
	$pass   = $_REQUEST['pass'];
	$pass = md5($pass);
	
	$sql = "SELECT * FROM administradores WHERE correo = '$user' AND pass = '$pass' AND status = 1 AND eliminado = 0";

	$res = mysql_query($sql, $con);
	$num = mysql_num_rows($res);
	
	if($num == 1){
		$idu       = mysql_result($res,0,"id");
		$nombre    = mysql_result($res,0,"nombre").' '.mysql_result($res,0,"apellido");
		$correo    = mysql_result($res,0,"correo");
		$_SESSION['idu'] = $idu;
		$_SESSION['nombre'] = $nombre;
		$_SESSION['correo'] = $correo;
	}
	
	echo $num;
?>