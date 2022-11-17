<?php 
	session_start();
	if($_SESSION['usuario']){
		$usuario = $_SESSION['usuario'];
	}
	else{
		$_SESSION['usuario'] = time() + rand();
	}
?>
<html>
	<head>
		<style>
			#header{
				width: 100%;
				height: auto;
				border: 1px solid #000;
				background-color: #E9967A;
				
			}
			#logo{
				float: left;
			}
			#nombre{
				width: 300px;
				text-align: center;
			}
			#t_menu{
				margin: auto;
				border: 1px solid #000;
			}
		</style>
	</head>
	
	<body>
		<div id="header">
			<div id="logo"><a href="index.php"><img src = "logo_tienda.png" width="75px"  align="center"></a></div>
			<div id="nombre"><h1>Tienda Web</h1></div>
		</div>
		<br>
		<table id="t_menu">
			<tr>
				<td class="f_menu"><a href="index.php">Home</a> | </td>
				<td class="f_menu"><a href="productos.php">Productos</a> | </td>
				<td class="f_menu"><a href="contacto.php">Contacto</a> | </td>
				<td class="f_menu"><a href="carrito.php">Carrito</a></td>
			</tr>
		</table>
	</body>
</html>