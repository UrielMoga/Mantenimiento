<?php
	session_start();
	include 'menu.php';
	
	if(!$_SESSION['idu']){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
?>

<html>
	<head>
		<title>Sistema de administradores</title>
		<style>
			#bienvenido{
				width: 60%;
				height: auto;
				border: 5px solid #708090;
				text-align: center;
				margin: auto;
				background-color: #A9A9A9;
			}
		</style>
	</head>
	<body style="font-family: helvetica">
		<div id="bienvenido">
			<h1>Bienvenido <?php echo $nombre ?></h1>
			<h1>Sistema de administracion</h1>
		</div>
	</body>
</html>