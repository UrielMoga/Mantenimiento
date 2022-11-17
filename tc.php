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
				<td class="campo"><h1>Terminos y condiciones</h1></td>
				<td class="campo">
					<h4>
						El presente contrato describe los terminos y condiciones aplicables al uso del contenido, productos y/o servicios del sitio web
						La actividad del usuario en el sitio web como publicaciones o comentarios estaran sujetos a los presentes terminos y condiciones. El usuario se compromete a utilizar el contenido, productos y/o servicios de forma licita, sin faltar a la moral o al orden publico, absteniendose de realizar cualquier acto que afecte los derechos de terceros o el funcionamiento del sitio web.
						El acceso al sitio web no supone una relacion entre el usuario y el titular del sitio web.

					</h4>
				</td>
				<td class="campo">
					<h4>
						La informacion recopilada sera utilizada a medida de ejemplo para el correcto funcionamiento de la pagina web.
					</h4>
				</td>
				
		</table>
		<?php require "footer.php"; ?>
	</body>
</html>