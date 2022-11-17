<?php
	session_start();
	if($_SESSION['idu']){
		header("Location: bienvenido.php");
	}
?>
 
<html>
	<head> 
		<title>Login</title>
		<script src="JS/jquery-3.3.1.min.js" ></script>
		<script>
			function validar(){
				var user = $('#user').val();
				var pass = $('#password').val();
				

				if(user == '' || pass == ''){
					$('#mensaje').html('Faltan campos por llenar');
					setTimeout("$('#mensaje').html('')", 5000);
					return false;
				}
				else{
					$.ajax({
						url       : 'funciones/verifica_usuario.php?user='+user+'&pass='+pass,
						type      : 'post',
						dataType  : 'text',
						success   : function(res){
							if(res == 0){
								$('#existe').html('El usuario o la contrasena no son validos');
								setTimeout("$('#existe').html('')", 5000);
							}
							else{
								window.location.href = 'bienvenido.php';
							}
						},error: function(){
							alert('Error al conectar al servidor...');
						}
					});
				}
			}
		</script>
		<style>
			#tabla{
				width: 300px;
				height: auto;
				border: 1px solid #010;
				margin: auto;
				background-color: #A9A9A9;
				/*color: #FFF;*/
			}
			.contenido{
				padding: 10px;
				margin: 1px auto;
				display: block;
			}
			.error{
				display: inline;
				color: FF0000;
			}
		</style>
	</head>
	
	<body style="background-color:#F0F8FF;">
		<h1>Login</h1>
		<div  style="width: 100%; height: auto; border: 1px solid #010;"></div><br>
		<div id="tabla">
			<form name="login">
				<div class="contenido">
					<label>
					Usuario(Correo): 
					<input type="text" id="user" name="user" placeholder="Escribe tu correo.">
					</label>
				</div>
				<div class="contenido">
					<label>
					Contrasena: 
					<input type="text" id="password" name="password" placeholder="Escribe tu contrasena.">
					</label>
				</div>
				<div class="contenido">
					<input onClick="validar(); return false;" type="submit" value="Ingresar">
				</div>
				<div id="mensaje" class="error"></div>
				<div id="existe" class="error"></div>
				<br>
			</form>
		</div>
	</body>
</html>