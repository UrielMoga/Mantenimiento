<?php
	session_start();
	require "BackEnd/funciones/conecta.php";
	$con  = conecta();
	
	$id 	  = $_REQUEST['id'];
	$cantidad = $_REQUEST['cantidad'];

	$fecha = date('Ymd');
	
	
	if($_SESSION['usuario']){
		$usuario = $_SESSION['usuario'];
	}
	else{
		$_SESSION['usuario'] = time() + rand();
		$usuario = $_SESSION['usuario'];
	}
	
	//pedido abierto
	$sql = "SELECT * FROM pedidos WHERE status = 0 AND usuario = $usuario";
	$res = mysql_query($sql, $con);
	$num = mysql_num_rows($res);
	
	if($num == 1){
		$idpedido = mysql_result($res, 0, "id");
	}
	else{
		$sql = "INSERT INTO pedidos VALUES (0, $fecha, $usuario, 0)"; 
		$res =  mysql_query($sql, $con);
		$idpedido = mysql_insert_id($con);
	}
	
	//costo y stock
	$sql = "SELECT * FROM productos WHERE id=$id";
	$res = mysql_query($sql, $con);
	$costo = mysql_result($res, 0, "costo");
	//
	$stock = mysql_result($res, 0, "stock");
	$stock = $stock - $cantidad;
	
	$sql = "UPDATE productos SET stock = $stock WHERE id = $id";
	$res = mysql_query($sql, $con);
	//existe
	$sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $idpedido AND id_producto = $id";
	$res = mysql_query($sql, $con);
	$num = mysql_num_rows($res);
	if($num == 1){
		$sql = "UPDATE pedidos_productos SET cantidad = cantidad + $cantidad";
		$res = mysql_query($sql, $con);
		
	}
	else{
		$sql = "INSERT INTO pedidos_productos VALUES (0, $idpedido, $id, $cantidad, $costo)";
		$res = mysql_query($sql, $con);
		
	}
	
	header("Location:".$_SERVER['HTTP_REFERER']); 
	
?>