<?php 
	require "funciones/conecta.php";
	$con  = conecta();
	
	$id   = $_REQUEST['id'];

	$sql  = "SELECT * FROM administradores WHERE id = $id";

	$res  = mysql_query($sql, $con);
	
	$nombre     = mysql_result($res, 0, "nombre");
	$apellidos  = mysql_result($res, 0, "apellido");
	$correo     = mysql_result($res, 0, "correo");
	$rol        = mysql_result($res, 0, "rol");
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
		
		
		if(val_nombre == '' || val_apellido == '' || val_correo == '' || val_rol == '0'){
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('')", 5000);
			return false;
		}
		else{
			document.Forma01.method = 'post';
			document.Forma01.action = 'update.php';
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
	
	<body style="background-color:#F0F8FF;">
		<h1>Modificar Datos</h1>
		<a href="administradores_listado.php">Regresar al listado</a>
		<div  style="width: 100%; height: auto; border: 1px solid #010;"></div><br></br>
		<form name="Forma01" enctype="multipart/form-data">
		<label>
			Nombre:
			<input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre" value="<?php echo $nombre; ?>">
		</label>
		<br>
		<label>
			Apellido:
			<input id="campo2" type="text" name="apellido" placeholder="Escribe tu apellido" value="<?php echo $apellidos; ?>">
		</label>
		<br>
		<label>Correo:</label>
		<input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" onblur="verificaCorreo();">
		<div id="mensaje1" class="error"> </div>
		<br>
		<label for="pass">Contrasena:</label>
		<input type="password" name="pass">
		<br>
		<label for="rol">rol:</label>
		<select name="rol" >
			<option value="0" selected>Selecciona</option>
			<option value="1" <?php if($rol == 1) echo "selected"; ?>>Gerente</option>
			<option value="2" <?php if($rol == 2) echo "selected"; ?>>Ejecutivo</option>			
		</select><br>
		<input type="file"  name="archivo"><br>
		<br>
		<input onClick="recibe(); return false;" type="submit" value="Actualizar">
		<div id="mensaje2" class="error"></div>
		<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id; ?>">
		</form>
	</body>
</html>