<?php 
	include 'menu.php';
?>
<html>
	<head>
		<script src="../JS/jquery-3.3.1.min.js" ></script>
		
		 <script>
		function recibe(){
		var val_nombre = Forma01.nombre.value;
		var val_correo = Forma01.correo.value;
		var val_apellido = Forma01.apellido.value;
		var val_rol = Forma01.rol.value;
		var val_pasword = Forma01.pass.value;
		var val_imagen = Forma01.archivo.value;
		
		
		if(val_nombre == '' || val_apellido == '' || val_correo == '' || val_correo == '@udg.mx' || val_rol == '0' || val_pasword == '' || val_imagen == ''){
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('')", 5000);
			return false;
			}
		else{
			document.Forma01.method = 'post';
			document.Forma01.action = 'administradores_salva.php';
			document.Forma01.submit();
		}
	}
  </script>
  
		<script>
			function verificaCorreo(){
				var id     = $('#id_sel').val();
				var correo = $('#correo').val();
				
				if(correo != ''){
					$.ajax({
						url       : 'funciones/verificaCorreo.php',
						type      : 'post',
						dataType  : 'text',
						data      : 'id='+id+'&correo='+correo,
						success   : function(res){
							if(res > 0){
								
								$('#mensaje1').html('El correo '+correo+' ya esta registrado');
								$('#correo').val('');
								setTimeout("$('#mensaje1').html('')", 5000);
							}
						},error: function(){
							alert('Error al conectar al servidor...');
						}
					});
				}
			}
		</script>
		
		<style>
			.error{
				display: inline;
				color: FF0000;
			}
		</style>
	</head>
	
	<body style="background-color:#F0F8FF;" >
		<h1>Alta Administradores</h1>
		<a href="administradores_listado.php">Regresar al listado</a>
		<div  style="width: 100%; height: auto; border: 1px solid #010;"></div><br></br>
		<form name="Forma01" enctype="multipart/form-data">
		<label>
			Nombre:
			<input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre" required>
		</label>
		<br>
		<label>
			Apellido:
			<input id="campo2" type="text" name="apellido" placeholder="Escribe tu apellido" required>
		</label>
		<br>
		<label>Correo:</label>
		<input type="email" id="correo" name="correo" value="@udg.mx" onblur="verificaCorreo();">
		<div id="mensaje1" class="error"> </div>
		<br>
		<label for="pass">Contrasena:</label>
		<input type="password" name="pass">
		<br>
		<label for="rol">rol:</label>
		<select name="rol">
			<option value="0" selected>Selecciona</option>
			<option value="1">Gerente</option>
			<option value="2">Ejecutivo</option>			
		</select><br>
		<input type="file"  name="archivo"><br>
		<br>
		<input onClick="recibe(); return false;" type="submit" value="Guardar">
		<div id="mensaje2" class="error"> </div>
		<input type="hidden" id="id_sel" name="id_sel" value="0">
		</form>
	</body>
</html>