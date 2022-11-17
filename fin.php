<?php
	require "menu.php";
	require "BackEnd/funciones/conecta.php";
	$con = conecta();
	
	if($_SESSION['usuario']){
		$usuario = $_SESSION['usuario'];
	}
	
	$sql = "SELECT * FROM pedidos WHERE usuario = $usuario AND status = 0";
	$res = mysql_query($sql, $con);
	$num = mysql_num_rows($res);
?>
<html>
	<head>
		<style>
			#ver{
				width: 800px;
				heigth: 500px;
				margin: auto;
				background-color: #FA8072;
			}
			.datos{
				width: 100%;
				heigth: auto;
				text-align: center;
				
				float: right;
			}
			#confirm{
				width: 100%;
				text-align: center;
			}
		</style>
	</head>
	
	<body>
		<table id="ver">
		
			<td class="datos"><h3>Compra finalizada</h3></td>
		
		</table>
		<a href="index.php" class="datos">Regresar</a>
			
		<?php require "footer.php"; ?>
	<body>
</html>