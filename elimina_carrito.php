<?php
	session_start();
	require "BackEnd/funciones/conecta.php";
	$con = conecta();
	
	$id = $_REQUEST['id'];
	$cantidad = $_REQUEST['cantidad'];
	$usuario = $_SESSION['usuario'];
	
	$sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = $usuario";
	$res = mysql_query($sql, $con);
	$num = mysql_num_rows($res);
	$idp = mysql_result($res, 0, "id");
	$flag = 0;
	
	$sql = "SELECT * FROM productos WHERE id = $id";
	$res = mysql_query($sql, $con);
	$stock = mysql_result($res, 0, "stock");
	$stock = $stock + $cantidad;
	$sql = "UPDATE productos SET stock = $stock WHERE id = $id";
	$res = mysql_query($sql, $con);
	
	$sql = "DELETE FROM pedidos_productos WHERE id_producto = $id AND id_pedido = $idp";
	$res = mysql_query($sql, $con);
	$idf = mysql_result($res, 0, "id");
	if($res == true)
		$flag = 1;

	
	echo $flag;
?>