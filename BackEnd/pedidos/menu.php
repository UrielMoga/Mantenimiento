<?php
	session_start();
	
	if(!$_SESSION['idu']){
		header("Location: ../index.php");
	}
	$idu     = $_SESSION['idu'];
	$nombreu = $_SESSION['nombre'];
?>

<html>
	<head>
		<script>
			function cerrar_sesion(){
				window.location.href = "salir.php";
			}
		</script>	
		<style>
			#encabezado_menu{
				width: 100%;
				height: 60px;
				
				margin: auto;
			}
			#titulo_menu{
				width: 80%;
				height: 60px;
				float: left;	
				background-color: #ADD8E6;
			}
			#caja_menu{
				width: 19%;
				height: 60px;
				float: right;
				text-align: center;
				background-color: #5F9EA0;
			}
			#barra_menu{
				width: 100%;
				height: 50px;
				border: 3px inset #000;
				background-color: #008B8B;
			}
			.columna_menu{
				width: 16%;
				text-align: center;
				border: 3px inset #FFF;
				background-color: #B0C4DE;
			}
		</style>
	</head>
	
	<body style="background-color:#F0F8FF;">
		<div id="encabezado_menu">
			<div id="titulo_menu"><h1>Administracion</h1></div>
			<div style="background-color: #008B8B; width: 1%; height: 58px; float: left;"></div>
			<div id="caja_menu"><h3><?php echo $nombreu?></h3></div>
		</div>
		<table id="barra_menu">
			<tr>
				<td class="columna_menu"><a href="../bienvenido.php">Inicio</a></td>
				<td class="columna_menu"><a href="../administrador/administradores_listado.php">Administradores</a></td>
				<td class="columna_menu"><a href = "../productos/productos_listado.php">Productos</a></td>
				<td class="columna_menu"><a href="../banners/banners_listado.php">Banners</a></td>
				<td class="columna_menu"><a href="pedidos_listado.php">Pedidos</a></td>
				<td class="columna_menu"><input onclick="cerrar_sesion()" type="button" value="cerrar sesion" ></td>
			</tr>
		</table>
		<br>
	</body>
</html>