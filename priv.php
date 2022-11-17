<?php
	require "menu.php";
?>

<html>
	<head>
		<style>
			#tabla{
				margin: auto;
				width: 75%;
				heigth: auto;
				background-color: #FA8072;
				text-align: center;
				/*display: flex;
				position: relative;*/
			}
			.campo{
				width: 100%;
				heigth: auto;
				float: left;
				margin: 5px;
				text-align: center;
			}
		</style>
	</head>
	
	<body>
		<table id="tabla">
				<td class="campo"><h1>Politica de privacidad</h1></td>
				<td class="campo">
					<h4>
						Esta web utiliza los datos recopilados de manera educativa.
						Los datos recopilados solo son usados a manera de ejemplo para el correcto funcionamiento de la web.
					</h4>
				</td>
				
		</table>
		<?php require "footer.php"; ?>
	</body>
</html>