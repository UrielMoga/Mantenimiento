<?php
	session_start();
	require "BackEnd/funciones/conecta.php";
	//$con  = conecta();
	

	require "menu.php";
?>

<html>
	<head>
		<title>Contactanos</title>
		<script src="BackEnd/JS/jquery-3.3.1.min.js" ></script>
		<script>
			function send(){
				var nombre = contacto.nombre.value;
				var correo = contacto.mail.value;
				var fecha = contacto.fecha.value
				var coment = contacto.comentario.value;
				
				if(nombre == '' || correo == '' || fecha == '' || coment == ''){
					alert('Llena todos los campos');
				}
				else{
					document.contacto.method = 'post';
					document.contacto.action = 'correo.php';
					document.contacto.submit();
				}
				
			}
		</script>
		
		<style>
			#formulario{
				margin: auto;
				width: 75%;
				height: auto;
				background-color: #FA8072;
				text-align: center;
				/*display: flex;
				position: relative;*/
			}
			.campo{
				width: 100%;
				height: auto;
				float: left;
				margin: 5px;
				text-align: center;
			}
		</style>
		
	</head>
	
	<body>
		<form name="contacto">
			<br><br>
			<table id="formulario">
				<td class="campo">Nombre: <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"></td>
				<td class="campo">Correo: <input type="email" name="mail" id="mail" placeholder="Escribe tu correo"></td>
				<td class="campo">Fecha: <input type="date" name="fecha" id="fecha" placeholder="Escribe la fecha"></td>
				<td class="campo">Comentarios: <textarea id="comentario" name="comentario" name="comentario" cols="30" rows="5"></textarea></td>
				<td class="campo"><input type="button" onClick="send()" value="Enviar"></td>
			</table>
		</form>
		<?php require "footer.php"; ?>
	</body>
</html>